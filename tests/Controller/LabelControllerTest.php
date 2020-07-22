<?php

namespace App\Tests\Controller;

use App\Tests\TestCase;
use App\Repository\LabelRepository;

class LabelControllerTest extends TestCase
{
    private $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = static::$container->get(LabelRepository::class);
    }

    public function testCanIndexLabel()
    {
        $labels = $this->repository->createQueryBuilder('l')->getQuery()->getResult();

        $this->client->xmlHttpRequest('GET', 'label');

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [
            'labels' => array_map(function ($label) {
                return [
                    'id' => $label->getId(),
                    'name' => $label->getName(),
                    'slug' => $label->getSlug(),
                ];
            }, $labels)
        ]);
    }

    private function generateData()
    {
        return [
            'name' => $this->faker->words(3, true),
            'slug' => $this->faker->word,
        ];
    }

    private function createLabel()
    {
        $data = $this->generateData();
        $this->client->xmlHttpRequest('POST', 'label', $data);

        return $data;
    }

    public function testCanCreateLabel()
    {
        $data = $this->createLabel();

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [ 'created' => true ]);
        $this->assertRepositoryHas($this->repository, $data);
    }

    public function testCanUpdateLabel()
    {
        $oldData = $this->createLabel();
        $oldLabel = $this->repository->findOneBy($oldData);
        $newData = $this->generateData();

        $this->client->xmlHttpRequest('PATCH', 'label/' . $oldLabel->getId(), $newData);

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [ 'updated' => true ]);
        $this->assertRepositoryHas($this->repository, $newData);
    }

    public function testCanDeleteLabel()
    {
        $oldData = $this->createLabel();
        $oldLabel = $this->repository->findOneBy($oldData);

        $this->client->xmlHttpRequest('DELETE', 'label/' . $oldLabel->getId());

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [ 'deleted' => true ]);
        $this->assertRepositoryDoesNotHas($this->repository, $oldData);
    }
}
