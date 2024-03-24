<?php

namespace App\Form;

use App\Entity\P06PieceModele;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class P06PieceModeleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id')
            ->add('PieceVersion')
            ->add('PieceValeur')
            ->add('PieceDateFrappee')
            ->add('PieceQuantiteFrappee')
            ->add('PaysID')
            ->add('PieceTranche')
            ->add('PieceCaracteristique')
            ->add('collections')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => P06PieceModele::class,
        ]);
    }
}
