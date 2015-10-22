<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use AppBundle\Lib\XslPolicy\XslPolicyFormFields;

class XslPolicyRuleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
            ->add('trackType', 'choice', array('placeholder' => 'Choose a track type', 'choices' => XslPolicyFormFields::getTrackTypes()))
            ->add('field', 'choice', array('placeholder' => 'Choose a field', 'choices' => XslPolicyFormFields::getFields($options['data']->getTrackType(), $options['data']->getField())))
            ->add('occurrence', 'text')
            ->add('validator', 'choice', array('placeholder' => 'Choose a validator', 'choices' => XslPolicyFormFields::getValidators()))
            ->add('value')
            ->add('Save rule', 'submit', array('attr' => array('class' => 'btn-warning')));

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
            $item = $event->getData();
            $form = $event->getForm();

            if ($item && null !== $item->getTrackType()) {
                $form->add('field', 'choice', array('placeholder' => 'Choose a field', 'choices' => XslPolicyFormFields::getFields($item->getTrackType(), $item->getField())));
            }
        });

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $item = $event->getData();
            $form = $event->getForm();

            if ($item && isset($item['trackType'])) {
                $form->add('field', 'choice', array('placeholder' => 'Choose a field', 'choices' => XslPolicyFormFields::getFields($item['trackType'], $item['field'])));
            }
        });    }

    public function configureOptions(OptionsResolver $resolver)
    {
    }

    public function getName()
    {
        return 'xslPolicyRule';
    }
}
