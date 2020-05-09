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

    private function postLabel()
    {
        $this->json('POST', 'label', [
            'name' => $this->labelName
        ]);
    }

    public function testCanCreateLabel()
    {
        $this->postLabel();

        $this->seeJsonEquals([
            'created' => true
        ]);
        $this->seeInDatabase('labels', [
            'name' => $this->labelName
        ]);

        $this->json('GET', 'label');
    }

    /**
     * @depends testCanCreateLabel
     */
    public function testCanIndexLabel()
    {
        $this->postLabel();

        $this->json('GET', 'label');

        $this->seeJsonEquals([
            'labels' => [
                [
                    'id' => '1',
                    'name' => $this->labelName
                ]
            ]
        ]);
    }

    /**
     * @depends testCanCreateLabel
     */
    public function testCanCheckExistance()
    {
        $this->postLabel();

        $this->json('GET', 'label/' . $this->labelName . '/isExists');

        $this->seeJsonEquals([
            'exists' => true
        ]);
    }

    /**
     * @depends testCanCreateLabel
     */
    public function testCanCheckNotExistance()
    {
        $this->postLabel();

        $this->json('GET', 'label/someRandomLabel/isExists');

        $this->seeJsonEquals([
            'exists' => false
        ]);
    }
}
