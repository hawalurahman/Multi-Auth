@extends('mentalheal.posts.template')

@section('content')
<div class="container-md ">
    <div class="row justify-content-center">
        <div class="col-8 align-self-center">
            <h2 class="mb-3">Edit Event</h2>

            <form action="{{ route('events.editposter', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-5">
                    <div class="form-group mb-3">
                        <img src="{{ $event->poster }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="image" id='image' class="form-control">
                        <input type="hidden" name="id" value="{{ $event->id }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="mb-3">
                        <label for="title" class="form-label"> Title</label>
                        <input type="text" class="form-control" id="title" value="{{ $event->title }}" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="ckeditor form-control" name="content"
                            id="content">{{ $event->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date of Event</label>
                        <input type="date" class="form-control" id="date" name="date" value='{{ $event->date }}'>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date of Event</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                            value='{{ $event->end_date }}'>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value='{{ $event->price }}'>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id_user" name="id_user"
                            value='{{ $event->id_user }}'>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

    </div>
</div>


<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.ckeditor').ckeditor();
});
</script>

@endsection