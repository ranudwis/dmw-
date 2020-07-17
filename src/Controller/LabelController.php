<?php

namespace App\Controller;

use App\Entity\Label;
use App\Repository\LabelRepository;
use App\Service\Validator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/label")
 */
class LabelController extends AbstractController
{
    /**
     * @Route("", methods={"GET"})
     */
    public function index(LabelRepository $labelRepository)
    {
        $labels = $labelRepository->findAll();

        return $this->json([
            'labels' => $labels,
        ]);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function create(Request $request, Validator $validator, EntityManagerInterface $entityManager)
    {
        $label = new Label();
        $label->setSlug($request->get('slug'));
        $label->setName($request->get('name'));

        $validator->validate($label);

        $entityManager->persist($label);
        $entityManager->flush();

        return $this->json([ 'created' => true ]);
    }
}
