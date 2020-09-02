<?php

namespace App\Tests;

use App\Tests\Traits\FileTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class TestCase extends WebTestCase
{
    use FileTrait;

    protected $faker;
    protected $client;

    public function setUp()
    {
        $this->faker = Factory::create();
        $this->client = static::createClient();
    }

    protected function assertJsonEquals(array $data): void
    {
        $this->assertJsonStringEqualsJsonString(
            json_encode($data),
            $this->client->getResponse()->getContent()
        );
    }

    protected function assertJsonStructure(array $keys): void
    {
        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, json_decode($this->client->getResponse()->getContent(), true));
        }
    }

    protected function assertRepositoryHas(ServiceEntityRepository $repository, array $find): void
    {
        $data = $repository->findOneBy($find);

        $this->assertNotNull($data, 'Repository does not has the data');
    }

    protected function assertRepositoryDoesNotHas(ServiceEntityRepository $repository, array $find): void
    {
        $data = $repository->findOneBy($find);

        $this->assertNull($data);
    }
}
