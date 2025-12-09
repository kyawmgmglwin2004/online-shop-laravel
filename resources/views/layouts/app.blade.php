<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FoodFusion') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <!-- Brand Logo with Image -->
                <a class="navbar-brand text-black  fw-bold " style=" font-size:2em; margin-top:12px; font-family: 'Fredoka', sans-serif;font-weight: 700;" href="{{ url('/') }}">Lucky</a>
                
                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Content -->
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <!-- Category Links -->
                    <ul class="navbar-nav me-auto">
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link me-2" href="{{ url("/products/category/" .$category->id) }}">
                                    {{-- <svg width="18" height="18" fill="currentColor" class="bi bi-tags me-1" viewBox="0 0 16 16"> --}}
                                        <path d="M3 2a1 1 0 0 0-1 1v3.586a1 1 0 0 0 .293.707l6.586 6.586a2 2 0 0 0 2.828 0l3.586-3.586a2 2 0 0 0 0-2.828l-6.586-6.586A1 1 0 0 0 6.586 1H3zm1 1h2.586l6.586 6.586a1 1 0 0 1 0 1.414l-3.586 3.586a1 1 0 0 1-1.414 0L2 7.414V3a1 1 0 0 1 1-1z"/>
                                        <path d="M5.5 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    </svg>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                        
                        @can('general')
                            <li class="nav-item">
                                <a href="{{ url('/home')}}" class="nav-link btn-dashboard">Dashboard</a>
                            </li>
                        @endcan
                    </ul>
                    <!-- Authentication Links -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ ('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ ('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-4 mt-5">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-light pt-5 pb-3 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <h5 class="fw-bold">About Us</h5>
                        <p>We are  online shop providing the best products worldwide. Quality, trust, and customer satisfaction are our top priorities.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h5 class="fw-bold">Contact</h5>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-envelope me-2"></i> www.kywmgmgliwn146018@gmail.com</li>
                            <li><i class="bi bi-phone me-2"></i> +959796582826</li>
                            <li><i class="bi bi-geo-alt me-2"></i> TitTaw Street, Ahlone, Yangon City</li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h5 class="fw-bold">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/') }}" class="text-light"><i class="bi bi-house-door me-2"></i> Home</a></li>
                            <li><a href="{{ url('/products') }}" class="text-light"><i class="bi bi-shop me-2"></i> Products</a></li>
                            {{-- <li><a href="{{ url('/about') }}" class="text-light"><i class="bi bi-info-circle me-2"></i> About</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="text-center pt-3 border-top">
                    &copy; {{ date('Y') }}  All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>