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

<body>

    @include('bootstrap_components.header')

    <!-- Opening -->
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                    system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Opening -->

    <!-- Centered Hero -->
    <div class="px-4 pt-5 my-5 text-center">
        <h1 class="display-4 fw-bold">Centered screenshot</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="bootstrap-docs.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image"
                    width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>
    <!-- Centered Hero -->

    <!-- Features -->
    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Columns with icons</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#collection" />
                    </svg>
                </div>
                <h2>Featured title</h2>
                <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                    and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link">
                    Call to action
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#chevron-right" />
                    </svg>
                </a>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#people-circle" />
                    </svg>
                </div>
                <h2>Featured title</h2>
                <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                    and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link">
                    Call to action
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#chevron-right" />
                    </svg>
                </a>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#toggles2" />
                    </svg>
                </div>
                <h2>Featured title</h2>
                <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                    and probably just keep going until we run out of words.</p>
                <a href="#" class="icon-link">
                    Call to action
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#chevron-right" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <!-- Features -->

    <!-- Sign up form -->
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Vertically centered hero sign-up form</h1>
                <p class="col-lg-10 fs-4">Below is an example form built entirely with Bootstrap’s form controls. Each
                    required form group has a validation state that can be triggered by attempting to submit the form
                    without completing it.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                    <hr class="my-4">
                    <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign up form -->

    <!-- Closing -->
    <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">Dark mode hero</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the
                    world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive
                    grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Custom
                        button</button>
                    <button type="button" class="btn btn-outline-light btn-lg px-4">Secondary</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Closing -->

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