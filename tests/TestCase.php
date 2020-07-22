<?php

namespace App\Tests;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

abstract class TestCase extends WebTestCase
{
    protected $faker;
    protected $client;

    public function setUp()
    {
        $this->faker = Factory::create();
        $this->client = static::createClient();
    }

    protected function assertJsonEquals(KernelBrowser $client, array $data): void
    {
        $this->assertJsonStringEqualsJsonString(
            json_encode($data),
            $client->getResponse()->getContent()
        );
    }

    protected function assertRepositoryHas(ServiceEntityRepository $repository, array $find): void
    {
        $data = $repository->findOneBy($find);

        $this->assertNotNull($data);
    }

    protected function assertRepositoryDoesNotHas(ServiceEntityRepository $repository, array $find): void
    {
        $data = $repository->findOneBy($find);

        $this->assertNull($data);
    }

    protected function createUploadedImage()
    {
        $temporaryFileName = tempnam(sys_get_temp_dir(), 'dmwplusplus');
        copy(__DIR__ . '/fixtures/image.png', $temporaryFileName);

        return new UploadedFile(
            $temporaryFileName,
            'image.png',
            'image/png'
        );
    }
}
