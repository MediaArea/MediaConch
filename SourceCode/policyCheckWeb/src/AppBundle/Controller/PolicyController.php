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

use AppBundle\Entity\Policy;
use AppBundle\Form\Type\PolicyType;

/**
 * @Route("/")
 */
class PolicyController extends Controller
{

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
                return $this->redirect($this->generateUrl('app_policy_policy', array('id' => $policy->getId())));
            }

            return array('form' => $form->createView(), 'policyList' => $policyList, 'selectedPolicy' => $id);
        }
        else {
            $this->get('session')->getFlashBag()->add(
                'danger',
                $this->renderView('AppBundle:Default:quotaExceeded.html.twig')
            );

            return array('form' => false, 'policyList' => $policyList, 'selectedPolicy' => $id);
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

        return $this->redirect($this->generateUrl('app_policy_policy'));
    }
}
