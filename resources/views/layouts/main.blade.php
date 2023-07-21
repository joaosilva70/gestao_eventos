<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-5 px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="/img/logo.png" alt="SilvaRx Events"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/events/create">Create Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">My Events</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                            @csrf
                                <a class="nav-link" href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="register">Sign Up</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg">{{ session('msg') }}
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    <footer class="py-5 px-5 text-muted border-top">
    Created by SilvaRx &middot; &copy; 2023
    </footer>
    <script src="/js/script.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/jquery-3.6.4.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>