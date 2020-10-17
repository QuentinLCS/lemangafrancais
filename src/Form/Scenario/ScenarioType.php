<?php


namespace App\Form\Scenario;


use App\Entity\Scenario;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScenarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sceTitre',TextType::class,[
                'required' => true,
                'label' => 'Titre'
            ])
            ->add('sceContenu', CKEditorType::class, [
                'label' => false,
                'config' => [
                    'config_name' => 'basic_config',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scenario::class,
            'translation_domain' => 'scenario_form' //TODO faire la traduction
        ]);
    }
}