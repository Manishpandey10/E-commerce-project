@extends('users.layouts.main')

@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            @foreach ($orderDetails as $data)
                <div class="container mt-4">
                    <div class="card shadow rounded">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Order Details</h5>
                            <span class="badge bg-success">E-comm: {{ $data->order_id }}</span>
                        </div>

                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>

                                    <strong>{{ $data->product_name }}</strong><br>
                                    &nbsp;
                                    <img src={{ asset('storage/' . $data->image) }} alt="product image"
                                        style="width:60px; height:60px;">
                                    <br>
                                    <small class="text-muted">SKU:{{ $data->sku }}</small>
                                </div>
                                <div class="text-end">
                                    <p class="mb-0">Price : {{ $data->price }} × 1</p>

                                    <a href="{{ route('user.return.order',$data->product_id) }}" class="btn btn-warning btn-sm mt-1">
                                        Return
                                    </a>

                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>SubTotal: </strong>Rs.{{ $order->total }}</p>
                                    <p><strong>Shipping:</strong> {{ $order->shipping }}</p>
                                    {{-- <p><strong>Grand Total:</strong> $900</p>
                                <p><strong>Paid:</strong> $0</p> --}}
                                </div>

                                <div class="col-md-6">
                                    <p><strong>
                                            Shipping Details
                                            <hr>
                                        </strong>
                                    </p>
                                    @foreach ($shipping as $data)
                                        <p><strong>Delivering To:</strong> {{ $data->name }}</p>
                                        <p><strong>Email: </strong>{{ $data->email }}</p>
                                        <p><strong>Phone: </strong>{{ $data->phone }}</p>
                                        <p><strong>Shipping Address: </strong><br>
                                            {{ $data->address }}
                                        </p>
                                    @endforeach
                                    @foreach ($billing as $data)
                                        <p><strong>Billing Address:</strong><br>
                                            {{ $data->address }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            {{-- <button class="btn btn-danger">Cancel Order</button> --}}
                           
                            <a href="{{ route('user.cancel.order',$orderDetails->first()->product_id) }}" class="btn btn-danger btn-sm mt-1">
                                      Cancel Order
                            </a>  
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- 
        <div class="content-wrapper">
            <!-- Content -->
            <div class="row mb-12 mt-7 g-6 justify-content-center">
                @foreach ($orderDetails as $data)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('storage/' . $data->image) }}" alt="Card image cap" style="width: max; height:230px;"/>
                            <div class="card-body">
                                <h5 class="card-title"><strong>Product Name</strong>: {{ $data->product_name }}</h5>
                                <h6 class="card-title">Quantity: {{ $data->quantity }}</h6>
                                <h6 class="card-title">Order ID: {{ $data->order_id }}</h6>
                                <h6 class="card-title">Product Price: {{ $data->price }}</h6>
                                <hr>
                                <p class="card-text">
                                    <strong>Order Time </strong><br>
                                    {{ $data->created_at }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
        </div>
    </div>
@endsection
