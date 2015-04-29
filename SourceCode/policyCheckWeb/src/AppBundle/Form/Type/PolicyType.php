<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PolicyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('items', 'collection', array('type' => new PolicyItemType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                ))
            ->add('save', 'submit', array('label' => 'Save policy'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Policy',
            'validation_groups' => false,
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'policy';
    }
}

