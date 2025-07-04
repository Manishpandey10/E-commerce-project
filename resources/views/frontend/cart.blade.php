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
                                            <form id="updateQuantity">
                                                {{-- @csrf --}}
                                                <div class="quantity">
                                                    {{-- <span id="dec" class="fa fa-angle-left dec qtybtn">aha</span> --}}
                                                    <div class="pro-qty-2">
                                                        <input type="text" id="quantity" data-cart-id="{{ $data->id }}" name="quantity" min="1"
                                                            value="{{ $data->quantity }} ">
                                                    </div>
                                                    {{-- <span id="inc" class="fa fa-angle-right inc qtybtn"></span> --}}
                                                </div>

                                        </td>

                                        <td class="cart__price">Rs.{{ $data->products->price * $data->quantity }}</td>

                                        <td>
                                            <div class="continue__btn update__btn">
                                                <button id="submit" class="btn btn-primary btn-sm"
                                                    type="submit">Update</button>
                                            </div>
                                        </td>
                                        <td class="cart__close"><a href="{{ route('delete.cart', $data->id) }}"><i
                                                    class="fa fa-close"></i></a>
                                        </td>
                                    </tr>
                                    </form>
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
                            <li>Total <span>Rs.{{ $totalPrice }} </span></li>
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
                $(document).ready(function(){
                    // $("#inc").on('change',function(){
                    //     let cartId = $(this).data('cart-id');
                    //     let oldQauntity =parseInt(this.val());
                    //     let newQuantity = oldQauntity+1;
                        
                    //     oldQauntity.val(newQuantity);
                    // });
                    // $("#dec").on('change',function(){
                    //     let cartId = $(this).data('cart-id');
                    //     let oldQauntity =parseInt(this.val());
                    //     let newQuantity = oldQauntity+1;

                    //     if(newQuantity>=1){
                    //         oldQauntity.val(newQuantity);
                    //     }
                    // });

                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $('#updateQuantity').on('change',function(){
                        const formData = new FormData(this);
                        $.ajax({
                            url:'/update-cart/'+cartId,
                            data:formData,
                            contentType: false,
                            processData: false,
                           success:function(res){
                            console.log(res);
                            if(res.status === "success"){
                                $('#quantity').value = res.data.quantity;
                            }
                            else{
                                alert('Could not update value, please try again!');
                            }
                           },
                           error:function(error){
                            console.log(error);
                           }
    
                        })
                        
                    });
                });
            </script>
   @endpush
@endsection
