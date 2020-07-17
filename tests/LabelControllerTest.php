<?php

namespace App\Tests;

use App\Tests\TestCase;
use App\Repository\LabelRepository;
use Faker\Factory;

class LabelControllerTest extends TestCase
{
    private $client;
    private $faker;
    private $labelRepository;

    public function setUp()
    {
        $this->client = static::createClient();
        $this->labelRepository = static::$container->get(LabelRepository::class);
        $this->faker = Factory::create();
    }

    public function testCanIndexLabel()
    {
        $this->client->xmlHttpRequest('GET', 'label');

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [
            'labels' => []
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
        $this->assertRepositoryHas($this->labelRepository, $data);
    }

    public function testCanUpdateLabel()
    {
        $oldData = $this->createLabel();
        $oldLabel = $this->labelRepository->findOneBy($oldData);
        $newData = $this->generateData();

        $this->client->xmlHttpRequest('PATCH', 'label/' . $oldLabel->getId(), $newData);

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [ 'updated' => true ]);
        $this->assertRepositoryHas($this->labelRepository, $newData);
    }

    public function testCanDeleteLabel()
    {
        $oldData = $this->createLabel();
        $oldLabel = $this->labelRepository->findOneBy($oldData);

        $this->client->xmlHttpRequest('DELETE', 'label/' . $oldLabel->getId());

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [ 'deleted' => true ]);
        $this->assertRepositoryDoesNotHas($this->labelRepository, $oldData);
    }
}
