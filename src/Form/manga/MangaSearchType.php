<?php

namespace App\Form\manga;

use App\Entity\MangaSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MangaSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => "Man titre",
                        'class' => 'autocomplete',
                        'autocomplete' => "off"
                    ]
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MangaSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
            'translation_domain' => 'Manga_form'
        ]);
    }

    public function getBlockPrefix()
    {
        return "";
    }
}