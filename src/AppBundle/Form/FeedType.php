<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FeedType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Title', 
        'attr' => array('class' => 'form-control')))
        ->add('body', TextareaType::class, array('label' => 'Description', 
        'attr' => array('class' => 'form-control')))
        ->add('image',
         FileType::class, array(
            'data_class' => null,
            'required' => false,
            'attr' => array('class' => 'form-control')
        ))->add('source', TextType::class, array('label' => 'Source', 
        'attr' => array('class' => 'form-control')))
        ->add('publisher', TextType::class, array('label' => 'Publisher', 
        'attr' => array('class' => 'form-control')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Feed'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_feed';
    }


}
