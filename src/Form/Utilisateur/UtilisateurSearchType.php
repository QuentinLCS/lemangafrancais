<?php

namespace App\Form\Utilisateur;

use App\Entity\Role;
use App\Entity\UtilisateurSearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudonyme', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Search for a user',
                    'class' => 'autocomplete center'
                ]
            ])
            ->add('roles', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Role::class,
                'choice_label' => 'rolNom',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UtilisateurSearch::class,
            'method' => 'GET',
            'csrf_protection' => false,
            'translation_domain' => 'utilisateur_form'

        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
