@extends('Layouts.adminLayout')
    @section('admincontent')
    
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Products</h1>
                    <button type="button" class="btn btn-sm btn-outline-secondary"
                        onclick="window.location.href='/addProduct'">Add product</button>
                </div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif


                <div id="seachBox">
                    
                </div>

                <!-- =============================================================here -->
                <div class="album py-5 bg-body-tertiary">
                    <div class="container">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            @foreach ($products as $product)
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <img class="bd-placeholder-img card-img-top" width="100%" height="300"
                                            src="{{ asset($product->MainImage) }}" alt="Product image" />

                                        <div class="card-body">
                                            <p class="card-text">{{ $product->Name }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <form action="{{ route('deleteProduct', $product->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group">
                                                        <button type="button" onclick="return window.location.href='{{ route('editProduct', $product->id) }}'"
                                                            class="btn btn-sm btn-outline-secondary">Edit</button>
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-secondary">Delete</button>
                                                    </div>
                                                </form>

                                                <small class="text-body-secondary">{{ $product->Price }}$ |
                                                    {{ $product->Quantity }} in stock</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- =============================================================to here -->


            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>

</body>
@endsection
</html>
