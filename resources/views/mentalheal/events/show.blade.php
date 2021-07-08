@extends('mentalheal.posts.template')

@section('content')
<div class="container-sm px-5">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>{{ $event->title }}</h2>
            </div>
            <div class="float-end">
                @unless (Auth::user()->hasRole('user'))
                <a class="btn btn-light" href="{{ route('events.index') }}">Contribute</a>
                @endunless
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <img src="{{ $event->poster }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-12">
            <div class="form-group">

                {!! $event->content !!}
            </div>
        </div>
    </div>

    <br class="my-5">
    <br class="my-5">

</div>

@endsection