<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class,[
                'attr'=>[
                    'class'=>'form-control',
                    'minlength'=>'2',
                    'maxlength'=>'20'
                ],
                'label'=>'Prénom'
            ])
            ->add('nom', TextType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label'=>'Nom'
            ])
            ->add('email', EmailType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label'=>'Email'
            ])
            ->add('login', TextType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label'=>'Login'
            ])
            ->add('password', RepeatedType::class,[
                'type'=> PasswordType::class,
                'first_options'=>[
                    'label'=>'Mot de passe',
                ],
                'second_options'=>[
                    'label'=>'Confirmation de mot de passe'
                ],
                'invalid_message'=>'les mots de passes ne sont pas identiques'
            ])
            ->add('submit', SubmitType::class, [
                'attr'=>[
                    'class'=>'btn btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
