<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Status;
use App\Entity\Membership;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'name',
            ])
            ->add('membership', EntityType::class, [
                'class' => Membership::class,
                'choice_label' => 'type',
            ])
            ->add('customer_code')
            ->add('email')
            ->add('phone')
            ->add('joined_at')
            ->add('last_visit')
            ->add('total_spent')
            ->add('total_hours');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
