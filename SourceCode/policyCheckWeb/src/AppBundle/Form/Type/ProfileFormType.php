<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
    public function getName()
    {
        return 'mediaconch_user_profile';
    }

    /**
     * Builds the embedded form representing the user.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    protected function buildUserForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildUserForm($builder, $options);

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
}
