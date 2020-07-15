<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use DateTime;
use DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('labels:id')->get()->toArray();

        $articles = array_map(function ($article) {
            $article['labels'] = array_map(function ($label) {
                return $label['id'];
            }, $article['labels']);

            return $article;
        }, $articles);

        return [ 'articles' => $articles ];
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'volunteer' => 'nullable',
            'title' => 'required',
            'cover' => 'nullable|image',
            'labels' => 'required',
            'article' => 'required'
        ]);

        $cover = $request->cover ? $request->cover->store('public/article') : null;

        $articleId = DB::table('articles')->insertGetId([
            'volunteer' => $request->volunteer,
            'title' => $request->title,
            'cover' => $cover,
            'article' => $request->article,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('article_label')->insert(array_map(
            function ($e) use ($articleId) {
                return [
                    'article_id' => $articleId,
                    'label_id' => $e
                ];
            },
            is_array($request->labels) ? $request->labels : $request->labels->toArray()
        ));

        return [ 'created' => true ];
    }

    public function delete($articleId)
    {
        $deleted = DB::table('articles')
            ->where('id', $articleId)
            ->delete();

        return [ 'deleted' => (bool) $deleted ];
    }
}
