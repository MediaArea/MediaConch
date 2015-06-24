<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntityDisabledType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'disabled' => true,
            'class' => 'AppBundle\Entity\User'
        ));
    }

    public function getParent()
    {
        return 'entity';
    }

    public function getName()
    {
        return 'entity_disabled';
    }
}
