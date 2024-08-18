@include('Frontend.includes.header')

<body>
    <!-- Spinner Start -->
    @include('Frontend.includes.loader')
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('Frontend.includes.navbar')
    <!-- Navbar End -->

    <main>
        @yield('content')
    </main>


    @include('Frontend.includes.footer')
