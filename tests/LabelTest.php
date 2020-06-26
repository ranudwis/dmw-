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

        $this->assertResponseOk();
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

        $this->assertResponseOk();
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

        $this->assertResponseOk();
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

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'exists' => false
        ]);
    }

    /**
     * @depends testCanCreateLabel
     */
    public function testCanUpdateLabel()
    {
        $this->postLabel();
        $labelId = DB::table('labels')->first()->id;
        $newName = $this->faker->word;

        $this->json('PATCH', 'label/' . $labelId, [
            'name' => $newName
        ]);

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'updated' => true
        ]);
        $this->notSeeInDatabase('labels', [
            'id' => $labelId,
            'name' => $this->labelName,
        ]);
        $this->seeInDatabase('labels', [
            'id' => $labelId,
            'name' => $newName
        ]);
    }

    /**
     * @depends testCanCreateLabel
     */
    public function testCanNotUpdateLabelWithNonExistentId()
    {
        $notExistId = $this->faker->randomDigit;
        $newName = $this->faker->word;

        $this->json('PATCH', 'label/' . $notExistId, [
            'name' => $newName
        ]);

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'updated' => false
        ]);
    }

    /**
     * @depends testCanCreateLabel
     */
    public function testCanDeleteLabel()
    {
        $this->postLabel();
        $labelId = DB::table('labels')->first()->id;

        $this->json('DELETE', 'label/' . $labelId);

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'deleted' => true
        ]);
        $this->notSeeInDatabase('labels', [
            'id' => $labelId
        ]);
    }
}
