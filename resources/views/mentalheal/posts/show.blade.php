@extends('mentalheal.posts.template')

@section('content')
<div class="container-sm px-5">
    <div class="row mt-5 mb-5 justify-content-between">
        <div class="col-lg-8 margin-tb">
            <div class="float-start">
                <h2 class="display-4">{{ $post->title }}</h2>
            </div>
            <div class="float-end">
            @unless (Auth::user()->hasRole('user'))
                <a class="btn btn-light" href="{{ route('posts.index') }}">Contribute</a>
            @endunless
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-5">
            <div class="form-group">
                {!! $post->content !!}
            </div>
        </div>
    </div>
</div>

@endsection