<?php

namespace App\Form;

use App\Entity\P06Collectionneur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class P06CollectionneurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            /** @NOTE: The id are ignored since it is a generated
             *  value, but the code is kept commented in order
             *  to be able to test and iterate quickly.
             * 
             *  @NOTE: The constraints are also commented from 
             *  the form fields since they were already implemented 
             *  in the entities. Otherwise duplicated flash messages 
             *  will be sent to the end user.
             */

            // ->add('id', NumberType::class, [
            //     "required" => true,
            //     "constraints" => [
            //         new NotBlank(),
            //         new Positive()
            //     ],
            //     "attr" => [
            //         // "class" => "d-flex"
            //     ]
            // ])
            ->add('CollectionneurNom', TextType::class, [
                "required" => true,
                // "constraints" => [
                //     new NotBlank(),
                // ]
            ])
            ->add('CollectionneurPrenom', TextType::class, [
                "required" => true,
                // "constraints" => [
                //     new NotBlank(),
                // ]
            ])
            ->add('modelesCollectionnes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => P06Collectionneur::class,
        ]);
    }
}
