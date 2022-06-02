<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\article;
use  App\Models\category;
use  App\Models\User;
use Clockwork\Storage\Search;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $title='';
        if(request('category')){
            $category= category::firstWhere(
            'slug', request('category'));
            $title= ' in ' . $category->name;
        }
        if(request('author')){
            $author= User::firstWhere(
            'username', request('author'));
            $title= ' from ' . $author->name;
        }
        

        return view('articles',[
            "title"=>"All Articles" . $title,
            "active"=> 'articles',
            // "articles"=> article::all()
            "articles"=> article::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
        ]);
    }
    public function show(article $article)
    {
        return view('article', [
            "title"=> "Judul 1",
            "active"=> 'articles',
            "article"=> $article
        ]);
    }
    
}
