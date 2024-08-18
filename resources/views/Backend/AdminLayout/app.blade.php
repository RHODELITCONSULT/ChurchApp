@include('Backend.includes.header')

<body>
    @include('Backend.includes.loader')

    <div class="main-wrapper">
        @include('Backend.includes.navbar')

        @include('Backend.includes.sidebar')

        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>

    @include('Backend.includes.footer')
</body>

</html>
