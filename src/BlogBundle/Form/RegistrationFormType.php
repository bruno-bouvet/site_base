<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/10/2017
 * Time: 19:00
 */

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('username');
    }

    public function getParent()
    {
    return BaseRegistrationFormType::class;
    }


}