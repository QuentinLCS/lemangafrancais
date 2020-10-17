<?php


namespace App\Form\Ticket;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;


class TicketEditType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sujet')
            ->add('type',ChoiceType::class,[
                'choices' => [
                    'question' => 'question',
                    'problème' => 'probleme',
                    'suggestion' =>'suggestion']
            ])
            ->add('contenu',CKEditorType::class, array(
                'config' => array(
                    'config_name' => 'basic_config',

                ),))
        ;
    }


}