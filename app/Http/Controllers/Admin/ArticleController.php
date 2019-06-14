<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleAdminRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index',
            ['articles' => Article::orderBy('created_at', 'desc')->paginate(10)]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create',
            [
                'categories' => Category::get()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleAdminRequest $request)
    {

        $article = Article::create($request->all());

        if ($request->input('categories')){
            $article->categories()->attach($request->input('categories'));
        }

        $path = ($request->file('image')) ? $request->file('image')->store('image', 'public') : null;


        $article->img =  basename( $path);
        $article->save();

       return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article' => $article,
            'categories' => Category::get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleAdminRequest $request, Article $article)
    {
        $article->update($request->except('slug'));

        $article->categories()->detach();

        if ($request->input('categories')){
            $article->categories()->attach($request->input('categories'));
        }

        $path = ($request->file('image')) ? $request->file('image')->store('image', 'public') : null;


        $article->img =  basename($path);
        $article->save();

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
