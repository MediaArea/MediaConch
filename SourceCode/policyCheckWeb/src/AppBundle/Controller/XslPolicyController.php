<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use AppBundle\Entity\XslPolicyFile;
use AppBundle\Entity\XslPolicyRule;
use AppBundle\Lib\XslPolicy\XslPolicyFormFields;

/**
 * @Route("/")
 */
class XslPolicyController extends Controller
{
    /**
     * @Route("/xslPolicy/")
     * @Template()
     */
    public function xslPolicyAction(Request $request)
    {
        $policyList = $this->getDoctrine()
            ->getRepository('AppBundle:XslPolicyFile')
            ->findByUser($this->getUser());

        $policy = new XslPolicyFile();
        $addPolicyForm = $this->createForm('xslPolicy', $policy);
        $addPolicyForm->handleRequest($request);
        if ($addPolicyForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // Set user at the creation of the policy
            if (null === $policy->getUser()) {
                $policy->setUser($this->getUser());
            }

            $em->persist($policy);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'success',
                'Policy successfully added'
                );
            return $this->redirect($this->generateUrl('app_xslpolicy_xslpolicy', array('id' => $policy->getId())));
       }

        return array('addPolicyForm' => isset($addPolicyForm) ? $addPolicyForm->createView() : false,
                     'policyList' => $policyList,
                     'selectedPolicy' => '');
    }

    /**
     * @Route("/xslPolicy/delete/{id}", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function xslPolicyDeleteAction($id)
    {
        $policy = $this->getDoctrine()
            ->getRepository('AppBundle:XslPolicyFile')
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

        return $this->redirect($this->generateUrl('app_xslpolicy_xslpolicy'));
    }

    /**
     * @Route("/xslPolicy/export/{id}", requirements={"id": "\d+"})
     * @Method("GET")
     */
    public function xslPolicyExportAction($id)
    {
        $policy = $this->getDoctrine()
            ->getRepository('AppBundle:XslPolicyFile')
            ->findOneBy(array('id' => $id, 'user' => $this->getUser()));

        if (!$policy) {
             $this->get('session')->getFlashBag()->add(
                'danger',
                'Policy not found'
                );

            return $this->redirect($this->generateUrl('app_xslpolicy_xslpolicy'));
        }
        else {
            $handler = $this->container->get('vich_uploader.download_handler');
            return $handler->downloadObject($policy, 'policyFile');
        }
    }

    /**
     * @Route("/xslPolicy/edit/{id}/{ruleId}", defaults={"ruleId" = "new"}, requirements={"id": "\d+", "ruleId": "\d+"})
     * @Template()
     */
    public function xslPolicyRuleEditAction($id, $ruleId, Request $request)
    {
        $policy = $this->getDoctrine()
            ->getRepository('AppBundle:XslPolicyFile')
            ->findOneBy(array('id' => $id, 'user' => $this->getUser()));

        if (!$policy) {
             $this->get('session')->getFlashBag()->add(
                'danger',
                'Policy not found'
                );

            return $this->redirect($this->generateUrl('app_xslpolicy_xslpolicy'));
        }

        $helper = $this->container->get('vich_uploader.storage');
        $policyFile = $helper->resolvePath($policy, 'policyFile');

        $parser = $this->get('mco.xslpolicy.parser');
        $parser->loadXsl($policyFile);

        if ('new' == $ruleId) {
            $rule = new XslPolicyRule();
        }
        else {
            if ($parser->getPolicy()->getRules()->containsKey($ruleId)) {
                $rule = $parser->getPolicy()->getRules()->get($ruleId);
            }
            else {
                $this->get('session')->getFlashBag()->add(
                    'danger',
                    'Policy rule not found'
                    );

                return $this->redirect($this->generateUrl('app_xslpolicy_xslpolicyruleedit', array('id' => $id)));
            }
        }

        $policyRuleForm = $this->createForm('xslPolicyRule', $rule);
        $policyRuleForm->handleRequest($request);
        if ($policyRuleForm->isValid()) {
            $rule->makeXpath();

            if ('new' == $ruleId) {
                $parser->getPolicy()->getRules()->add($rule);
            }
            else {
                $parser->getPolicy()->getRules()->set($ruleId, $rule);
            }

            $writer = $this->get('mco.xslpolicy.writer');
            $writer->setPolicy($parser->getPolicy());
            $writer->writeXsl($policyFile);

            $this->get('session')->getFlashBag()->add(
                'success',
                'Policy rule successfully saved'
                );

            return $this->redirect($this->generateUrl('app_xslpolicy_xslpolicyruleedit', array('id' => $id)));
        }
        return array('policyRuleForm' => isset($policyRuleForm) ? $policyRuleForm->createView() : false,
            'policy' => $policy,
            'xslPolicy' => $parser->getPolicy());
    }

    /**
     * @Route("/xslPolicy/deleteRule/{id}/{ruleId}", requirements={"id": "\d+", "ruleId": "\d+"})
     * @Method("GET")
     */
    public function xslPolicyRuleDeleteAction($id, $ruleId, Request $request)
    {
        $policy = $this->getDoctrine()
            ->getRepository('AppBundle:XslPolicyFile')
            ->findOneBy(array('id' => $id, 'user' => $this->getUser()));

        if (!$policy) {
             $this->get('session')->getFlashBag()->add(
                'danger',
                'Policy not found'
                );

            return $this->redirect($this->generateUrl('app_xslpolicy_xslpolicy'));
        }

        $helper = $this->container->get('vich_uploader.storage');
        $policyFile = $helper->resolvePath($policy, 'policyFile');

        $parser = $this->get('mco.xslpolicy.parser');
        $parser->loadXsl($policyFile);

        if ($parser->getPolicy()->getRules()->containsKey($ruleId)) {
            $parser->getPolicy()->getRules()->remove($ruleId);

            $writer = $this->get('mco.xslpolicy.writer');
            $writer->setPolicy($parser->getPolicy());
            $writer->writeXsl($policyFile);

            $this->get('session')->getFlashBag()->add(
                'success',
                'Policy rule successfully removed'
                );
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'danger',
                'Policy rule not found'
                );
        }

        return $this->redirect($this->generateUrl('app_xslpolicy_xslpolicyruleedit', array('id' => $policy->getId())));
    }

    /**
     * @Route("/xslPolicy/fieldsListRule")
     * @Method({"POST"})
     */
    public function xslPolicyRuleFieldsListAction(Request $request) {
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }

        // Get the type value
        $type = $request->request->get('type');

        return new JsonResponse(XslPolicyFormFields::getFields($type));
    }
}
