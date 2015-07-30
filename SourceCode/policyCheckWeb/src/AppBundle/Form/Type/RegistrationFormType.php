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
            ->add('country', 'country_custom')
            ->add('language', 'language_custom')
            ->add('professional', 'professional', array('required' => false))
            ->add('companyName')
            ->add('newsletter');
    }

    public function getName()
    {
        return 'mediaconch_user_registration';
    }
}
