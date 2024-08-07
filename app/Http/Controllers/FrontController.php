<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $galleries = Gallery::all();
        return view('index', compact('galleries'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $galleries = Gallery::where('title', 'LIKE', "%{$query}%")
                                ->orWhere('description', 'LIKE', "%{$query}%")
                                ->get();
        } else {
            $galleries = Gallery::all();
        }

        return view('index', compact('galleries'));
    }
}
