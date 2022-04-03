<?php

namespace App\Http\Controllers;

use App\articleCategory;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Show the form for creating a new categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryCreate');
    }

    /**
     * Store a newly created categories in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat-name' => 'required',
        ]);
        $cat = new articleCategory;
        $cat->name = $request->input('cat-name');
        $cat->save();
        return redirect('/article/create');
    }

}
