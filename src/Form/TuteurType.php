<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Tuteur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class TuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomTuteur')
            ->add('prenomTuteur')
            ->add('mailTuteur')
            ->add('telTuteur')
            ->add('entreprise', EntityType::class,array('class'=>Entreprise::class , 'choice_label'=>'nomEntreprise'))
            ->add('Enregistrer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tuteur::class,
        ]);
    }
}
