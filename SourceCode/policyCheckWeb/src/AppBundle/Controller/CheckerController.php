<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
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

        if ($this->get('mediaconch_user.quotas')->hasUploadsRights()) {
            $formUpload = $this->createForm('checkerUpload');
            $formUpload->handleRequest($request);

            if ($formUpload->isValid()) {
                $data = $formUpload->getData();
                if (($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile && $data['schematron']->isValid()) || $data['policy'] instanceof \AppBundle\Entity\Policy) {
                    if ($data['file']->isValid()) {
                        if ($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                            $checker = new Checker($data['file'], $data['schematron']);
                        }
                        else {
                            $checker = new Checker($data['file'], $data['policy']);
                        }

                        $checker->run();
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
                $data = $formOnline->getData();

                if (($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile && $data['schematron']->isValid()) || $data['policy'] instanceof \AppBundle\Entity\Policy) {
                    if ($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                        $checker = new Checker(str_replace(' ', '%20', $data['file']), $data['schematron']);
                    }
                    else {
                        $checker = new Checker(str_replace(' ', '%20', $data['file']), $data['policy']);
                    }

                    $checker->run();
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
                $data = $formRepository->getData();

                if (($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile && $data['schematron']->isValid()) || $data['policy'] instanceof \AppBundle\Entity\Policy) {
                    $checks = array();
                    $params = $this->container->getParameter('mediaconch');

                    $finder = new Finder();
                    $finder->files()->in($params['check_dir']);
                    foreach($finder as $file) {
                        if ($data['schematron'] instanceof \Symfony\Component\HttpFoundation\File\UploadedFile) {
                            $checker = new Checker($file->getPathname(), $data['schematron']);
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
        }

        return array('formUpload' => $formUpload->createView(),
            'formOnline' => $formOnline->createView(),
            'formRepository' => isset($formRepository) ? $formRepository->createView() : false,
            'checks' => $checks);
    }
}
