<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
    <title>{{ __('PHP Exercise - v21.0.3') }}</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    @if(request()->is('/'))
                        <span class="nav-link">{{ __('Home') }}</span>
                    @else
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
    <div class="row justify-content-center mt-4 mb-4">
        <div class="col">
            <div class="d-flex justify-content-center">
                <h1>{{ __('PHP Exercise - v21.0.3') }}</h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            @yield('content')
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col">
            <div class="d-flex justify-content-center">
                {{ date('Y-m-d H:i:s') }}
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>
