<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\articleCategory;
use Image;

class articleController extends Controller
{
    /**
     * shows all articles with a filter by category
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::orderBy('created_at')->get();
        if ($request->submit == "ok") {
            $articles = Article::whereHas('articleCat', function ($query) use ($request) {
                $str = $request->searchValue;
                return $query->where('name', 'like', '%' . $str . '%');
            })->orderBy('created_at')->get();
        }
        return view('articlesFilter', ['articles' => $articles]);
    }

    /**
     * shows the detail page for article
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        $article = Article::find($id);
        return view('detailArticle', ['article' => $article]);
    }

    /**
     * Show the form for creating a new article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = articleCategory::all();
        return view('articleCreate', ['categories' => $categories]);

    }

    /**
     * Store a newly created article in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'artImage' => 'required|mimes:jpeg,jpg,png,gif',
        ]);
        $article = new Article;
        if ($request->hasFile('artImage')) {
            $image = $request->file('artImage')->getClientOriginalName();
            //store the image
            $request->file('artImage')->storeAs('public/image', $image);
            $request->file('artImage')->storeAs('public/image/thumbnail', $image);
            $thumbnailpath = public_path('storage/image/thumbnail/' . $image);
            $this->createThumbnail($thumbnailpath, 150, 93);
            //store to db
            $article->image = 'storage/image/thumbnail/' . $image;
        }
        $article->name = $request->name;
        $article->category_id = $request->category;
        $article->description = $request->description;
        $article->summary = $request->summary;
        $article->save();
        return redirect('/article');
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
}
