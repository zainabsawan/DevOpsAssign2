@extends('Layouts.mainLayout')
@section('title', 'Home')
@section('css')
    href={{ URL::asset('css/heroes.css') }}
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@section('maincontent')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1></h1>
                <form method="POST" action="{{ route('logout') }}" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-primary bg-success border-success-subtle d-flex align-items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Sign out
                    </button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="customer-info bg-light p-3 rounded">
                    <h3>Customer Profile</h3>
                    <p><strong>Name:</strong> {{ $customer->Name }}</p>
                    <p><strong>Email:</strong> {{ $customer->Email }}</p>
                    <p><strong>Phone:</strong> {{ $customer->Phone }}</p>
                    <p><strong>Address:</strong> {{ $customer->Address }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h3>Orders</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Order-ID</th>
                                <th scope="col">Products</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders)
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>{{ $order->products }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection