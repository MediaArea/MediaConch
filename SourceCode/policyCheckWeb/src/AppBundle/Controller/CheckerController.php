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
class CheckerController extends Controller
{
    /**
     * @Route("/checker")
     * @Template()
     */
    public function checkerAction()
    {
        return array();
    }
}
