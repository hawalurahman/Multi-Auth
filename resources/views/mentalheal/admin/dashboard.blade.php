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
    @include('bootstrap_components.navbar')

    <div class="container">
        <div class="row align-item-start">
            <!-- sidebar -->
            <div class="col-3">
                <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
                    <a href="/"
                        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap" />
                        </svg>
                        <span class="fs-4">Sidebar</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link link-dark active">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#home" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts.index') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Post
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('events.index') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Event
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('orders') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('transactions') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Transactions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('users') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Users
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contributors') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Contributors
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admins') }}" class="nav-link link-dark">
                                <svg class="bi me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2" />
                                </svg>
                                Admins
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- sidebar -->

            <!-- bagian kanan -->
            <div class="col">
                <div class="container px-4 py-5" id="featured-3">
                    <h2 class="pb-2 border-bottom">Overview</h2>
                    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                        <div class="feature col">
                            <div class="feature-icon bg-primary h-50 text-center rounded">
                                <h1 class="pt-5 text-white">{{ $postCount }}</h1>
                            </div>
                            <h2>Posts</h2>
                            <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another sentence and probably just keep going until we run out of words.</p>
                            <a href="#" class="icon-link">
                                Call to action
                                <svg class="bi" width="1em" height="1em">
                                    <use xlink:href="#chevron-right" />
                                </svg>
                            </a>
                        </div>
                        <div class="feature col">
                            <div class="feature-icon bg-primary h-50 text-center rounded">
                                <h1 class="pt-5 text-white">{{ $eventCount }}</h1>
                            </div>
                            <h2>Events</h2>
                            <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another sentence and probably just keep going until we run out of words.</p>
                            <a href="#" class="icon-link">
                                Call to action
                                <svg class="bi" width="1em" height="1em">
                                    <use xlink:href="#chevron-right" />
                                </svg>
                            </a>
                        </div>
                        <div class="feature col">
                            <div class="feature-icon bg-primary h-50 text-center rounded">
                                <h1 class="pt-5 text-white">{{ $userCount }}</h1>
                            </div>
                            <h2>Users</h2>
                            <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with
                                another sentence and probably just keep going until we run out of words.</p>
                            <a href="#" class="icon-link">
                                Call to action
                                <svg class="bi" width="1em" height="1em">
                                    <use xlink:href="#chevron-right" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bagian kanan -->
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