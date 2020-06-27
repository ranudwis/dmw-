<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\Traits\WithFaker;

class ArticleTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    private $volunteer;
    private $title;
    private $labels;
    private $article;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', [ '--class' => 'DummyLabelSeeder' ]);

        $this->volunteer = $this->faker->name;
        $this->title = $this->faker->words(10, true);
        $this->labels = DB::table('labels')->pluck('id');
        $this->article = $this->faker->paragraph(3, true);
    }

    public function testCanCreateWebtutorArticleWithoutVolunteer()
    {
        $this->json('POST', 'article', [
            'title' => $this->title,
            'labels' => $this->labels,
            'article' => $this->article,
        ]);

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'created' => true
        ]);
        $this->seeInDatabase('articles', [
            'title' => $this->title,
            'article' => $this->article
        ]);
        $articleId = DB::table('articles')->first()->id;
        foreach ($this->labels as $label) {
            $this->seeInDatabase('article_label', [
                'article_id' => $articleId,
                'label_id' => $label
            ]);
        }
    }

    /**
     * @depends testCanCreateWebtutorArticleWithoutVolunteer
     */
    public function testCanCreateWebtutorArticleWithVolunteer()
    {
        $this->json('POST', 'article', [
            'volunteer' => $this->volunteer,
            'title' => $this->title,
            'labels' => $this->labels,
            'article' => $this->article
        ]);

        $this->assertResponseOk();
        $this->seeInDatabase('articles', [
            'volunteer' => $this->volunteer,
            'title' => $this->title,
            'article' => $this->article,
        ]);
    }
}
