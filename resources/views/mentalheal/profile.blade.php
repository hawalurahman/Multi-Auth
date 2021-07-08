@extends('mentalheal.posts.template')

@section('content')
<div class="container-sm px-5">
    <div class="row mt-5 mb-5 justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2 class="display-4">{{ Auth::user()->name }}</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-light" href="{{ route('user.edit', Auth::user()->id ) }}">Edit</a>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-5">
            <div class="form-group">
                {{ Auth::user()->email }}
            </div>
        </div>
    </div>
</div>

@endsection