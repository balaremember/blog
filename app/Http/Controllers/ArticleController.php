<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreBlogArticle;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('create', Article::class))
            {
               return view('articles.create');

            } else {
                return view('errors.403');

            }

        } else {
            return redirect()->guest(route('login'));

        }

        // $this->authorize('create', Article::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogArticle $request)
    {
        $user = Auth::user();

        if($user->can('create', Article::class))
        {
            $article = new Article([
                'user_id' => Auth::id(),
                'title' => $request->input('title'),
                'body' => $request->input('body')
            ]);

            $article->save();

            Session::flash('status', 'New Article created!');
            return redirect()->route('articles.show', $article->id);

        } else {
            return view('errors.403');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $article = Article::find($id);

            if($user->can('update', $article))
            {
               return view('articles.edit')->with('article', $article);

            } else {
                return view('errors.403');

            }

        } else {
            return redirect()->guest(route('login'));

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
