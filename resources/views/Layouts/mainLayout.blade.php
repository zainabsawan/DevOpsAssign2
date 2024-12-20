<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/styles.css')}}">
    <link rel="stylesheet" type="text/css" @yield('css')>

</head>

<body class="antialiased">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>


    @include('Layouts.navLayout')

    {{-- @if(session not created or user didnt logged in use this) --}}
        @yield('guestNav')
    {{-- @endif --}}
       
    @yield('maincontent')


    <!-- ============footer========== -->

    <footer class="container py-5">
        <div class="row">
            <div class="col-6 col-md">
                <h5>Quick Links</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">Policy</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Return and refund policy</a>
                    </li>
                    <li><a class="link-secondary text-decoration-none" href="#">shipping</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Company</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">About us</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Find us</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Contact us</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">Facebook</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Instagram</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Gmail</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>
