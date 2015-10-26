<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class XslPolicyCreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('policyName')
            ->add('policyDescription', 'textarea', array('required' => false))
            ->add('Create policy', 'submit', array('attr' => array('class' => 'btn-warning')));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
    }

    public function getName()
    {
        return 'xslPolicyCreate';
    }
}
