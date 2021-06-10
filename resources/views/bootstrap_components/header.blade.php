<div class="container-fluid shadow p-3 mb-5 bg-body rounded">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-3">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">MentalHeal</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
               
                @unless (Auth::check())
                <li class="nav-item"><a href="{{ route('register') }}" class="btn btn-outline-primary mx-1">Signup</a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="btn btn-primary mx-1">Login</a></li>
                @endunless
                
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome, {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                @csrf
                                <a class="text-decoration-none text-body" href="/logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log Out</a>
                            </form>
                        </li>

                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </header>
    </div>
</div>