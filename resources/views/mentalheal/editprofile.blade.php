@extends('mentalheal.posts.template')

@section('content')
<div class="container-sm px-5">
    <h1 class="display-6 mb-5">Edit Profile</h1>
    <form action="{{ route('user.update', Auth::user()->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="name" class="form-control" id="name" name="name" valu="{{ $target->name }}"
                    placeholder="{{ $target->name }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
                <input type="email" readonly class="form-control-plaintext" id="email" name="email"
                    value="{{ $target->email }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="password" name="password"
                    value="{{ $target->password }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
         <a href="{{route('user.profile', $target->id) }}" class="btn btn-light ms-3">Back</a>
    </form>
</div>

@endsection