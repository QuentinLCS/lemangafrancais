<?php

namespace App\Form\Lexicon;

use App\Entity\LexiqueSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LexiqueSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mot', TextType::class, [
                'required' => false,
                'label' => 'Mot',
                'attr' => [
                    'placeholder' => 'Chercher un mot',
                    'class' => 'autocomplete center'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LexiqueSearch::class,
            'method' => 'GET',
            'csrf_protection' => false,
            'translation_domain' => 'lexique_form'

        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}