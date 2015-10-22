<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityRepository;

class CheckerRepositoryFormType extends AbstractType
{
    private $user;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $token = $tokenStorage->getToken();
        if ($token !== null && $token->getUser() instanceof \AppBundle\Entity\User) {
            $this->user = $token->getUser();
        }
        else {
            throw new \Exception('Invalid User');
        }
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add($builder->create('step1', 'form', array('inherit_data' => true, 'label' => 'Policy, Schematron or XSL'))
            ->add('policy', 'entity', array('class' => 'AppBundle:XslPolicyFile',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.user = :user')
                        ->setParameter('user', $this->user);
                },
                'placeholder' => 'Choose a policy',
                'required' => false,
                'label' => 'Choose a policy')
                )
            ->add('schematron', 'file', array('label' => 'Or upload a Schematron (.sch) or a XSL (.xsl) file',
                'required' => false,
                'attr' => array('accept' => '.sch, .xsl'))
                )
            )
            ->add('Check files', 'submit', array('attr' => array('class' => 'btn-warning')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        /*
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Policy',
        ));
        */
    }

    public function getName()
    {
        return 'checkerRepository';
    }
}
