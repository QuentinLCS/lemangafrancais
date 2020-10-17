<?php

namespace App\Form\News;

use App\Entity\NewsSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => "Pub titre",
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
            'data_class' => NewsSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
            'translation_domain' => 'publication_form'
        ]);
    }

    public function getBlockPrefix()
    {
        return "";
    }
}
