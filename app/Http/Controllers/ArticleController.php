<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreBlogArticle;
use App\Http\Requests\UpdateBlogArticle;

class ArticleController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(15);

        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        if(Auth::check())
        {
            $user = Auth::user();

            if($user->can('create', Article::class))
            {
               return view('articles.create')->with('categories', $categories)->with('tags', $tags);

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
        //dd($request);

        $user = Auth::user();

        if($user->can('create', Article::class))
        {
            $article = new Article();
            $article->user_id = Auth::id();
            $article->category_id = $request->input('category_id');
            $article->title = $request->input('title');
            $article->body = $request->input('body');
            $article->save();

            $article->tags()->sync($request->tags, false);

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
        $article = Article::with('comments')->find($id);

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

            $categories = Category::all();
            $catArray = [];
            foreach ($categories as $category) {
                $catArray[$category->id] = $category->name;
            }

            $tags = Tag::all();
            $tagsArray = [];
            foreach($tags as $tag) {
                $tagsArray[$tag->id] = $tag->name;
            }

            if($user->can('update', $article))
            {
               return view('articles.edit')->with('article', $article)->with('categories', $catArray)->with('tags', $tagsArray);

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
    public function update(UpdateBlogArticle $request, $id)
    {
        $article = Article::find($id);
        $article->category_id = $request->input('category_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->save();

        if(isset($request->tags)){
            $article->tags()->sync($request->tags);
        } else {
            $article->tags()->sync([]);
        }

        Session::flash('status', 'Article updated!');
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user = Auth::user();
            $article = Article::find($id);

            if($user->can('delete', $article))
            {
                $article->tags()->detach();
                $article->delete();

                Session::flash('status', 'Article deleted!');
                return redirect()->route('articles.index');

            } else {
                return view('errors.403');

            }
    }
}
