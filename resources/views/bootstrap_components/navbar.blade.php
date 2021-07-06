<nav class="navbar h-100 navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container h-100">
        <a class="navbar-brand" href="#">MentalHeal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @role('contributor')
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('feeds') }}">Feeds</a>
                </li>
                @endrole

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
        </div>
    </div>
</nav>