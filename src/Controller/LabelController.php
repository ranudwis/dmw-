<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LabelRepository;

/**
 * @Route("/label")
 */
class LabelController extends AbstractController
{
    private $labelRepository;

    public function __construct(LabelRepository $labelRepository)
    {
        $this->labelRepository = $labelRepository;
    }

    /**
     * @Route("", methods={"GET", "HEAD"})
     */
    public function index()
    {
        $labels = $this->labelRepository->findAll();

        return $this->json([
            'labels' => $labels,
        ]);
    }
}
