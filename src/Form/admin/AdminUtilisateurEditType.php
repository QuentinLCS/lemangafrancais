<?php

namespace App\Form\admin;

use App\Entity\Role;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class AdminUtilisateurEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('utiIdParrainer')
            ->add('lanId', ChoiceType::class, [
                'choices' => [1,2,3,4]
            ])
            ->add('utiMail')
            ->add('utiTelephone')
            ->add('utiNaissance', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                'attr' => [
                    'class' => 'datepicker'
                ]
            ])
            ->add('utiAvatarFichier', FileType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Upload an avatar'
                ]
            ])
            ->add('utiTokens')
            ->add('utiBiographie')
            ->add('utiMdp', PasswordType::class, [
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new Length([
                        'min' => 6,
                        'max' => 4096,
                    ]),
                ]
            ])
            ->add('utiRoles', EntityType::class, [
                'class' => Role::class,
                'choice_label' => 'rolNom',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
            'translation_domain' => 'utilisateur_form'
        ]);
    }
}
