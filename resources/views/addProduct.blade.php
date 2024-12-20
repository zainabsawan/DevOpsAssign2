@extends('Layouts.adminLayout')
@section('admincontent')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Product</h1>
        </div>

        <div class="col">
            <form action="{{ route('addProduct.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="productName" name="productName" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01"
                        required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="indoor" id="indoor" name="category[]">
                        <label class="form-check-label" for="indoor">
                            Indoor
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="outdoor" id="outdoor" name="category[]">
                        <label class="form-check-label" for="outdoor">
                            Outdoor
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="succulents" id="succulents"
                            name="category[]">
                        <label class="form-check-label" for="succulents">
                            Succulents
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="flowers" id="flowers" name="category[]">
                        <label class="form-check-label" for="flowers">
                            Flowers
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mainImage" class="form-label">Main Image:</label>
                    <input type="file" class="form-control" id="mainImage" name="mainImage" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label for="OtherImages" class="form-label">Other Images:</label>
                    <input type="file" class="form-control" id="OtherImages" name="OtherImages[]" accept="image/*"
                        multiple>
                </div>

                <button type="submit" value="submit" class="btn btn-primary">Add Product</button>

            </form>
        </div>
    </main>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>

    </body>

    </html>
@endsection
