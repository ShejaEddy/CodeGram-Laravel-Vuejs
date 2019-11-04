<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

	Public function __construct()
	{
		return $this->middleware('auth');
	}

    Public function create()
    {
    	return view('posts.create');
    }

    Public function store()
    {
    	$data = request()->validate([
    		'caption' => 'required',
    		'image' => ['required', 'image'],
    	]);

    	$imagePath = request('image')->store('uploads', 'public');

    	$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
    	$image->save();



    	auth()->user()->posts()->create([
    		'caption' => $data['caption'],
    		'image' => $imagePath 
    	]);

    	return redirect('/profile/'. auth()->user()->id);

    }

    Public function show(\App\Post $post)
    {
    	return view('posts.detail', compact('post'));
    }
}
