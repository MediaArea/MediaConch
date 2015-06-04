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
            ->add('country', 'country', array('preferred_choices' => array('GB', 'FR', 'DE', 'IT', 'SE', 'NL', 'BE', 'CH', 'US'),
                'empty_value' => 'Choose your country'))
            ->add('language', 'language', array('preferred_choices' => array('en_GB', 'fr', 'de', 'it', 'sv', 'nl', 'en_US'),
                'empty_value' => 'Choose your language'))
            ->add('isProfessional')
            ->add('companyName')
            ->add('newsletter');
    }

    public function getName()
    {
        return 'mediaconch_user_registration';
    }
}
