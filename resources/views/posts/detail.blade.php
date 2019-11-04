@extends('layouts.app')

@section('content')
<div class="container" style="width:60%">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-2">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100 mr-2" style="max-width: 40px;">
                    </div>
                    <div>
                        <a href="/profile/{{ $post->user->id }}" class="text-dark"><strong>{{ $post->user->username }}</strong></a>
                        <a href="#" class="pr-1">follow</strong></a>
                    </div>
                </div>
            <p>{{ $post->caption }}</p>
        </div>
    </div>
        
        
</div>
@endsection