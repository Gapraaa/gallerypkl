<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('article.index', compact('galleries'));
    }
}
