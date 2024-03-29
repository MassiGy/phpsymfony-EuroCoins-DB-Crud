<?php

namespace App\Form;

use App\Entity\P06PieceModele;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class P06PieceModeleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('id', NumberType::class, [
            //     "required" => true,
            //     "constraints" => [
            //         new NotBlank(),
            //         new Positive()
            //     ]
            // ])
            ->add('PieceVersion', TextType::class, [
                "required" => true,
                // "constraints" => [
                //     new NotBlank()
                // ]
            ])
            ->add('PieceValeur', IntegerType::class, [
                "required" => true,
                // "constraints" => [
                //     new NotBlank(),
                //     new Positive()
                // ]
            ])
            ->add('PieceDateFrappee', DateType::class, array(
                 'widget' => 'choice',
                 'years' => range(date('Y')-100, date('Y')),
                 'months' => range(1, 12),
                 'days' => range(1, 31),
                 "required" => true,
                //  "constraints" => [
                //     new NotBlank(),
                //  ]
            ))
            ->add('PieceQuantiteFrappee', IntegerType::class, [
                "required" => true,
                // "constraints" => [
                //     new NotBlank(),
                //     new Positive()
                // ]
            ])
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
