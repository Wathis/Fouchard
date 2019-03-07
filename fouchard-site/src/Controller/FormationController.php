<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{

    public function index() {
        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }

    public function formation_voiture()
    {
        return $this->render('formation/voiture.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }
    public function formation_deux_roues()
    {
        return $this->render('formation/deux_roues.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }
    public function formation_poid_lourd()
    {
        return $this->render('formation/poid_lourd.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }
    public function formation_remorque()
    {
        return $this->render('formation/remorque.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }
}
