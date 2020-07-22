<?php

namespace App\Tests\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\LabelRepository;
use App\Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    private $repository;
    private $labelRepository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = static::$container->get(ArticleRepository::class);
        $this->labelRepository = static::$container->get(LabelRepository::class);
    }

    public function testCanCreateArticle()
    {
        $image = $this->createUploadedImage();
        $labels = $this->labelRepository->createQueryBuilder('l')->getQuery()->getResult();

        $data = [
            'publisherType' => Article::PUBLISHER_ADMIN,
            'volunteer' => $this->faker->name,
            'title' => $this->faker->sentence,
            'article' => $this->faker->paragraphs(2, true),
            'labels' => array_map(
                function ($label) {
                    return $label->getId();
                },
                $labels
            )
        ];

        $this->client->xmlHttpRequest('POST', '/article', $data, [
            'cover' => $image
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [ 'created' => true]);
        unset($data['labels']);
        $this->assertRepositoryHas($this->repository, $data);
    }
}
