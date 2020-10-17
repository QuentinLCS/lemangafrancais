<?php

namespace App\Form\Role;

use App\Entity\RoleSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoleSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Search for a rank',
                    'class' => 'autocomplete center'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RoleSearch::class,
            'method' => 'GET',
            'csrf_protection' => false,
            'translation_domain' => 'role_form'

        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
