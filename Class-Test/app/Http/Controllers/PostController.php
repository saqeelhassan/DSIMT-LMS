<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function create()
    {
        $data = Post::all();


    return view('posts.create', compact('data'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);


        Post::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Data stored successfully!');
    }
}





    $data = Post::all();


    return view('posts.create', compact('data'));
