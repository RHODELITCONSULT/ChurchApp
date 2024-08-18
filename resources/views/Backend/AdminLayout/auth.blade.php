@include('Backend.includes.header')

<body class="account-page">

    <div class="main-wrapper">
        @yield('auth-content')
    </div>


    <script src="{{asset('assets/Backend/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('assets/Backend/js/feather.min.js')}}"></script>

    <script src="{{asset('assets/Backend/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/Backend/js/script.js')}}"></script>
</body>

</html>
