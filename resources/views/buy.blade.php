@extends('Layouts.mainLayout')
@section('title', 'Buy plants')


@section('css')
    href={{ URL::asset('css/carousel.css') }}
@endsection

@section('maincontent')

<?php
$id = 0; // guest user

if (session()->has('customer_id')) {
    $id = session('customer_id');
}
?>



<script src="{{URL::asset('scripts/cart.js')}}"></script>
    <!-- ===========================================Main -->

{{-- <h1>{{$id}}</h1> --}}

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
            <div class="carousel-item active">
                <img src="images/cropped-landing-carousel-1 (1).jpg" class="d-block w-100" alt="indoor plants">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Indoor plants</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn-success" href="#indoor">Browse</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/cropped-landing-carousel-2-75.jpg" class="d-block w-100" alt="outdoor plants">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Outdoor plants</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-success" href="#outdoor">Browse</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/cropped-succ.jpg" class="d-block w-100" alt="succulents">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Succulents</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn-success" href="#succulents">Browse</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/cropped-pexels-min-an-906156.jpg" class="d-block w-100" alt="flowers">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Flowers</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn-success" href="#flowers">Browse</a></p>
                    </div>
                </div>
            </div>
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
    <main class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="productsList">
        </div>
        
        <div class="row py-lg-5" id="indoor">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Indoor Plants</h1>
            </div>
        </div>

        @if ($products[0])
            <div class="album py-5 bg-body-tertiary">

                {{-- not zaruri --}}
                <div class="container-fluid">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($products[0] as $product)
                            <div class="col">
                                <div class="card shadow-sm" data-id="{{ $product->id }}" data-name="{{ $product->Name }}" data-price="{{ $product->Price }}">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="300"
                                        src="{{ asset($product->MainImage) }}" alt="Product image" />
                                    <div class="card-body">
                                        <h4>{{ $product->Name }}</h4>
                                        <p class="card-text">{{ $product->Description }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="return addToCart(event , {{$id}})">Add to cart
                                                </button>
                                            </div>
                                            <small class="text-body-secondary">${{ $product->Price }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
        @endif

        <div class="row py-lg-5" id="outdoor">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Outdoor Plants</h1>
            </div>
        </div>

        @if ($products[1])
            <div class="album py-5 bg-body-tertiary">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($products[1] as $product)
                            <div class="col">
                                <div class="card shadow-sm" data-id="{{ $product->id }}" data-name="{{ $product->Name }}" data-price="{{ $product->Price }}">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="300"
                                        src="{{ asset($product->MainImage) }}" alt="Product image" />
                                    <div class="card-body">
                                        <h4>{{ $product->Name }}</h4>
                                        <p class="card-text">{{ $product->Description }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="return addToCart(event , {{$id}})">Add to cart </button>
                                            </div>
                                            <small class="text-body-secondary">${{ $product->Price }}</small>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="row py-lg-5" id="succulents">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Succulents</h1>
            </div>
        </div>

        @if ($products[2])
            <div class="album py-5 bg-body-tertiary">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($products[2] as $product)
                            <div class="col">
                                <div class="card shadow-sm" data-id="{{ $product->id }}" data-name="{{ $product->Name }}" data-price="{{ $product->Price }}">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="300"
                                        src="{{ asset($product->MainImage) }}" alt="Product image" />
                                    <div class="card-body">
                                        <h4>{{ $product->Name }}</h4>
                                        <p class="card-text">{{ $product->Description }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="return addToCart(event , {{$id}})">Add to
                                                    cart</button>
                                            </div>
                                            <small class="text-body-secondary">${{ $product->Price }}</small>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        @endif



        <div class="row py-lg-5" id="flowers">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light text-center">Flowers</h1>
            </div>
        </div>

        @if ($products[3])
            <div class="album py-5 bg-body-tertiary">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($products[3] as $product)
                            <div class="col">
                                <div class="card shadow-sm" data-id="{{ $product->id }}" data-name="{{ $product->Name }}" data-price="{{ $product->Price }}">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="300"
                                        src="{{ asset($product->MainImage) }}" alt="Product image" />
                                    <div class="card-body">
                                        <h4>{{ $product->Name }}</h4>
                                        <p class="card-text">{{ $product->Description }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="return addToCart(event , {{$id}})"> Add to
                                                    cart</button>
                                            </div>
                                            <small class="text-body-secondary">${{ $product->Price }}</small>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        @endif

    @endsection