<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{

    public function contact(Request $request)
    {
        $defaultData = [];
        $form = $this->createFormBuilder($defaultData)
            ->add('email', EmailType::class,array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Votre email',
                    'class' => 'col s12 browser-default contact_input'
                )
            ))
            ->add('object', TextType::class,array(
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Objet du contact',
                    'class' => 'col s12 contact_input browser-default'
                )
            ))
            ->add('message', TextareaType::class,array(
                'label' => false,
                'data' => '',
                'attr' => array(
                    'placeholder' => 'Message',
                    'class' => 'col s12 contact_text_area contact_input browser-default',
                )
            ))
            ->add('send', SubmitType::class,array(
                'label' => 'Envoyer',
                'attr' => array(
                    'style' => 'padding-top: 5px; cursor: pointer;',
                    'class' => 'button_purple savoir_plus',
                )
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            //TODO Send mail
        }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView(),
        ]);
    }
}
