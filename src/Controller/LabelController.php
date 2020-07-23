<?php

namespace App\Controller;

use App\Entity\Label;
use App\Repository\LabelRepository;
use App\Service\Validator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/label")
 */
class LabelController extends Controller
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

        return $this->jsonResponse(compact('labels'), [
            'ignores' => ['articles']
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

        return $this->jsonResponse([ 'created' => true ]);
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

        return $this->jsonResponse([ 'updated' => true ]);
    }

    /**
     * @Route("/{label}", methods={"DELETE"})
     */
    public function delete(Label $label)
    {
        $this->entityManager->remove($label);
        $this->entityManager->flush();

        return $this->jsonResponse([ 'deleted' => true ]);
    }
}
