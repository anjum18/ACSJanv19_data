<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;




class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices=range(1900,2017);
        $choices =array_flip($choices);
    

        $builder
            ->add('genre', ChoiceType::class, [
                'choices' => ['Masculin'=>1, 'Féminin'=>2]
            ])
            ->add('year', ChoiceType::class, [
            'choices'=> $choices
            ]
            )
            ->add('Rechercher', SubmitType::class, [
            'attr' => ['class' => 'save btn-success'],
            ])
            // ->add('from', EmailType::class)
            // ->add('dateOfBirth', DateTimeType::class)
            // ->add('message', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
