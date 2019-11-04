@extends('layouts.app')

@section('content')
<div class="container" style="width:60%">
    <div class="row">
        <div class="col-2 p-3">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle bg-dark w-100">
        </div>
        <div class="col-10 pt-3">
            
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex pb-3 align-items-center">
                    <h4>{{ $user->username }}</h4>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"/>
                </div>
            @can('update', $user->profile)    
                <a href="/post/create"> Add New Post</a>
            @endcan
            </div>
            @can('update', $user->profile)
            <div>
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            <div>
            @endcan
           
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> Followers</div>
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong> Following</div>
            </div>
            <div class="pt-3 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->bio }}
            </div>
            <div>
                <a href="#">{{ $user->profile->url ?? 'N/A' }}</a>
            </div>
        </div>
    </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/show/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
            @endforeach
        </div>
</div>
@endsection
