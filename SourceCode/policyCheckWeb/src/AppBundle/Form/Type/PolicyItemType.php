<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use AppBundle\Entity\PolicyItemTypes;
use AppBundle\Entity\PolicyItemFieldsRepository;

class PolicyItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type', null, array('placeholder' => 'Choose a type'))
            ->add('field', null, array('placeholder' => 'Choose a field', 'class' => 'AppBundle\Entity\PolicyItemFields',
                    'query_builder' => function(PolicyItemFieldsRepository $r) {
                                    return $r->queryAllFieldsByType(0);
                                }
            ))
            ->add('validator', null, array('placeholder' => 'Choose a validator'))
            ->add('value');

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) {
            $item = $event->getData();
            $form = $event->getForm();

            if ($item && null !== $item->getId()) {
                $form->add('field', 'entity', array('placeholder' => 'Choose a field', 'class' => 'AppBundle\Entity\PolicyItemFields',
                    'query_builder' => function(PolicyItemFieldsRepository $r) use($item) {
                                    return $r->queryAllFieldsByType($item->getType()->getId());
                                }
            ));
            }
        });

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $item = $event->getData();
            $form = $event->getForm();

            if ($item && isset($item['type'])) {
                $form->add('field', 'entity', array('placeholder' => 'Choose a field', 'class' => 'AppBundle\Entity\PolicyItemFields',
                    'query_builder' => function(PolicyItemFieldsRepository $r) use($item) {
                                    return $r->queryAllFieldsByType($item['type']);
                                }
            ));
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
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
