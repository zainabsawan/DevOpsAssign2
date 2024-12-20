@extends('Layouts.mainLayout')
@section('title', 'Home')
@section('css')
    href={{ URL::asset('css/heroes.css') }}
@endsection

{{-- @section('nav')
    @include('Layouts.navLayout')
    @yield('guestNav')
@endsection --}}

@section('maincontent')

    <style>
        .card:hover {
            transform: scale(1.05);
            transition: transform .2s;
        }

        .carousel:hover {
            transform: scale(1.05);
            transition: transform .2s;
        }

        .carousel.rtl {
            direction: rtl;
        }

        .carousel.rtl .carousel-item {
            transition: transform 0.01s ease-in-out !important;
        }

        @media only screen and (max-width: 599px) {
            .carousel img {
                width: 100%;
                height: auto;
            }
        }

        @media only screen and (min-width: 600px) {
            .carousel img {
                width: 75%;
                height: auto;
            }
        }

        @media only screen and (min-width: 768px) {
            .carousel img {
                width: 75%;
                height: auto;
            }
        }

        @media only screen and (min-width: 768px) {
            .carousel img {
                width: 50%;
                height: auto;
            }
        }

        @media only screen and (min-width: 992px) {
            .carousel img {
                width: 432px;
                height: 540px;
            }
        }
    </style>
    <style>

    </style>

    <main class="container">

        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="images/plant.png" alt="logo here" width="72" height="57">
            <h1 class="display-5 fw-bold text-body-emphasis">Welcome to GoGreen</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Let's celebrate plants not just for their beauty but for their role in creating a
                    healthier
                    environment. From purifying the air to reducing carbon footprints, these green pals are eco-warriors
                    in
                    disguise. Join us on a journey to make your space more sustainable and stylish. Let's plant the
                    seeds for a
                    greener tomorrow, one leaf at a time!</p>
            </div>
        </div>


        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="images/BeFunky-collage (1).jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                        width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Why need plants?</h1>
                    <p class="lead">Not only do indoor plants enhance the overall appearance of a space, but studies
                        show they
                        boost moods, increase creativity, reduce stress, and eliminate air pollutants—making for a
                        healthier,
                        happier you.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="whyplants">
                            <button type="button" class="btn btn-primary btn-success btn-lg px-4 me-sm-3">Learn
                                more</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="display-4 fw-bold text-center text-body-emphasis"> Explore our Green Oasis! </h1>
        <div class="px-4 pt-5 my-5 text-center border-bottom">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex align-items-stretch p-0">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Indoor Plants: Serenity at Home</h5>
                                    <p class="card-text">
                                        Elevate your indoor spaces with our stunning indoor plants. Beyond beauty, they're
                                        stress-busters, promoting peace and well-being. Bring nature inside and let positive
                                        vibes thrive! </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex align-items-stretch p-0">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Outdoor: Nature's Playground</h5>
                                    <p class="card-text">
                                        Explore outdoor wonders with our vibrant plants. From morning coffee in a blooming
                                        garden to evening gatherings surrounded by greenery, create your outdoor haven. It's
                                        not just a garden; it's your escape! </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex align-items-stretch p-0">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Succulents: Little Wonders of Resilience</h5>
                                    <p class="card-text">
                                        Meet our resilient succulents – low-maintenance wonders that bring style
                                        effortlessly. From aloe vera to echeverias, these small marvels add character to any
                                        space. Dive into their world where style meets simplicity! </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 d-flex align-items-stretch p-0">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Flowers: Nature's Poetry in Bloom</h5>
                                    <p class="card-text">
                                        Indulge in the poetry of flowers. Beyond visual splendor, they bring joy and
                                        romance. Whether for special occasions or daily happiness, our flowers weave a
                                        tapestry of beauty into your life. Embrace the magic of blossoms at GoGreen!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 d-flex align-items-center">
                    
                    <div id="carouselExampleAutoplaying" class="carousel slide mb-6" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active" data-bs-interval=3000>
                                <img src="images/indoor.png" class="d-block" alt="indoor plants">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="images/outdoor.png" class="d-block" alt="outdoor plants">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="images/succulents.png" class="d-block" alt="succulents">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="images/flower.png" class="d-block" alt="flowers">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </main>


@endsection