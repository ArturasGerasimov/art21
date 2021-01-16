<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EmployType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'    => 'Please enter your full name'
            ])
            ->add('isExperienced', CheckboxType::class, [
                'required' => false,
                'label'    => 'Please check this checkbox if you have more then one year experience with PHP'
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}