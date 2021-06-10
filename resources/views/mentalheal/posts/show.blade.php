@extends('mentalheal.posts.template')

@section('content')
<div class="container-sm px-5">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">

                {!! $post->content !!}
            </div>
        </div>
    </div>
</div>

@endsection