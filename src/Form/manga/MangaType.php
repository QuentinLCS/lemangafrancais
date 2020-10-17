<?php


namespace App\Form\manga;


use App\Entity\Manga;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MangaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('manTitre', TextType::class,[
                'required' => true,
                'label' => 'Titre'
            ])
            ->add('manContenu', CKEditorType::class, [
                'label' => false,
                'config' => [
                    'config_name' => 'basic_config',
                ]
            ])
            ->add('images', FileType::class, [
                'multiple' => true,
                'attr'     => [
                    'accept' => 'image/*',
                    'multiple' => 'multiple',
                    'placeholder' => 'choisir des images'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Manga::class,
            'translation_domain' => 'manga_form'
        ]);
    }
}