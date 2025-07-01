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
                                                                <a href="{{ route('shop.category', $data->id) }}">
                                                                    {{ $data->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- size section in sidebar --}}
                                    <div class="card">
                                        {{-- <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                        </div>
                                        <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__size">
                                                    <label for="xs">xs
                                                        <input type="radio" id="xs">
                                                    </label>
                                                    <label for="sm">s
                                                        <input type="radio" id="sm">
                                                    </label>
                                                    <label for="md">m
                                                        <input type="radio" id="md">
                                                    </label>
                                                    <label for="xl">xl
                                                        <input type="radio" id="xl">
                                                    </label>
                                                    <label for="2xl">2xl
                                                        <input type="radio" id="2xl">
                                                    </label>
                                                    <label for="xxl">xxl
                                                        <input type="radio" id="xxl">
                                                    </label>
                                                    <label for="3xl">3xl
                                                        <input type="radio" id="3xl">
                                                    </label>
                                                    <label for="4xl">4xl
                                                        <input type="radio" id="4xl">
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- color section in sidebar --}}
                                    {{-- <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                        </div>
                                        <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__color">
                                                    <label class="c-1" for="sp-1">
                                                        <input type="radio" id="sp-1">
                                                    </label>
                                                    <label class="c-2" for="sp-2">
                                                        <input type="radio" id="sp-2">
                                                    </label>
                                                    <label class="c-3" for="sp-3">
                                                        <input type="radio" id="sp-3">
                                                    </label>
                                                    <label class="c-4" for="sp-4">
                                                        <input type="radio" id="sp-4">
                                                    </label>
                                                    <label class="c-5" for="sp-5">
                                                        <input type="radio" id="sp-5">
                                                    </label>
                                                    <label class="c-6" for="sp-6">
                                                        <input type="radio" id="sp-6">
                                                    </label>
                                                    <label class="c-7" for="sp-7">
                                                        <input type="radio" id="sp-7">
                                                    </label>
                                                    <label class="c-8" for="sp-8">
                                                        <input type="radio" id="sp-8">
                                                    </label>
                                                    <label class="c-9" for="sp-9">
                                                        <input type="radio" id="sp-9">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="shop__product__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__left">
                                        <p>Showing results</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__right">
                                        {{-- <span>
                                            @include('component.global-message')
                                        </span> --}}
                                        <p>Sort by Price:</p>
                                        <span class="custom-dropdown">
                                                <select onchange="location = this.value;">
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
                        <div class="row">
                            @if ($productCount > 0 )
                            @foreach ($productData as $data)
                                <div class="col-lg-4 col-md-6 col-sm-6">

                                    <div class="product__item">

                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ url('storage/' . $data->image) }}">
                                            <a href="#">
                                                <ul class="product__hover">
                                                    {{-- <li><a href="#"><img
                                                                src="{{ asset('landing_page/img/icon/heart.png') }}"
                                                                alt=""></a></li>
                                                    <li><a href="#"><img
                                                                src="{{ asset('landing_page/img/icon/compare.png') }}"
                                                                alt=""> <span>Compare</span></a></li> --}}
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
                                            {{-- <h5>Name : {{ $data->name }} Rs.</h5> --}}

                                            <h5>Price : {{ $data->price }} Rs.</h5>
                                            <div class="product__color__select">
                                                <label for="pc-4">
                                                    <input type="radio" id="pc-4">
                                                </label>
                                                <label class="active black" for="pc-5">
                                                    <input type="radio" id="pc-5">
                                                </label>
                                                <label class="grey" for="pc-6">
                                                    <input type="radio" id="pc-6">
                                                </label>
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
                        {{-- <div class="row">
                            <div class="col-lg-12">
                                <div class="product__pagination">
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <span>...</span>
                                    <a href="#">21</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End -->
    </div>

@endsection
