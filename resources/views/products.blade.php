@extends('Layouts.adminLayout')
@section('title', 'Products')
@section('admincontent')
    <style>

        .card {
            transition: transform .2s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
            transition: all .5s;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
        }

        #search {

            transition: all .5s;
        }

        #search:focus {
            box-shadow: 0 0 10px #719ECE;
            border-color: #719ECE;
        }
    </style>


    <main class="container-fluid">

            <h1 class="h2 mt-3 text-center">Products</h1>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
                </form>
                <button type="button" class="btn btn-sm btn-outline-secondary"
                    onclick="window.location.href='/addProduct'">Add product</button>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="productsList">
            </div>




        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="album py-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card shadow-sm">
                            {{-- <img class="bd-placeholder-img card-img-top" width="100%" height="300"
                                src="{{ asset($product->MainImage) }}" alt="Product image" /> --}}
                                <div id="carousel-{{ $product->id }}" class="carousel slide card shadow-sm" data-bs-ride="carousel" data-bs-interval="5000">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="bd-placeholder-img card-img-top" width="100%" height="300"
                                                src="{{ asset($product->MainImage) }}" alt="Product image" />
                                        </div>
                                        @if ($product->OtherImages)
                                            @php
                                                $OtherImages = explode(',', $product->OtherImages);
                                            @endphp
                                            @foreach ($OtherImages as $image)
                                                <div class="carousel-item">
                                                    <img class="bd-placeholder-img card-img-top" width="100%" height="300"
                                                        src="{{ asset(trim($image)) }}" alt="Product image" />
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    @if($product->OtherImages)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $product->id }}"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $product->id }}"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    @endif
                                </div>
                


                            <div class="card-body">
                                <p class="card-text">{{ $product->Name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <form action="{{ route('deleteProduct', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <button type="button"
                                                onclick="return window.location.href='{{ route('editProduct', $product->id) }}'"
                                                class="btn btn-sm btn-outline-secondary">Edit</button>
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                        </div>
                                    </form>

                                    <small class="text-muted">{{ $product->Price }}$ |
                                        {{ $product->Quantity }} in stock</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>

    <script>
        // Add a smooth scroll effect when clicking on buttons
        const allButtons = document.querySelectorAll('.btn');

        allButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                // e.preventDefault();

                const href = button.getAttribute('href');

                if (href === '#') {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else if (href) {
                    const offsetTop = document.querySelector(href).offsetTop;

                    scroll({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
@endsection