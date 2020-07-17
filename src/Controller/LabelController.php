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
    private $repository;
    private $entityManager;
    private $validator;

    public function __construct(
        LabelRepository $repository,
        EntityManagerInterface $entityManager,
        Validator $validator
    ) {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function index()
    {
        $labels = $this->repository->findAll();

        return $this->json([
            'labels' => $labels,
        ]);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function create(Request $request)
    {
        $label = new Label();
        $label->setSlug($request->get('slug'));
        $label->setName($request->get('name'));

        $this->validator->validate($label);

        $this->entityManager->persist($label);
        $this->entityManager->flush();

        return $this->json([ 'created' => true ]);
    }

    /**
     * @Route("/{label}", methods={"PATCH"})
     */
    public function update(Label $label, Request $request)
    {
        $label->setName($request->get('name'));
        $label->setSlug($request->get('slug'));

        $this->validator->validate($label);

        $this->entityManager->flush();

        return $this->json([ 'updated' => true ]);
    }

    /**
     * @Route("/{label}", methods={"DELETE"})
     */
    public function delete(Label $label)
    {
        $this->entityManager->remove($label);
        $this->entityManager->flush();

        return $this->json([ 'deleted' => true ]);
    }
}
