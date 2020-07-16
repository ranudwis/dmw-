<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

abstract class TestCase extends WebTestCase
{
    protected function assertJsonEquals(KernelBrowser $client, array $data): void
    {
        $this->assertJsonStringEqualsJsonString(
            json_encode($data),
            $client->getResponse()->getContent()
        );
    }
}
