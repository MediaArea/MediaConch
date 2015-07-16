<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityRepository;

class CheckerUploadFormType extends AbstractType
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
        $builder
            ->add('policy', 'entity', array('class' => 'AppBundle:Policy',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.user = :user')
                        ->setParameter('user', $this->user);
                },
                'placeholder' => 'Choose a policy',
                'required' => false)
                )
            ->add('schematron', 'file', array('label' => 'Schematron',
                'required' => false)
                )
            ->add('file', 'file', array('label' => 'File (max ' . ini_get('upload_max_filesize') . ')'))
            ->add('Check file', 'submit');
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
        return 'checkerUpload';
    }
}
