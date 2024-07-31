<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'date' => 'nullable|date',
    ]);

    $imagePath = $request->file('image')->store('images', 'public');

    Gallery::create([
        'title' => $request->title,
        'description' => $request->description,
        'image_path' => $imagePath,
        'date' => $request->date, // Save date
    ]);

    return redirect()->route('galleries.index')->with('success', 'Image added successfully.');
}


    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $oldImage = $gallery->image_path;
            $imagePath = $request->file('image')->store('images', 'public');
            $gallery->update([
                'title' => $request->title,
                'description' => $request->description,
                'image_path' => $imagePath,
            ]);
            Storage::disk('public')->delete($oldImage);
        } else {
            $gallery->update($request->only('title', 'description'));
        }

        return redirect()->route('galleries.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Image deleted successfully.');
    }
}

