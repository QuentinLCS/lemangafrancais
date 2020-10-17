<?php
namespace App\Form\Scenario;

use App\Entity\ScenarioSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScenarioSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                    'required' => false,
                    'label' => false,
                    'attr' => [
                        'placeholder' => "Sce titre",
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
            'data_class' => ScenarioSearch::class,
            'method' => 'get',
            'csrf_protection' => false,
            'translation_domain' => 'Scenario_form'
        ]);
    }

    public function getBlockPrefix()
    {
        return "";
    }
}


