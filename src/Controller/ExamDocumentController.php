<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/examDocument")
 */
class ExamDocumentController extends AbstractController
{
    /**
     * @Route("/{course}/{exam}", name="exam_document")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ExamDocumentController.php',
        ]);
    }
}
