<?php

namespace App\Form;

use App\Entity\Stage;
use App\Entity\Tuteur;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateStage')
            ->add('tuteur')
            ->add('user')
            ->add('tuteur', EntityType::class,array('class'=>Tuteur::class , 'choice_label'=>'nomTuteur'))
            ->add('user', EntityType::class,array('class'=>User::class , 'choice_label'=>'nomUser'))
            ->add('Enregistrer', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
