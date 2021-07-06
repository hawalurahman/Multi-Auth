@extends('mentalheal.posts.template')

@section('content')
<div class="container-md ">
    <div class="row justify-content-center">
        <div class="col-8 align-self-center">
            <h2 class="mb-3">Edit Post</h2>

            <form action="{{ route('posts.update',$post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <div class="mb-3">
                        <label for="title" class="form-label">Post Title</label>
                        <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="ckeditor form-control" name="content"
                            id="content">{{ $post->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value='{{ $post->id_user }}'>
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