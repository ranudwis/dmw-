<?php

namespace App\Tests;

use App\Tests\TestCase;

class LabelControllerTest extends TestCase
{
    public function testCanIndexLabel()
    {
        $client = static::createClient();
        $client->xmlHttpRequest('GET', '/label');

        $this->assertResponseIsSuccessful();
        $this->assertJsonEquals($client, [
            'labels' => []
        ]);
    }
}
