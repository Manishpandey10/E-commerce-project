@extends('layouts.frontend.app')
@section('main-container')
    <div class="main-container">
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h4>Shop</h4>
                            <div class="breadcrumb__links">
                                <a href="{{ route('landing.page') }}">Home</a>
                                <a href="{{ route('shop.page') }}">Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Shop Section Begin -->
        <section class="shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="shop__sidebar">
                            <div class="shop__sidebar__search">
                                <form action="{{ route('shop.page') }}">
                                    <input name="search" type="text" placeholder="Search...">
                                    <button type="submit"><span class="icon_search"></span></button>
                                </form>
                            </div>
                            <div class="shop__sidebar__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                        </div>


                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__categories"
                                                    style="max-height: 200px; overflow-y: auto;">
                                                    <ul class="nice-scroll">
                                                        @foreach ($category as $data)
                                                            <li>
                                                                <button class="categoryName btn btn-link link-light"
                                                                    data-id="{{ $data->id }}">
                                                                    {{-- <a href="{{ route('shop.category',$data->id) }}"> --}}
                                                                    {{ $data->name }}
                                                                    {{-- </a> --}}
                                                                </button>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="shop__product__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__ d-flex justify-content-left align-items-center">
                                        <p>Showing results</p>
                                        <a class="btn-link  btn-sm" id="showAllProducts"
                                            href="{{ route('shop.page') }}">Show All products</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__right">

                                        <p>Sort by Price:</p>
                                        <span class="custom-dropdown">
                                            <select class="filterProduct" onchange="location = this.value;">
                                                <option selected disabled>Select Price Range</option>
                                                <option value="{{ route('price.filter.low') }}">Rs.0 - Rs.100</option>
                                                <option value="{{ route('price.filter.high') }}">Rs.100 +</option>
                                                <option value="{{ route('shop.page') }}">Show All</option>
                                            </select>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="productList">
                            @if ($productData->count() > 0)
                                @foreach ($productData as $data)
                                    <div class="col-lg-4 col-md-6 col-sm-6">

                                        <div class="product__item">

                                            <div class="product__item__pic set-bg"
                                                data-setbg="{{ url('storage/' . $data->image) }}">
                                                <a href="#">
                                                    <ul class="product__hover">

                                                        <li><a href="{{ route('shop.details', $data->id) }}"><img
                                                                    src="{{ asset('landing_page/img/icon/cart.png') }}"
                                                                    alt=""><span>Details</span></a></li>
                                                    </ul>
                                                </a>
                                            </div>

                                            <div class="product__item__text">
                                                <h6>{{ $data->name }}</h6>


                                                <a href="{{ route('add.cart', ['product_id' => $data->id]) }}"
                                                    class="add-cart">+
                                                    Add To Cart</a>


                                                <br>

                                                <h5>Price : {{ $data->price }} Rs.</h5>
                                                <div class="product__color__select">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-lg-12 text-center">
                                    <div class="alert alert-info" role="alert">
                                        <h4>No items found for your search "{{ request('search') }}".</h4>
                                        <p>Please try a different search term or browse all products.</p>
                                        <a href="{{ route('shop.page') }}" class="btn btn-primary mt-3">Back to Shop</a>
                                    </div>
                                </div>
                            @endif


                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End -->
    </div>

    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                let shopUrl = "{{ route('shop.page') }}";
                //this was when we was htting forms and changing the actuak urls
                if (window.location.href == shopUrl) {
                    $('#showAllProducts').hide();
                } else {
                    $('#showAllProducts').show();
                }
                // Show all products
                $('#showAllProducts').on('click', function(e) {
                    e.preventDefault();
                    window.location.href = shopUrl;
                });
                //this above workede when we was hitting forms and changing the actual urls 
                // category filters
                $('.categoryName').on('click', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    $.ajax({
                        url: '/shop-category-products/' + id,
                        method: 'GET',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            console.log(res);
                            console.log(res.productData);
                            if (res.status == "success") {
                                console.log('ajax workis');
                                $('#productList').html('');
                                let productData = res.productData;
                                productData.forEach(function(data) {

                                    let html = `
                                        <div class="col-lg-4 col-md-6 col-sm-6">
    
                                            <div class="product__item">
    
                                                <div class="product__item__pic set-bg"
                                                    data-setbg='/storage/${data.image}'>
                                                    <a href="#">
                                                        <ul class="product__hover">
                                                            <li><a href='shop.details/${data.id}'><img
                                                                        src='/landing_page/img/icon/cart.png'
                                                                        alt=""><span>Details</span></a></li>
                                                        </ul>
                                                    </a>
                                                </div>
    
                                                <div class="product__item__text">
                                                    <h6>${data.name}</h6>    
                                                    <a href='/cart-add/${data.id}'
                                                        class="add-cart">+
                                                        Add To Cart</a>
    
    
                                                    <br>
    
                                                    <h5>Price :${data.price}Rs.</h5>
                                                    <div class="product__color__select">
                                                       
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
                                    `;
                                    $('#productList').append(html);
                                    $('.set-bg').each(function() {
                                        var bg = $(this).data('setbg');
                                        $(this).css('background-image', 'url(' +
                                            bg + ')');
                                    });
                                });
                            }
                              $('#showAllProducts').show();

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
