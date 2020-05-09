<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\Traits\WithFaker;

class LabelTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    private $labelName;

    public function setUp(): void
    {
        parent::setUp();
        $this->labelName = $this->faker->word;
    }

    public function testCanCreateLabel()
    {
        $this->json('POST', 'label', [
            'name' => $this->labelName
        ]);

        $this->seeJsonEquals([
            'created' => true
        ]);
    }
}
