@extends('layouts.app')

@section('content')
<div class="container" style="width:60%">
    <form action="/post" enctype="multipart/form-data" method="post">

        @csrf

        <div class="row">
        <div class="col offset-2">
            <div class="row">
                <h2>Add New Post</h2>
            </div>
            <div class="form-group row">
                <label for="caption" class="col-md-4 col-form-label">{{ __('Post Caption') }}</label>
                <input id="caption" 
                type="caption" 
                name="caption" 
                class="form-control"
                value="{{ old('caption') }}" 
                autocomplete="caption">
                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                 <label for="image" class="col-md-4 col-form-label">{{ __('Post Image') }}</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="row pt-4"><button class="btn btn-primary">Add New Post</button></div>
        </div>
    </div>
    </form>
</div>
@endsection
