<?php

namespace App\Form;

use App\Entity\Pays;
use App\Entity\Capitale;
use App\Entity\Continent;
use App\Form\CapitaleType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class PaysType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', NULL, [
                'label' => "Nom Pays"
            ])
            ->add('continent', EntityType::class, [
                "class" => Continent::class,
                "choice_label" => 'nom'
            ])
            // ->add('capitale', EntityType::class, [
            //     "class" => Capitale::class,
            //     "choice_label" => 'nom'
            // ])
            ->add('capitale', CapitaleType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pays::class,
        ]);
    }
}
