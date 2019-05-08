<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MaterielController extends AbstractController
{

    public function materiel()
    {
        $PATH_MATERIEL_NAME = "photos_materiel";
        $PATH_MATERIEL =  $this->getParameter('kernel.project_dir') . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . $PATH_MATERIEL_NAME;

        $directories = glob($PATH_MATERIEL . DIRECTORY_SEPARATOR . '*' , GLOB_ONLYDIR);
        $categories = array();

        foreach ($directories as $directory) {
            $photoNames = scandir($directory);
            $photoNames = array_diff($photoNames, array('.', '..'));
            $directoryNameWithoutUnderscore = strtoupper(str_replace('_', ' ', basename($directory)));
            $photoNames = preg_filter('/^/', $PATH_MATERIEL_NAME . DIRECTORY_SEPARATOR . basename($directory) . DIRECTORY_SEPARATOR, $photoNames);
            $categories[$directoryNameWithoutUnderscore] =  $photoNames;
        }

        return $this->render('materiel/index.html.twig', [
            'controller_name' => 'MaterielController',
            'categories' => $categories
        ]);
    }
}
