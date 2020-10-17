<?php

namespace App\Form\Recruitment;

use App\Entity\Recrutement;
use App\Entity\Role;
use App\Entity\Utilisateur;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecruitmentEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label' => 'RolNom'
            ])
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'required' => false,
                'choice_label' => 'id'
            ])
            ->add('recDateString', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'datetimepicker'
                ]
            ])
            ->add('recDuree', NumberType::class, [
                'required' => false
            ])
            ->add('recImageFichier', FileType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Upload an image'
                ]
            ])
            ->add('recResume',TextType::class, [
                'required' => false,
            ])
            ->add('recContenu',CKEditorType::class, [
                'label' => false,
                'config' => [
                    'config_name' => 'basic_config',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recrutement::class,
            'translation_domain' => 'recruitment_form'
        ]);
    }
}
