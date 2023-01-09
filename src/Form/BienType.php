<?php

namespace App\Form;

use App\Entity\Bien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use Symfony\Component\Validator\Constraints as Assert;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero')
            ->add('titre', TextType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=> 'Titre du bien'
            ])
            ->add('description', TextareaType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=> 'Description'
            ])
            ->add('localisation', TextType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label'=>'Localisation'
            ])
            ->add('surface', IntegerType::class, [
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label' => 'Surface en Ha'
            ])
            ->add('prix', MoneyType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label' => 'Prix'
            ])
            ->add('isFavorite', CheckboxType::class,[
                'attr'=>[
                    'class'=>'form-control'
                    
                ],
                'required'=>false,
                'label' => 'Favoris'
            ])
            ->add('categorie')
            ->add('submit', SubmitType::class,[
                'attr'=>[
                    'class'=>'btn btn-primary mt-4'
                ],
                'label'=>'Créer'
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
