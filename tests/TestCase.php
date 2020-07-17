<?php

namespace App\Tests;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class TestCase extends WebTestCase
{
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
}
