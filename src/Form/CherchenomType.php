<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use PUGX\AutocompleterBundle\Form\Type\AutocompleteType;
use App\Entity\Prenom;

class CherchenomType extends AbstractType
{   
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $choices=range(1900,2017);
        $choices =array_flip($choices);
        $builder
            ->add('Prenom', AutocompleteType::class, ['class' => Prenom::class])
            ->add('Annee', ChoiceType::class, [
            'choices'=> $choices,
            'attr' => ['class' => 'custom-select'],
            ])
            // ->add('Département')
            ->add('Envoyer', SubmitType::class, [
        'attr' => ['onclick' =>'loadDoc();return false;', 'class' => 'btn btn-outline-danger']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
