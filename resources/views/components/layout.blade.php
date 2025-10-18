<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BlogGuru</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('blog.show') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('about') }}">About</a>
                    </li>


                </ul>
                @if (Route::has('login'))
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="d-flex">
                            @csrf
                            <button type="submit" class="btn btn-outline-info">Logout</button>
                        </form>
                    @else
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn btn-outline-info me-2">Login</a>
                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
                            @endif --}}
                        </div>
                    @endauth
                @endif




            </div>
        </div>
    </nav>










    <div class="container">
        {{ $main }}
    </div>




<footer class="bg-body-secondary text-center py-3 w-100">
    <h5 class="mb-0">&#169 Qubi Nakarmi</h5>
       <h5 class="mb-0">{{ now()->format('F j, Y') }}</h5>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

</body>

</html>
