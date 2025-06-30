@extends('layouts.users.app')
@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row mx-4 mt-6 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Cancel Your order</h5>
                            <span>
                                @include('component.global-message')
                            </span>
                        </div>
                        <div class="card-body">

                            <form id="updateForm" method="POST" class="mb-6"
                                action="{{ route('request.cancel.order', $order->order_id) }}">
                                @csrf
                                <div class="row ">
                                    <div class="col-12 mb-4">
                                        <label for="category" class="form-label">Select Reason for Product name:
                                            <strong>{{ $order->product_name }} </strong></label>
                                        <select class="form-select" aria-label="Default select example" name="reason">
                                            <option selected>Reason</option>
                                            <option value="changed_address"{{ old('reason') == '0' ? 'selected' : '' }}>
                                                Changed address
                                            </option>
                                            <option value="delivery_late"{{ old('reason') == '1' ? 'selected' : '' }}>
                                                Delivery
                                                getting late
                                            </option>
                                            <option value="order_mistake"{{ old('reason') == '1' ? 'selected' : '' }}>
                                                Ordered placed by mistake
                                            </option>
                                            <option value="not_liked"{{ old('reason') == '1' ? 'selected' : '' }}>
                                                Not Liked Products
                                            </option>
                                        </select>
                                        <span id="reason" class="text-danger">
                                            @error('reason')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="username" class="form-label">Description</label>
                                        <input type="textarea" class="form-control" id="Category_name" name="description"
                                            placeholder="Explain further your reason...." autofocus
                                            value="{{ old('Description') }}" />
                                        <span id="Description" class="text-danger">
                                            @error('Description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>


                                    <div class="my-7">
                                        <button class="btn btn-primary d-grid btn-md">Request to Return order.</button>

                                    </div>



                            </form>

                        </div>
                    </div>
                </div>
            @endsection
