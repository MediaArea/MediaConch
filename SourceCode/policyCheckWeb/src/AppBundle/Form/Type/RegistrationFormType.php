<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('firstname')
            ->add('lastname')
            ->add('country', 'country', array('preferred_choices' => array('GB', 'FR', 'DE', 'IT', 'SE', 'NL', 'BE', 'CH', 'US', 'ES'),
                'placeholder' => 'Choose your country',
                'required' => false))
            ->add('language', 'language', array('preferred_choices' => array('en_GB', 'fr', 'de', 'it', 'sv', 'nl', 'en_US', 'es'),
                'placeholder' => 'Choose your language',
                'required' => false))
            ->add('professional', 'choice', array('choices' => array('u' => 'Not specified', 'y' => 'Yes', 'n' => 'No')))
            ->add('companyName')
            ->add('newsletter');
    }

    public function getName()
    {
        return 'mediaconch_user_registration';
    }
}
