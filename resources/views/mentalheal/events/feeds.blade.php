<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Mentalheal</title>
</head>

<body class="d-flex flex-column min-vh-100">

    @include('bootstrap_components.header')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mb-5">
                <h1 class="display-1 text-center">Events</h1>
            </div>
            <div class="col-12">
                <div class="container">
                    <div class="row justify-content-start">
                        @foreach ($events as $event)
                        <div class="col-4 mb-5">
                            <div class="card text-center h-100">
                                <img src="{{ $event->poster }}" class="card-img-top " alt="...">
                                <div class="card-body">
                                    <a href="{{ route('joinevents.show', $event->id) }}"
                                        class="display-6 text-decoration-none">{{ $event->title }}</a>
                                    <p class="text-secondary mt-2 fst-italic">published by {{ $event->user->name }}</p><hr>
                                    <p class="fs-1">Rp. {{ $event->price }}</p><hr>
                                    <p class="">Start: {{ $event->date }}</p>
                                    <p class="">End: {{ $event->end_date }}</p>
                                    <a href="{{ route('events.register', $event->id) }}" class="btn btn-primary">Buy Ticket</a>
                                    <a href="#" class="btn btn-light">Learn more</a>
                                    <input type="hidden" name="id" value="{{ $event->id }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>


        </div>
    </div>
    </div>


    @include('bootstrap_components.footer')



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>