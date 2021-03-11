<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\Request;
use App\Enum\RequestHttpMethodEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class RequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url', TextType::class, ['constraints' => [new NotBlank()]])
            ->add('method', ChoiceType::class, ['choices' => RequestHttpMethodEnum::toArray(), 'constraints' => [new NotBlank()]])
            ->add('body', TextareaType::class, ['required' => false])
            ->add('headers', CollectionType::class, [
                'label' => null,
                'entry_type' => HeaderType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Request::class,
        ]);
    }
}
