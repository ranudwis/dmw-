<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\LabelRepository;
use App\Service\Validator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    private $repository;
    private $labelRepository;
    private $entityManager;
    private $validator;

    public function __construct(
        ArticleRepository $repository,
        LabelRepository $labelRepository,
        EntityManagerInterface $entityManager,
        Validator $validator
    ) {
        $this->repository = $repository;
        $this->labelRepository = $labelRepository;
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    /**
     * @Route("", methods={"GET"}, defaults={"_format": "json"})
     */
    public function index()
    {
        $articles = $this->repository->findAll();

        return $this->json([ 'articles' => $articles ]);
    }

    /**
     * @Route("", methods={"POST"}, defaults={"_format": "json"})
     */
    public function create(Request $request)
    {
        $article = new Article();
        $article->setPublisherType($request->get('publisherType'));
        $article->setVolunteer($request->get('volunteer'));
        $article->setTitle($request->get('title'));
        $article->setCoverFile($request->files->get('cover'));
        $article->setArticle($request->get('article'));

        $labels = $this->labelRepository->getByIds($request->get('labels'));

        foreach ($labels as $label) {
            $article->addLabel($label);
        }

        $this->validator->validate($article);

        $this->entityManager->persist($article);
        $this->entityManager->flush();

        return $this->json([ 'created' => true ]);
    }
}
