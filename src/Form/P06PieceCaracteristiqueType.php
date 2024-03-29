<?php

namespace App\Form;

use App\Entity\P06PieceCaracteristique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Range;

class P06PieceCaracteristiqueType extends AbstractType
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
            ->add('PieceFaceCommune', NumberType::class, [
                "required"  => true,
                "constraints" => [
                    new NotBlank(),
                    new Positive()
                ]
            ])
            ->add('PieceMasse', NumberType::class, [
                "required" => true,
                "constraints" => [
                    new NotBlank(),
                    new Positive(),
                    new Range([
                        "min" => 0,
                        "max" => 10000,
                        "notInRangeMessage" => "mass should not exceed 10000 miligrames"
                    ])
                ]
            ])
            ->add('PieceTaille', NumberType::class, [
                "required" => true,
                "constraints" => [
                    new NotBlank(),
                    new Positive(),
                    new Range([
                        "min" => 50,
                        "max" => 200,
                        "notInRangeMessage" => "size should not exceed 200 milimiters"
                    ])
                ]
            ])
            ->add('PieceMateriau', TextType::class, [
                "required" => true,
                "constraints" => [
                    new NotBlank(),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => P06PieceCaracteristique::class,
        ]);
    }
}
