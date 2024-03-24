<?php

namespace App\Form;

use App\Entity\P06Collectionneur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class P06CollectionneurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id')
            ->add('CollectionneurNom')
            ->add('CollectionneurPrenom')
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
