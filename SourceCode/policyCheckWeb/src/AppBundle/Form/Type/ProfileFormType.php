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
            ->add('country', 'country_custom')
            ->add('language', 'language_custom')
            ->add('professional', 'professional')
            ->add('companyName')
            ->add('newsletter');
    }
}
