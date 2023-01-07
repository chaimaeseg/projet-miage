<?php

namespace App\Form;

use App\Entity\Bien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class AjoutBienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Nom',
                'label-attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('surface', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Surface en Ha',
                'label-attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Positive()
                ]
                ])
            ->add('categorie', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Ctégorie',
                'label-attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Choice(['Terrain agricole', 'Prairie', 'Bois', 'Batiments','Exploitations'])
                ]
            ])
            ->add('prix', MoneyType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Prix',
                'label-attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Positive()
                ]
            ])
            ->add('localisation', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Localisation',
                'label-attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Description',
                'label-attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('Pour', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Location\Vente',
                'label-attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Choice(['Location', 'vente'])
                ]
            ])
            ->add('numero', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Numéro',
                'label-attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' =>[
                    'class' => 'btn btn-primary mt-4'
                ],
                'label' => [
                    'Ajouter'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
