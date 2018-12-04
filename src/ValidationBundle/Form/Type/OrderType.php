<?php 
// src/ValidationBundle/Form/Type/OrderType.php
namespace ValidationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('shipping_code', ShippingType::class, array(
                         'placeholder' => 'Choose a delivery option',
               ))->add('age', IntegerType::class);
    }
}