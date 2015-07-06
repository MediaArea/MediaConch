<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Finder\Finder;
use Doctrine\ORM\EntityRepository;

use AppBundle\Lib\MediaInfo\MediaInfo;
use AppBundle\Lib\MediaInfo\MediaInfoOutput;
use AppBundle\Lib\MediaInfo\MediaInfoPolicyChecker;
use AppBundle\Entity\Policy;
use AppBundle\Form\Type\PolicyType;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function homepageAction()
    {
        return array();
    }

    /**
     * @Route("/checkFullFile")
     * @Template()
     */
    public function checkFullFileAction(Request $request)
    {
        if ($this->get('mediaconch_user.quotas')->hasUploadsRights()) {
            $checks = false;
            $form = $this->createFormBuilder()
                ->add('policy', 'entity', array('class' => 'AppBundle:Policy',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('p')
                            ->where('p.user = :user')
                            ->setParameter('user', $this->getUser());
                    },
                    'placeholder' => 'Choose a policy'))
                ->add('file', 'file', array('label' => 'File (max ' . ini_get('upload_max_filesize') . ')'))
                ->add('Check', 'submit')
                ->getForm();

            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();

                if ($data['file']->isValid()) {
                    $MediaInfo = new MediaInfo($data['file']->getRealPath());
                    $MediaInfo->analyse();
                    if ($MediaInfo->getSuccess()) {
                        $policyChecker = new MediaInfoPolicyChecker($MediaInfo->getParsedOutput(), $data['policy']);
                        $policyChecker->check();
                        $check = array('isValid' => $policyChecker->isValid(),
                            'errors' => $policyChecker->getErrors(),
                            'xml' => $MediaInfo->getOutputXml(),
                            );
                    }
                    else {
                        $check = array('isValid' => false,
                            'errors' => array('Error during file parsing'),
                            'xml' => '',
                            );
                    }

                    $check['name'] = $data['file']->getClientOriginalName();
                    $checks = array(0 => $check);

                    $this->get('mediaconch_user.quotas')->hitUploads();
                }
            }

            return array('form' => $form->createView(), 'checks' => $checks);
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'danger',
                $this->renderView('AppBundle:Default:quotaExceeded.html.twig')
            );

            return array('form' => false, 'checks' => false);
        }

    }

    /**
     * @Route("/checkOnline")
     * @Template()
     */
    public function checkOnlineFileAction(Request $request)
    {
        if ($this->get('mediaconch_user.quotas')->hasUrlsRights()) {
            $checks = false;

            $form = $this->createFormBuilder()
                ->add('policy', 'entity', array('class' => 'AppBundle:Policy',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('p')
                            ->where('p.user = :user')
                            ->setParameter('user', $this->getUser());
                    },
                    'placeholder' => 'Choose a policy'))
                ->add('file', 'url', array('max_length' => 512))
                ->add('Check', 'submit')
                ->getForm();

            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();

                $MediaInfo = new MediaInfo(str_replace(' ', '%20', $data['file']));
                $MediaInfo->analyse();
                if ($MediaInfo->getSuccess()) {
                    $policyChecker = new MediaInfoPolicyChecker($MediaInfo->getParsedOutput(), $data['policy']);
                    $policyChecker->check();
                    $check = array('isValid' => $policyChecker->isValid(),
                        'errors' => $policyChecker->getErrors(),
                        'xml' => $MediaInfo->getOutputXml(),
                        );
                }
                else {
                    $check = array('isValid' => false,
                        'errors' => array('Error during file parsing'),
                        'xml' => '',
                        );
                }

                $check['name'] = $data['file'];
                $checks = array(0 => $check);

                $this->get('mediaconch_user.quotas')->hitUrls();
            }

            return array('form' => $form->createView(), 'checks' => $checks);
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'danger',
                $this->renderView('AppBundle:Default:quotaExceeded.html.twig')
            );

            return array('form' => false, 'checks' => false);
        }
    }

    /**
     * @Route("/check")
     * @Template()
     */
    public function checkAction()
    {
        $policyList = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->findByUser($this->getUser());

        return array('policyList' => $policyList);
    }

    /**
     * @Route("/policy/{id}", defaults={"id" = 0}, requirements={"id": "\d+"})
     * @Template()
     */
    public function policyAction($id, Request $request)
    {
        $originalItems = new ArrayCollection();

        if ($id > 0) {
            $policy = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->findOneBy(array('id' => $id, 'user' => $this->getUser()));

            if (!$policy) {
                throw new NotFoundHttpException();
            }

            // Create an ArrayCollection of the current items objects in the database
            foreach ($policy->getItems() as $item) {
                $originalItems->add($item);
            }
        }
        else {
            $policy = new Policy();
        }

        $policyList = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->findByUser($this->getUser());

        if ($id > 0 || $this->get('mediaconch_user.quotas')->hasPolicyCreationRights()) {
            $form = $this->createForm(new PolicyType(), $policy);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                // remove the relationship between the item and the policy
                foreach ($originalItems as $item) {
                    if (false === $policy->getItems()->contains($item)) {
                        $item->setPolicy(null);
                        $em->remove($item);
                    }
                }

                // Set user at the creation of the policy
                if (null === $policy->getUser()) {
                    $policy->setUser($this->getUser());
                }

                $em->persist($policy);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'Policy successfully saved'
                );
                return $this->redirect($this->generateUrl('app_default_policy', array('id' => $policy->getId())));
            }

            return array('form' => $form->createView(), 'policyList' => $policyList);
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'danger',
                $this->renderView('AppBundle:Default:quotaExceeded.html.twig')
            );

            return array('form' => false, 'policyList' => $policyList);
        }
    }

    /**
     * @Route("/policyAjaxFields")
     */
    public function policyAjaxFieldsAction(Request $request) {
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }

        // Get the type value
        $type = $request->request->get('type');
        $itemFields = $this->getDoctrine()
        ->getRepository('AppBundle:PolicyItemFields')
        ->findAllFieldsByType($type);

        $result = array(0 => 'Choose a field');
        foreach($itemFields as $field) {
            $result[$field->getId()] = $field->getName();
        }

        return new JsonResponse($result);
    }

    /**
     * @Route("/policyAjaxValidators")
     */
    public function policyAjaxValidatorsAction(Request $request) {
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }

        // Get the field value
        $field = $request->request->get('field');
        $itemValidators = $this->getDoctrine()
        ->getRepository('AppBundle:PolicyItemValidators')
        ->findAllValidatorsByField($field);

        $result = array(0 => 'Choose a validator');
        foreach($itemValidators as $validator) {
            $result[$validator->getId()] = $validator->getName();
        }

        return new JsonResponse($result);
    }

    /**
     * @Route("/policy/delete/{id}", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function policyDeleteAction($id)
    {
        $policy = $this->getDoctrine()
        ->getRepository('AppBundle:Policy')
        ->findOneBy(array('id' => $id, 'user' => $this->getUser()));

        if (!$policy) {
             $this->get('session')->getFlashBag()->add(
                'danger',
                'Policy not found'
            );
       }
        else {
            $em = $this->getDoctrine()->getManager();
            $em->remove($policy);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Policy successfully removed'
            );
        }

        return $this->redirect($this->generateUrl('app_default_policy'));
    }
    /**
     * @Route("/checkFiles/{id}", defaults={"id" = 0})
     * @Template()
     */
    public function checkFilesAction($id)
    {
        $policyList = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->findByUser($this->getUser());

        $checks = false;

        if ($this->get('mediaconch_user.quotas')->hasPolicyChecksRights()) {
            $checks = array();
            if ($id > 0) {
                $params = $this->container->getParameter('mediaconch');
                $policy = $this->getDoctrine()
                    ->getRepository('AppBundle:Policy')
                    ->find($id);

                $finder = new Finder();
                $finder->files()->in($params['check_dir']);
                foreach($finder as $file) {
                    $MediaInfo = new MediaInfo($file->getPathname());
                    $MediaInfo->analyse();
                    //$MediaInfo->trace();
                    if ($MediaInfo->getSuccess()) {
                        $policyChecker = new MediaInfoPolicyChecker($MediaInfo->getParsedOutput(), $policy);
                        $policyChecker->check();
                        $check = array('isValid' => $policyChecker->isValid(),
                            'errors' => $policyChecker->getErrors(),
                            'xml' => $MediaInfo->getOutputXml(),
                            'trace' => '',
                            );
                    }
                    else {
                        $check = array('isValid' => false,
                            'errors' => array('Error during file parsing'),
                            'xml' => '',
                            'trace' => '',
                            );
                    }

                    $check['name'] = $file->getRelativePathname();
                    $checks[] = $check;
                }

                $this->get('mediaconch_user.quotas')->hitPolicyChecks(count($finder));
            }
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'danger',
                $this->renderView('AppBundle:Default:quotaExceeded.html.twig')
            );
        }

        return array('checks' => $checks, 'policyList' => $policyList);
    }

    /**
     * @Route("/ajaxChecker")
     * @Template()
     */
    public function ajaxCheckerAction(Request $request)
    {
        $uploadOk = 0;
        $output = array();
        $result = false;
        $check = array('name' => basename($request->request->get('file', false)),
            'isValid' => 0,
            'errors' => array(),
            'xml' => '',
        );

        if ($request->request->get('file', false) && file_exists($request->request->get('file'))) {
            $uploadOk = 1;
            exec('/usr/bin/mediainfo -f --Language=raw --Output=XML ' . escapeshellarg($request->request->get('file')), $output, $result);
        }

        if (1 == $uploadOk && 0 == $result) {
            $xml = '';
            foreach($output as $out) {
                $xml .= $out . "\n";
            }

            $check['xml'] = htmlentities($xml, ENT_COMPAT, 'UTF-8');
            $MediaInfo = new MediaInfoOutput($xml);

            if ($request->request->get('policy', false)) {
                $policy = $this->getDoctrine()
                    ->getRepository('AppBundle:Policy')
                    ->find($request->request->get('policy'));
                $policyChecker = new MediaInfoPolicyChecker($MediaInfo, $policy);
                $policyChecker->check();
                $check['isValid'] = $policyChecker->isValid();
                $check['errors'] = $policyChecker->getErrors();
            }
        }

        return new JsonResponse($check);
    }
}
