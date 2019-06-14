<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;

class NewsController extends Controller
{
    public function category($slug)
    {

        $sort = $this->checkInputSort(Input::get('sort'));
        $order = $this->checkInputOrder(Input::get('order'));


        if ($slug === 'all') {
            $category = new Collection();
            $category->title = 'Всё';
            $category->slug = 'all';
            $articles = Article::where('published', true)->orderBy($sort, $order)->paginate(3);

        } else {
            $category = Category::where('slug', $slug)->firstOrFail();
            $articles = $category->articles()->where('published', true)->orderBy($sort, $order)->paginate(3);
        }

        return view('category',
            [
                'category' => $category,
                'articles' => $articles
            ]);

    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->where('published', true)->firstOrFail();

        event('articleHasViewed', $article);

        return view('article', [
            'article' => $article
        ]);
    }

    private function checkInputSort($input)
    {
        switch ($input) {
            case 'date':
                $sort = 'created_at';
                break;
            case  'viewed':
                $sort = 'viewed';
                break;
            default:
                $sort = 'created_at';
                break;
        }
        return $sort;
    }

    private function checkInputOrder($input)
    {
        switch ($input) {
            case 'asc':
                $order = 'asc';
                break;
            case  'desc':
                $order = 'desc';
                break;
            default:
                $order = 'asc';
        }

        return $order;
    }
}
