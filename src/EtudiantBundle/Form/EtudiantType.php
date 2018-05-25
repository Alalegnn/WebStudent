<?php

namespace EtudiantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EtudiantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		    ->add('nom', TextType::class, array('label' => 'NOM ETUDIANT : '))
	     	->add('prenom', TextType::class)
	    	->add('dateNaiss', DateType::class)
		    ->add('adrMail', EmailType::class, array('required' => false))
			->add('telephone', TextType::class, array('required' => false))
			->add('rue', TextType::class, array('required' => false))
			->add('coPos', TextType::class, array('required' => false))
			->add('ville', TextType::class, array('required' => false))
			->add('section', EntityType::class, array('class' => 'EtudiantBundle:Section', 'choice_label' =>
			    'libelle', 'multiple' => false))
			->add('promotion', EntityType::class, array('class' => 'EtudiantBundle:Promotion', 'choice_label' =>
			    'libelle', 'multiple' => false))
			->add('niveau', EntityType::class, array('class' => 'EtudiantBundle:Niveau', 'choice_label' =>
			    'libelle', 'multiple' => false))
			;

			// Ajout du bouton de validation
			$builder->add('enregistrer', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EtudiantBundle\Entity\Etudiant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'etudiantbundle_etudiant';
    }


}
