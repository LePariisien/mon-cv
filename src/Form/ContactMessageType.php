<?php

namespace App\Form;

use App\Entity\ContactMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'attr' => ['class' => 'form-control mb-2', 'placeholder' => 'Prénom'],
                'label' => 'Prénom :'
            ])
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom'],
                'label' => 'Nom :'
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Email'],
                'label' => 'Email :'
            ])
            ->add('message', null, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre message',
                    'rows' => 5,
                    'style' => 'resize: vertical;', // Permet de redimensionner verticalement
                ],
                'label' => 'Message :'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactMessage::class,
        ]);
    }
}
