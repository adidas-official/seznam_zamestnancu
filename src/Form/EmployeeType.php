<?php

namespace App\Form;

use App\Entity\Employee;
use App\Entity\Workplace;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, [
                'label' => 'Jméno'
            ])
            ->add('last_name', TextType::class, [
                'label' => 'Příjmení'
            ])
            ->add('active', CheckboxType::class, [
                'label' => 'Aktivní',
                'required' => false,
            ])
            ->add('worktitle', TextType::class, [
                'label' => 'Pracovní pozice'
            ])
            ->add('salary', TextType::class, [
                'label' => 'Plat'
            ])
            ->add('Id_workplace', EntityType::class, [
                'class' => Workplace::class,
                'choice_label' => 'title',
                'label' => 'Pracoviště',
                'multiple' => true,
                'expanded' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
