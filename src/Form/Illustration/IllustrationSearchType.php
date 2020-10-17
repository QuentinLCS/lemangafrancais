<?php
namespace App\Form\Illustration;

use App\Entity\IllustrationSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IllustrationSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => "Ill titre",
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
            'data_class' => IllustrationSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
            'translation_domain' => 'Illustration_form'
        ]);
    }

    public function getBlockPrefix()
    {
        return "";
    }
}


