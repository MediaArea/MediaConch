<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Finder\Finder;

use AppBundle\Lib\Checker\Checker;

/**
 * @Route("/")
 */
class CheckerController extends Controller
{
    /**
     * @Route("/checker")
     * @Template()
     */
    public function checkerAction(Request $request)
    {
        $checks = false;
        $selectForm = false;

        if ($this->get('mediaconch_user.quotas')->hasUploadsRights()) {
            $formUpload = $this->createForm('checkerUpload');
            $formUpload->handleRequest($request);

            if ($formUpload->isValid()) {
                $selectForm = 'upload';
                $data = $formUpload->getData();
                if (($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile && $data['schematron']->isValid()) || $data['policy'] instanceof \AppBundle\Entity\XslPolicyFile) {
                    if ($data['file']->isValid()) {
                        $checker = new Checker($data['file']);
                        if ($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                            $checker->setPolicyItem($data['schematron']);
                        }
                        else {
                            $helper = $this->container->get('vich_uploader.storage');
                            $policyFile = $helper->resolvePath($data['policy'], 'policyFile');
                            $checker->setPolicyItem($policyFile);
                        }

                        $checker->setInfoFormat(array('xml', 'jstree'))->enableTrace()->setTraceFormat(array('xml', 'jstree'))->run();
                        $checks = array(0 => $checker);

                        $this->get('mediaconch_user.quotas')->hitUrls();
                    }
                }
                else {
                    $this->get('session')->getFlashBag()->add(
                        'warning',
                        'You need to select a policy or a schematron file');
                }
            }
        }

        if ($this->get('mediaconch_user.quotas')->hasUrlsRights()) {
            $formOnline = $this->createForm('checkerOnline');
            $formOnline->handleRequest($request);

            if ($formOnline->isValid()) {
                $selectForm = 'online';
                $data = $formOnline->getData();

                if (($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile && $data['schematron']->isValid()) || $data['policy'] instanceof \AppBundle\Entity\XslPolicyFile) {
                    $checker = new Checker(str_replace(' ', '%20', $data['file']));
                    if ($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                        $checker->setPolicyItem($data['schematron']);
                    }
                    else {
                        $helper = $this->container->get('vich_uploader.storage');
                        $policyFile = $helper->resolvePath($data['policy'], 'policyFile');
                        $checker->setPolicyItem($policyFile);
                    }

                    $checker->setInfoFormat(array('xml', 'jstree'))->enableTrace()->setTraceFormat(array('xml', 'jstree'))->run();
                    $checks = array(0 => $checker);

                    $this->get('mediaconch_user.quotas')->hitUrls();
                }
                else {
                    $this->get('session')->getFlashBag()->add(
                        'warning',
                        'You need to select a policy or a schematron file');
                }
            }
        }

        if ($this->get('mediaconch_user.quotas')->hasPolicyChecksRights()) {
            $formRepository = $this->createForm('checkerRepository', array('user' => $this->getUser()));
            $formRepository->handleRequest($request);

            if ($formRepository->isValid()) {
                $selectForm = 'repository';
                $data = $formRepository->getData();

                if (($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile && $data['schematron']->isValid()) || $data['policy'] instanceof \AppBundle\Entity\XslPolicyFile) {
                    $checks = array();

                    $finder = new Finder();
                    $finder->files()->in($this->container->getParameter('mco_check_folder'));
                    foreach($finder as $file) {
                        $checker = new Checker($file->getPathname());
                        if ($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                            $checker->setPolicyItem($data['schematron']);
                        }
                        else {
                            $helper = $this->container->get('vich_uploader.storage');
                            $policyFile = $helper->resolvePath($data['policy'], 'policyFile');
                            $checker->setPolicyItem($policyFile);
                        }

                        $checker->disableInfo()->run();
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
        }

        return array('formUpload' => isset($formUpload) ? $formUpload->createView() : false,
            'formOnline' => isset($formOnline) ? $formOnline->createView() : false,
            'formRepository' => isset($formRepository) ? $formRepository->createView() : false,
            'checks' => $checks,
            'selectForm' => $selectForm);
    }

    /**
     * @Route("/checkerAjaxTraceFolder/{id}.{format}", requirements={"id": "\d+", "format"})
     */
    public function checkerAjaxTraceFolderAction($id, $format, Request $request)
    {
        if ($request->isXmlHttpRequest()) {

            $finder = new Finder();
            $finder->files()->in($this->container->getParameter('mco_check_folder'));
            $i = 1;
            foreach ($finder as $file) {
                if ($i++ == $id) {
                    $checker = new Checker($file->getPathname());
                    $checker->disablePolicy()->disableInfo()->disableConformance()->enableTrace()->setTraceFormat(array($format));
                    $checker->run();
                }
            }

            return new Response(isset($checker) ? $checker->getTrace($format) : '');
        }
        else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @Route("/checkerAjaxInfoFolder/{id}.{format}", requirements={"id": "\d+", "format"})
     */
    public function checkerAjaxInfoFolderAction($id, $format, Request $request)
    {
        if ($request->isXmlHttpRequest()) {

            $finder = new Finder();
            $finder->files()->in($this->container->getParameter('mco_check_folder'));
            $i = 1;
            foreach ($finder as $file) {
                if ($i++ == $id) {
                    $checker = new Checker($file->getPathname());
                    $checker->disablePolicy()->enableInfo()->disableConformance()->disableTrace()->setInfoFormat(array($format));
                    $checker->run();
                }
            }

            return new Response(isset($checker) ? $checker->getInfo($format) : '');
        }
        else {
            throw new NotFoundHttpException();
        }
    }
}
