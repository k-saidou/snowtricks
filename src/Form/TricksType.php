<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Tricks;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class TricksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('description', TextareaType::class)
            ->add('image', FileType::class, [
                'label' => 'Images',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,
                'multiple' => true,
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new All([
                        new File([
                        'maxSize' => '20M',
                            ])
                        ])
                    ],
                ])
            ->add('video1', TextareaType::class, array('data_class' => null,
                'mapped' => false,
                'required' => false,
                ))
            ->add('video2', TextareaType::class, array('data_class' => null,
                'mapped' => false,
                'required' => false,

                ))
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class])
        ;

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) use ($options) {
            $form = $event->getForm();
            $data = $event->getData();

            // Si le nom existe dans les données, générez le slug
            if (isset($data['nom'])) {
                $slugger = $options['slugger'];
                $slug = $slugger->slug($data['nom'])->lower();

                // Ajoutez le slug aux données du formulaire
                $data['slug'] = $slug;
                $event->setData($data);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tricks::class,
            'slugger' => null, // Ajoutez cette ligne

        ]);
    }
}
