@extends('layouts.users.app')

@section('main-container')
    <div class="pc-container">
        <div class="pc-content">

            @foreach ($orderDetails as $data)
                <div class="container mt-4">
                  
                    <div class="card shadow rounded">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Order Details</h5>
                            <span class="badge bg-success">{{ $data->order_id }}</span>
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
                                    <p class="mb-0">Price : {{ $data->price }} × {{$data->quantity}}</p>



                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Order Total: </strong>Rs.{{ $order->total }}</p>
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
                                    @foreach ($shipping as $shippingData)
                                        <h6><strong>Delivering To:</strong> {{ $shippingData->name }}</h6>
                                        <h6><strong>Email: </strong>{{ $shippingData->email }}</h6>
                                        <h6><strong>Phone: </strong>{{ $shippingData->phone }}</h6>
                                        <p><strong>Shipping Address: </strong><br>
                                            {{ $shippingData->address }}
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

                        
                    </div>
                </div>
            @endforeach

            @if ($order->delivery_status !== 'Cancelled' && $order->delivery_status !== 'Returned' )
                
            <div class="card-footer text-end">
                            {{-- <button class="btn btn-danger">Cancel Order</button> --}}
                            <a href="{{ route('user.return.order', $orderDetails->first()->order_id) }}"
                                class="btn btn-warning btn-sm mt-1">
                                Return
                            </a>
                            @if($order->delivery_status !=='Delivered')
                                <a href="{{ route('user.cancel.order', $orderDetails->first()->order_id) }}"
                                    class="btn btn-danger btn-sm mt-1">
                                    Cancel Order
                                </a>
                            @endif

                        </div>
            @endif

        </div>
    </div>
@endsection
