<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ArticleController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'volunteer' => 'nullable',
            'title' => 'required',
            'labels' => 'required',
            'article' => 'required'
        ]);

        $articleId = DB::table('articles')->insertGetId([
            'volunteer' => $request->volunteer,
            'title' => $request->title,
            'article' => $request->article,
        ]);

        DB::table('article_label')->insert(array_map(
            function ($e) use ($articleId) {
                return [
                    'article_id' => $articleId,
                    'label_id' => $e
                ];
            },
            $request->labels
        ));

        return [ 'created' => true ];
    }
}
