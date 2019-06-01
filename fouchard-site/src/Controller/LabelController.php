<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LabelController extends AbstractController
{
    /**
     * @Route("/label", name="label")
     */
    public function index()
    {
        $PATH_DOCUMENTS_NAME = "documents";
        $PATH_DOCUMENTS =  $this->getParameter('kernel.project_dir') . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . $PATH_DOCUMENTS_NAME;

        $documentsName = scandir($PATH_DOCUMENTS);
        $documentsName = array_diff($documentsName, array('.', '..'));
        $documentsPathWithLabels = array();
        foreach ($documentsName as $documentName) {
            $documentsNamePath = preg_filter('/^/',  basename($PATH_DOCUMENTS) . DIRECTORY_SEPARATOR, $documentName);
            $documentName = pathinfo($documentName, PATHINFO_FILENAME);
            $documentsPathWithLabels[$documentsNamePath] = str_replace('_', ' ', $documentName);
        }
        return $this->render('label/index.html.twig', [
            'controller_name' => 'LabelController',
            'documents' => $documentsPathWithLabels,
        ]);
    }
}
