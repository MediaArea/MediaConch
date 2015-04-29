<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use AppBundle\Entity\PolicyItemTypes;

class PolicyItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', null, array('placeholder' => 'Choose a type'))
            ->add('field', null, array('placeholder' => 'Choose a field'))
            ->add('validator', null, array('placeholder' => 'Choose a validator'))
            ->add('value');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PolicyItem',
            'validation_groups' => false,
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'policyItem';
    }
}
