<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 18/10/2017
 * Time: 10:48
 */

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \Symfony\Component\Validator\Exception\ConstraintDefinitionException
     * @throws \Symfony\Component\Validator\Exception\InvalidOptionsException
     * @throws \Symfony\Component\Validator\Exception\MissingOptionsException
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, array('attr' => array('placeholder' => 'Votre Nom / Prénom'),
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci de renseigner votre Nom / Prénom')),
                )
            ))
            ->add('email', EmailType::class, array('attr' => array('placeholder' => 'Adresse email'),
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci de renseigner une adresse email valide')),
                    new Email(array('message' => "Voter email ne semble pas valide")),
                )
            ))
            ->add('subject', TextType::class, array('attr' => array('placeholder' => 'Sujet de votre message'),
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci de renseigner le sujet')),
                )
            ))
            ->add('message', TextareaType::class, array('attr' => array('placeholder' => 'Message'),
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci d\'écrire quelque chose dans ce magnigique champ message ^^  ')),
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }
}

