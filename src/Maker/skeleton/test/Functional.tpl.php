<?= "<?php\n" ?>

namespace <?= $namespace; ?>;

use App\Test\TestCase;

class <?= $class_name ?> extends TestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello World');
    }
}
