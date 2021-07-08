<div class="container-md ">
    <div class="row justify-content-center">
        <div class="col-8 align-self-center">
            <h2 class="mb-3">Create an event</h2>

            <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="mb-3">
                        <label for="title" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="poster" class="form-label">Poster</label>
                        <input type="file" class="form-control" id="poster" name="poster" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="ckeditor form-control" name="content" id="content" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date of Event</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date of Event</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id_user" name="id_user" value='{{ $userId }}'>
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