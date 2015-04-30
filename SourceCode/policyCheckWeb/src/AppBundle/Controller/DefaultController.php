<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Finder\Finder;

use AppBundle\Lib\MediaInfo\MediaInfoOutput;
use AppBundle\Lib\MediaInfo\MediaInfoChecker;
use AppBundle\Lib\MediaInfo\MediaInfoPolicyChecker;
use AppBundle\Entity\Policy;
use AppBundle\Form\Type\PolicyType;
use AppBundle\Form\Type\PolicyTestType;

/**
 * @Route("/MediaConchOnline")
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
    public function checkFullFileAction()
    {
        $policyList = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->findAll();

        return array('policyList' => $policyList);
    }

    /**
     * @Route("/checker")
     * @Template()
     */
    public function checkerAction(Request $request)
    {
        $uploadOk = 0;
        $output = array();
        $result = false;
        if ($request->request->get('submit', false) && isset($_FILES['fileToUpload']) && 0 == $_FILES['fileToUpload']['error']) {
            $uploadOk = 1;
            exec('/usr/bin/mediainfo -f --Language=raw --Output=XML ' . escapeshellarg($_FILES['fileToUpload']['tmp_name']), $output, $result);
        }

        $fileIsValid = false;
        $fileErrors = array();

        if (1 == $uploadOk && 0 == $result) {
            $xml = '';
            foreach($output as $out) {
                $xml .= $out . "\n";
            }

            $MediaInfo = new MediaInfoOutput($xml);
            $policy = $this->getDoctrine()
                ->getRepository('AppBundle:Policy')
                ->find($request->request->get('policy'));
            $policyChecker = new MediaInfoPolicyChecker($MediaInfo, $policy);
            $policyChecker->check();
            $check = array('name' => basename($_FILES['fileToUpload']['name']),
                'isValid' => $policyChecker->isValid(),
                'errors' => $policyChecker->getErrors(),
                'xml' => $xml,
                );

        }

        return array('upload' => $uploadOk, 'result' => $result, 'check' => $check);
    }

    /**
     * @Route("/check")
     * @Template()
     */
    public function checkAction()
    {
        $policyList = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->findAll();

        return array('policyList' => $policyList);
    }

    /**
     * @Route("/policy/{id}", defaults={"id" = 0})
     * @Template()
     */
    public function policyAction($id, Request $request)
    {
        $originalItems = new ArrayCollection();

        if ($id > 0) {
            $policy = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->find($id);

            // Create an ArrayCollection of the current items objects in the database
            foreach ($policy->getItems() as $item) {
                $originalItems->add($item);
            }
       }
        else {
            $policy = new Policy();
        }

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

            $em->persist($policy);
            $em->flush();
        }

        $policyList = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->findAll();

        return array('form' => $form->createView(), 'policyList' => $policyList);
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

        $result = array('' => 'Choose a field');
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

        $result = array('' => 'Choose a validator');
        foreach($itemValidators as $validator) {
            $result[$validator->getId()] = $validator->getName();
        }

        return new JsonResponse($result);
    }

    /**
     * @Route("/checkFiles/{id}", defaults={"id" = 0})
     * @Template()
     */
    public function checkFilesAction($id)
    {
        $params = $this->container->getParameter('mediaconch');
        $checks = array();
        if ($id > 0) {
            $policy = $this->getDoctrine()
                ->getRepository('AppBundle:Policy')
                ->find($id);

            $finder = new Finder();
            $finder->files()->in($params['check_dir']);
            foreach($finder as $file) {
                exec('/usr/bin/mediainfo -f --Language=raw --Output=XML ' . escapeshellarg($file->getPathname()), $output, $result);
                if (0 == $result) {
                    $xml = '';
                    foreach($output as $out) {
                        $xml .= $out . "\n";
                    }

                    $MediaInfo = new MediaInfoOutput($xml);
                    $policyChecker = new MediaInfoPolicyChecker($MediaInfo, $policy);
                    $policyChecker->check();
                    $checks[] = array('name' => $file->getRelativePathname(),
                        'isValid' => $policyChecker->isValid(),
                        'errors' => $policyChecker->getErrors(),
                        'xml' => $xml,
                        );
                    unset($output);
                }
            }
        }

        $policyList = $this->getDoctrine()
            ->getRepository('AppBundle:Policy')
            ->findAll();

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
        if ($request->request->get('file', false) && file_exists($request->request->get('file'))) {
            $uploadOk = 1;
            exec('/usr/bin/mediainfo -f --Language=raw --Output=XML ' . escapeshellarg($request->request->get('file')), $output, $result);
        }

        $fileIsValid = false;
        $fileErrors = array();

        if (1 == $uploadOk && 0 == $result) {
            $xml = '';
            foreach($output as $out) {
                $xml .= $out . "\n";
            }

            $MediaInfo = new MediaInfoOutput($xml);
            $policy = $this->getDoctrine()
                ->getRepository('AppBundle:Policy')
                ->find($request->request->get('policy'));
            $policyChecker = new MediaInfoPolicyChecker($MediaInfo, $policy);
            $policyChecker->check();
            $check = array('name' => basename($request->request->get('file')),
                'isValid' => $policyChecker->isValid(),
                'errors' => $policyChecker->getErrors(),
                'xml' => htmlentities($xml, ENT_COMPAT, 'UTF-8'),
                );
        }
        else {
            $check = array('name' => basename($request->request->get('file', false)),
                'isValid' => 0,
                'errors' => array(),
                'xml' => '',
                );
        }

        return new JsonResponse($check);
    }
}
