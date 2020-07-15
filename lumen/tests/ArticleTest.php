<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\Traits\WithFaker;
use Illuminate\Http\UploadedFile;

class ArticleTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    private $volunteer;
    private $title;
    private $cover;
    private $labels;
    private $article;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', [ '--class' => 'DummyLabelSeeder' ]);
        Storage::fake('local');

        $this->volunteer = $this->faker->name;
        $this->title = $this->faker->words(10, true);
        $this->cover = UploadedFile::fake()->image('cover.png');
        $this->labels = DB::table('labels')->pluck('id')->map(function ($id) {
            return (int) $id;
        });
        $this->article = $this->faker->paragraph(3, true);
    }

    public function testCanCreateWebtutorArticleWithoutVolunteer()
    {
        $this->post('article', [
            'title' => $this->title,
            'cover' => $this->cover,
            'labels' => $this->labels,
            'article' => $this->article,
        ], [
            'Accept' => 'application/json',
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
        Storage::disk('local')->assertExists('public/article/' . $this->cover->hashName());
    }

    /**
     * @depends testCanCreateWebtutorArticleWithoutVolunteer
     */
    public function testCanCreateWebtutorArticleWithVolunteer()
    {
        $this->createWebtutorWithVolunteer();

        $this->assertResponseOk();
        $this->seeInDatabase('articles', [
            'volunteer' => $this->volunteer,
            'title' => $this->title,
            'article' => $this->article,
        ]);
    }

    private function createWebtutorWithVolunteer()
    {
        $this->post('article', [
            'volunteer' => $this->volunteer,
            'title' => $this->title,
            'cover' => $this->cover,
            'labels' => $this->labels,
            'article' => $this->article
        ], [
            'Accept' => 'application/json'
        ]);
    }

    public function testCanIndexWebtutorArticle()
    {
        $this->createWebtutorWithVolunteer();
        $this->json('GET', 'article');
        $article = DB::table('articles')->where('title', $this->title)->first();

        $this->assertResponseOk();
        $this->seeJsonEquals([
            'articles' => [
                [
                    'id' => (int) $article->id,
                    'volunteer' => $this->volunteer,
                    'labels' => $this->labels,
                    'title' => $this->title,
                    'cover' => 'public/article/' . $this->cover->hashName(),
                    'article' => $this->article,
                    'created_at' => $article->created_at,
                    'updated_at' => $article->updated_at
                ]
            ]
        ]);
    }

    public function testCanDeleteWebtutorArticle()
    {
        $this->createWebtutorWithVolunteer();
        $articleId = DB::table('articles')->first()->id;
        $this->json('DELETE', 'article/' . $articleId);

        $this->assertResponseOk();
        $this->seeJsonEquals([ 'deleted' => true ]);
    }
}
