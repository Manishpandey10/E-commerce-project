@extends('layouts.frontend.app')
@section('main-container')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="{{ route('landing.page') }}">Home</a>
                            <a href="{{ route('shop.page') }}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <span id="alert_msg" class="mx-6 mb-2 text-success">
                        @include('component.global-message')
                        <div class="text-danger mb-3">
                            @error('quantity')
                                {{ $message }}
                            @enderror
                        </div>
                    </span>
                    {{-- {{ dd($cartdata); }} --}}
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($cartdata as $data)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ url('storage/' . $data->products->image) }}"
                                                    style="width:90px; height:90px" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $data->products->name }}</h6>
                                                <h5>Rs.{{ $data->products->price }}</h5>
                                            </div>
                                        </td>

                                        <td class="quantity__item">
                                            {{-- Use a class for the form and add data-cart-id to the form --}}
                                            <form class="updateQuantityForm" data-cart-id="{{ $data->products->id }}">
                                                @csrf
                                                <div class="quantity">
                                                    <div class="pro-qty-2">
                                                        {{-- Keep data-cart-id on input if needed elsewhere, but mainly use it from the form --}}
                                                        <input type="text" class="quantity-input" name="quantity"
                                                            min="1" value="{{ $data->quantity }}">
                                                    </div>
                                                </div>
                                                {{-- Move the update button inside the form --}}
                                            </td>
                                            
                                        <td class="cart__price">Rs.<span
                                                class="item-total">{{ $data->products->price * $data->quantity }}</span>
                                        </td>
                                        <td>
                                                <div class="continue__btn update__btn">
                                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                </div>
                                        </td>
                                        </form>
                                        <td class="cart__close">
                                            <a href="{{ route('delete.cart', $data->id) }}">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-6">
                            <div class="continue__btn update__btn">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6">

                        </div>
                    </div>

                </div>
                <div class="col-lg-4">



                    <div>
                        <h6>Your Total</h6>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>

                        <ul>
                            {{-- {{ dd($totalPrice); }} --}}
                            <li>Total <span class="cart__total_price">Rs.{{ $totalPrice }} </span></li>
                            {{-- <li>Total <span>Rs. -- </span></li> --}}
                        </ul>
                        <a href="{{ route('checkout.info') }}" class="primary-btn">Proceed to checkout</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
            
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.updateQuantityForm').on('submit', function(e) {
                    e.preventDefault();
                    let form = $(this);
                    let Id = form.data('cart-id');
                    let quantity = form.find('.quantity-input').val();

                    $.ajax({
                        url: '/update-cart/' + Id,
                        method: 'POST',
                        data: {
                            quantity: quantity
                        },

                        success: function(res) {
                            console.log(res);
                            if (res.status === "success") {
                                alert('item updated');
                                form.find('.quantity-input').val(res.data.quantity);
                                let totalPrice = res.data.price*res.data.quantity;
                                form.closest('tr').find('.item-total').text(totalPrice);
                                // $('.cart__total_price').text(totalPrice);

                            } else {
                                alert('Could not update value, please try again!');
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }

                    })

                });
            });
        </script>
    @endpush
@endsection
