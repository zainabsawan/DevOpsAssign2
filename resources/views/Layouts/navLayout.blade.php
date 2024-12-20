@section('guestNav')
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="cart" viewBox="0 0 16 16">
            <path
                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <nav class="navbar navbar-expand-md sticky-top border-bottom">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand " href="#">GoGreen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0 " tabindex="-1" id="navbarCollapse">

                <ul class="navbar-nav ">

                    <!-- <ul class="navbar-nav flex-grow-1 m-auto mb-2 mb-md-0 ml-md-3 mr-md-3 ml-sm-2 mr-sm-2"> -->
                    <li class="nav-item"><a class="nav-link" href="index" aria-current="page">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="whyplants">Why plants?</a></li>
                    <li class="nav-item dropdown" id="buy-dropdown">
                        <a class="nav-link dropdown-toggle" href="buy" role="button"
                            aria-expanded="false">
                            Buy plants
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="buy#indoor">Indoor</a></li>
                            <li><a class="dropdown-item" href="buy#outdoor">Outdoor</a></li>
                            <li><a class="dropdown-item" href="buy#succulents">Succulents</a></li>
                            <li><a class="dropdown-item" href="buy#succulents">Flowers</a></li>
                        </ul>
                    </li>
                    @if(session('customer_email'))
                        <li class="nav-item"><a class="nav-link" href="customerProfile">Profile</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
                    @endif
                    <li></li>


                </ul>
                <a class="nav-link ps-3" href="cart"><svg class="bi" width="16" height="16">
                        <use xlink:href="#cart" />
                    </svg></a>
            </div>
        </div>
    </nav>
@endsection


@section('adminNav')

    <nav class="navbar navbar-expand-md sticky-top border-bottom">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand " href="#">GoGreen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0 " tabindex="-1" id="navbarCollapse">

@endsection