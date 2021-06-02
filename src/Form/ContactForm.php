<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactForm extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('Your_Name', 
                TextType::class,[
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Your Name',
                        'maxlength' => 255,
                        'class' => 'form-control form-control-lg'
                        ]])
            ->add('Your_Email', 
                EmailType::class,[
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Your Email',
                        'maxlength' => 255,
                        'class' => 'form-control form-control-lg'
                        ]])
            ->add('The_Message', 
                TextareaType::class,[
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'The Message',
                        'maxlength' => 255,
                        'class' => 'form-control form-control-lg'
                        ]])

            ->add('Reset', 
                ResetType::class,[
                    'attr' => [
                        'class' => 'bg-warning btn btn-lg m-4'
                    ]
                ])
            ->add('Send', SubmitType::class,[
                'attr' => [
                    'class' => 'bg-warning btn btn-lg m-4'
                ]
            ])
        ;
    }
}