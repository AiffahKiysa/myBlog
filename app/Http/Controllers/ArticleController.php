<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return view('article', [
            'header' => 'My Blog',
            'articles' => Article::latest()->get()
        ]);
    }

    public function content(Article $article){
        return view('content', [
            "article" => $article
        ]);
    }
}
