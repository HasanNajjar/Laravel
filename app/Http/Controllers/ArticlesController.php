<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Tag;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;

        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }


    public function show(Article $article) 
    {
        // Render a single resource
        //Article::where('id', 1)->first();

        return view('articles.show', ['article' => $article]);
    }


    public function create()
    {
        
        // Show a view to create a new resource 
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }


    public function store()
    {
        $this->validateArticle();
        $article = new Article(request(['title','excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));
        
       return redirect(route('articles.index'));

    }


    public function edit(Article $article)
    {
        //find and show the article with the associated ID

       return view('articles.edit', compact('article'));
    }


    public function update(Article $article)
    {
        $article->update($this->validateArticle);

        return redirect('/articles/' . $article->id);

    }


    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }

    public function delete()
    {
        // Delete the resource

    }
}
