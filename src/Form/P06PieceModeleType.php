<?php

namespace App\Form;

use App\Entity\P06PieceModele;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('PieceDateFrappee', DateType::class, array(
                 'widget' => 'choice',
                 'years' => range(date('Y')-100, date('Y')+100),
                 'months' => range(date('m'), 12),
                 'days' => range(date('d'), 31),
            ))
            ->add('PieceQuantiteFrappee')
            ->add('PiecePays')
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
