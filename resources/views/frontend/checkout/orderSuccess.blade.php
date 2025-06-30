@extends('layouts.frontend.app')
@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="d-flex justify-content-center align-items-center mt-50">
                <div class="text-center">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <img src="{{ url('landing_page/img/orderSuccess.png') }}" alt="Order Success"
                            style="width: 160px; height: 100px;" class="me-3">
                        <h1 class="mb-0">Order success</h1>
                    </div>

                    <a href="{{ route('landing.page') }}" class="btn btn-primary">Go to home page</a>
                </div>
            </div>
        </div>
    </div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
@endsection
