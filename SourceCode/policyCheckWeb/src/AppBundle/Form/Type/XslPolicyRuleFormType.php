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
        $builder->add('title', 'text', array('data' => ('' == $options['data']->getTitle()) ? 'New rule' : $options['data']->getTitle(), 'label' => 'Rule name'))
            ->add('editor', 'choice', array('data' => ('is_true' == $options['data']->getValidator()) ? 1 : 0, 'mapped' => false, 'choices' => array('Editor', 'Free text'), 'expanded' => true, 'multiple' => false))

            // Standard editor
            ->add('trackType', 'choice', array('placeholder' => 'Choose a track type', 'choices' => XslPolicyFormFields::getTrackTypes()))
            ->add('field', 'choice', array('placeholder' => 'Choose a field', 'choices' => XslPolicyFormFields::getFields($options['data']->getTrackType(), $options['data']->getField())))
            ->add('occurrence', 'text')
            ->add('validator', 'choice', array('placeholder' => 'Choose a validator', 'choices' => XslPolicyFormFields::getValidators()))
            ->add('value')

            // Free text editor
            ->add('valueFreeText', 'textarea', array('mapped' => false, 'data' => ('' == $options['data']->getValue()) ? 'ma:MediaInfo/ma:track[@type=\'General\'][1]/ma:Format = \'Matroska\' or ma:MediaInfo/ma:track[@type=\'General\'][1]/ma:Format = \'AVI\'' : $options['data']->getValue(), 'label' => 'Xpath expression'))

            ->add('Save rule', 'submit', array('label' => ('' == $options['data']->getTitle()) ? 'Add rule' : 'Save rule', 'attr' => array('class' => 'btn-warning')));

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

            // Free text editor
            if ($item && isset($item['editor']) && 1 == $item['editor']) {
                $item['validator'] = 'is_true';
                $item['value'] = $item['valueFreeText'];
                $event->setData($item);

                $form->add('validator', 'choice', array('placeholder' => 'Choose a validator', 'choices' => array('is_true' => 'is_true')));
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    }

    public function getName()
    {
        return 'xslPolicyRule';
    }
}
