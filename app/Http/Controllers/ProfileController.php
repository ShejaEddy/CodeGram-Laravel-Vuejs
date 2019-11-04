<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user)
    {
    	$user = User::findOrFail($user);
    	$follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index', [
        	'user' => $user,
        	'follows'=> $follows
        ]);
    }

    public function edit(User $user)
    {
    	$this->authorize('update', $user->profile);
    	return view('profiles.edit', compact('user'));
    }

     public function update(User $user)
    {
    	$this->authorize('update', $user->profile);
    	$data = request()->validate([
    		'title' => 'required',
    		'bio' => 'required',
    		'url' => 'url',
    		'image' => '',
    	]);
    	

    	if(request('image')) {
    		$imagePath = request('image')->store('profile', 'public');

	    	$image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
	    	$image->save();
	    	$imageArray = ['image' => $imagePath];
    	}

    	auth()->user()->profile->update(array_merge(
    		$data,
    		$imageArray ?? []
    	));


    	return redirect('/profile/'. $user->id );
    }
}
