<?php

namespace App\Form\admin;

use App\Entity\News;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminNewsEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('news_titre')
            ->add('news_contenu',CKEditorType::class, [
                'label' => false,
                'config' => [
                    'config_name' => 'basic_config',
                ],
            ])
            ->add('newsPhotoFichier', FileType::class,[
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => News::class,
            'translation_domain' => 'publication_form'
        ]);
    }
}
