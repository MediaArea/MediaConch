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
use Symfony\Component\Finder\Finder;
use Doctrine\ORM\EntityRepository;

use AppBundle\Lib\Checker\Checker;
use AppBundle\Entity\Policy;

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
                    $checker = new Checker($data['file'], $data['policy']);
                    $checker->run();

                    $checks = array(0 => $checker);

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

                $checker = new Checker(str_replace(' ', '%20', $data['file']), $data['policy']);
                $checker->run();
                $checks[] = $checker;

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
     * @Route("/checkFiles")
     * @Template()
     */
    public function checkFilesAction(Request $request)
    {
        $checks = false;

        if ($this->get('mediaconch_user.quotas')->hasPolicyChecksRights()) {
            $form = $this->createFormBuilder()
                ->add('policy', 'entity', array('class' => 'AppBundle:Policy',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('p')
                            ->where('p.user = :user')
                            ->setParameter('user', $this->getUser());
                    },
                    'placeholder' => 'Choose a policy',
                    'required' => false)
                    )
                ->add('file', 'file', array('label' => 'Schematron',
                    'required' => false)
                    )
                ->add('Check', 'submit')
                ->getForm();

            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();

                if (($data['file'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile && $data['file']->isValid()) || $data['policy'] instanceof Policy) {
                    $checks = array();
                    $params = $this->container->getParameter('mediaconch');

                    $finder = new Finder();
                    $finder->files()->in($params['check_dir']);
                    foreach($finder as $file) {
                        if ($data['file'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                            $checker = new Checker($file->getPathname(), $data['file']);
                        }
                        else {
                            $checker = new Checker($file->getPathname(), $data['policy']);
                        }

                        $checker->run();
                        $checks[] = $checker;
                    }

                    $this->get('mediaconch_user.quotas')->hitPolicyChecks(count($finder));
                }
                else {
                    $this->get('session')->getFlashBag()->add(
                        'warning',
                        'You need to select a policy or a schematron file');
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

        $file = $request->request->get('file', false);
        if ($file && file_exists($file) && $request->request->get('policy', false)) {
            $policy = $this->getDoctrine()
                ->getRepository('AppBundle:Policy')
                ->find($request->request->get('policy'));

            $checker = new Checker($file, $policy);
            $checker->disableConformance();
            $checker->run();
            $check['xml'] = htmlentities($checker->getXml(), ENT_COMPAT, 'UTF-8');
            $check['isValid'] = $checker->getStatus();
            $check['errors'] = $checker->getPolicy();
        }

        return new JsonResponse($check);
    }
}
