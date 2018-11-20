<?php

namespace ValidationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use ValidationBundle\Entity\Book;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;


class AuthorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('books',EntityType::class , [
            'class' => Book::class,
            'multiple' => true,
            'choices' => $options['data']->getBooks(),
            'mapped' => true,
            'required' => false,
        ])->add('nBooks', EntityType::class, array(
            'class' => Book::class,
            'mapped' => false,
            'multiple' => true,
            'required' => false
        ))
        ->add('firstName')
        ->add('lastName')->add('email')
        ->add('username', TextType::class)->add('adress')->add('company')->add('country')->add('postalCode')->add('description');
        
        
      /*  $builder->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event){
            $data = $event->getData();
        
            $data['nBooks'] = NULL;

            $event->setData($data); 
        });*/
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ValidationBundle\Entity\Author'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'validationbundle_author';
    }


}
