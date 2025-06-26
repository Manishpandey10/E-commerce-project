@extends('users.layouts.main')
@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row mx-4 mt-6 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Add new product category</h5>
                            <span>
                                @include('component.global-message')
                            </span>
                        </div>
                        <div class="card-body">

                            <form id="updateForm" method="POST" class="mb-6" action="{{ route('order.return.request',$order->order_id) }}">
                                @csrf
                                <div class="row ">
                                    <div class="col-12 mb-4">
                                        <label for="category" class="form-label">Select Reason</label>
                                        <select class="form-select" aria-label="Default select example" name="reason">
                                            <option selected>Reason</option>
                                            <option value="0"{{ old('reason') == '0' ? 'selected' : '' }}>
                                                Changed address
                                            </option>
                                            <option value="1"{{ old('reason') == '1' ? 'selected' : '' }}>Delivery
                                                getting late
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
                                        <input type="textarea" class="form-control" id="Category_name" name="Description"
                                            placeholder="Enter name of category" autofocus
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
