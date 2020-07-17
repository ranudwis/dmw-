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

    public function testCanCreateLabel()
    {
        $name = $this->faker->words(3, true);
        $slug = $this->faker->word;
        $this->client->xmlHttpRequest('POST', 'label', compact('name', 'slug'));

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($this->client, [ 'created' => true ]);
        $this->assertRepositoryHas($this->labelRepository, compact('name', 'slug'));
    }
}
