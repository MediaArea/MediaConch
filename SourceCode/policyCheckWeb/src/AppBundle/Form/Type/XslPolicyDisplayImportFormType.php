<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class XslPolicyDisplayImportFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('policyDisplayName')
            ->add('policyDisplayFile', 'file', array('attr' => array('accept' => '.xsl,.xml')))
            ->add('ImportPolicyDisplay', 'submit', array('attr' => array('class' => 'btn-warning')));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
    }

    public function getName()
    {
        return 'xslPolicyDisplayImport';
    }
}
