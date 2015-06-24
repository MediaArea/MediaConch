<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LanguageCustomType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'preferred_choices' => array('en_GB', 'fr', 'de', 'it', 'sv', 'nl', 'en_US', 'es'),
            'placeholder' => 'Choose your language',
            'required' => false,
        ));
    }

    public function getParent()
    {
        return 'language';
    }

    public function getName()
    {
        return 'language_custom';
    }
}
