<?php

namespace ValidationBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookChoiceType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {}

    public function getParent()
    {
        return EntityType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'book_choice';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'book_choice';
    }
}