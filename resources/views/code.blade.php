@extends('Layouts.mainLayout')
@section('title', 'Why plants | Benefits')

@section('css')
    href="{{ URL::asset('css/carousel.css')}}"
@endsection

@section('maincontent')

<!-- ===========================================Main -->

<main class="container">

    <!-- --------------------------------------Carousel -->
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <!-- Your carousel items go here -->
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- -------------------------------------------Album -->

    <!-- Indoor Plants Section -->
    <div class="row py-lg-5" id="indoor">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light text-center">Indoor Plants</h1>
        </div>
    </div>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!-- Your indoor plant cards go here -->
            </div>
        </div>
    </div>

    <!-- Outdoor Plants Section -->
    <div class="row py-lg-5" id="outdoor">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light text-center">Outdoor Plants</h1>
        </div>
    </div>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!-- Your outdoor plant cards go here -->
            </div>
        </div>
    </div>

    <!-- Succulents Section -->
    <div class="row py-lg-5" id="succulents">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light text-center">Succulents</h1>
        </div>
    </div>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!-- Your succulent cards go here -->
            </div>
        </div>
    </div>

    <!-- Flowers Section -->
    <div class="row py-lg-5" id="flowers">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light text-center">Flowers</h1>
        </div>
    </div>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <!-- Your flower cards go here -->
            </div>
        </div>
    </div>

</main>

@endsection
