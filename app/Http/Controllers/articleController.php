<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class articleController extends Controller
{
    //shows all articles with a filter by category
    public function index(Request $request)
    {
        $articles = Article::orderBy('created_at')->get();
        if ($request->submit == "ok") {
            $articles = $this->search($request);
        }
        return view('articlesFilter', ['articles' => $articles]);
    }

    public function search(Request $request)
    {
        //if ($request->criteria =='searchByCat')
        //{
        $articles = Article::whereHas('articleCat', function ($query) use ($request) {
            $str = $request->searchValue;
            return $query->where('name', 'like', '%' . $str . '%');
        })->get();
        // }
        /*else if ($request->criteria =='sortBand')
        {
            $articles = Event::whereHas('UserBand', function ($query) {
                return $query->orderBy('band_name');
            })->paginate(EventController::page_number);
        }
        else if ($request->criteria =='sortDate')
        {
            $articles = Event::orderBy('created_at')->paginate(EventController::page_number);
        }*/
        return $articles;
    }

    //shows the detail page for article
    public function show(Request $request, int $id)
    {
        $article = Article::find($id);
        return view('detailArticle', ['article' => $article]);
    }
}
