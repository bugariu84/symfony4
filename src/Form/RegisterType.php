<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterType extends AbstractType
{
    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, ['required' => false])
            ->add('password', RepeatedType::class, [
                'required' => false,
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
            ])
            ->add('email', EmailType::class)
            ->addEventListener(FormEvents::POST_SUBMIT, [$this, 'onPostSubmit']);
    }

    public function onPostSubmit(FormEvent $event)
    {
        /** @var User $user */
        $user = $event->getData();
        $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
