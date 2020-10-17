<?php


namespace App\Form\Illustration;


use App\Entity\Illustration;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IllustrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('illTitre', TextType::class,[
                'required' => true,
                'label' => 'Titre'
            ])
            ->add('illContenu', CKEditorType::class, [
                'label' => false,
                'config' => [
                    'config_name' => 'basic_config',
                ]
            ])
            ->add('images', FileType::class, [
                    'required'=> false,
                    'multiple' => true,
                    'attr'     => [
                        'accept' => 'image/*',
                        'multiple' => 'multiple',
                        'placeholder' => 'choisir une image'
                    ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Illustration::class,
            'translation_domain' => 'illustration_form' //TODO faire la traduction
        ]);
    }
}