@extends('layouts.frontend.app')
@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row mx-4 mt-6 justify-content-center">
                <div class="col-12">
                    <div class="row">

                        <!-- Delivery Information Form -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <form method="POST" action="{{ route('create.order') }}">
                                    @csrf
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Delivery Information</h5>
                                        <span>@include('component.global-message')</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="name" id="delivery_name" class="form-control"
                                                placeholder="Enter full name" value="{{ old('name') }}">
                                            <span class="text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" name="email" id="delivery_email" class="form-control"
                                                placeholder="Enter email address" value="{{ old('email') }}">
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="phone" id="delivery_phone" class="form-control"
                                                placeholder="Enter phone number" value="{{ old('phone') }}">
                                            <span class="text-danger">
                                                @error('phone')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" id="delivery_address" class="form-control"
                                                placeholder="Enter address" value="{{ old('address') }}">
                                            <span class="text-danger">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <input type="text" name="country" id="delivery_country" class="form-control"
                                                placeholder="Enter country" value="{{ old('country') }}">
                                            <span class="text-danger">
                                                @error('country')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" name="state" id="delivery_state" class="form-control"
                                                placeholder="Enter state" value="{{ old('state') }}">
                                            <span class="text-danger">
                                                @error('state')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" name="city" id="delivery_city" class="form-control"
                                                placeholder="Enter city" value="{{ old('city') }}">
                                            <span class="text-danger">
                                                @error('city')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Pincode</label>
                                            <input type="text" name="pincode" id="delivery_pincode" class="form-control"
                                                placeholder="Enter pincode" value="{{ old('pincode') }}">
                                            <span class="text-danger">
                                                @error('pincode')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card mb-4" id="billingFormCard">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Billing Information</h5>
                                        <button type="button" id="formButton" onclick="diffrentInfo()"
                                        class="btn btn-outline-primary btn-sm">Diffrent billing Info
                                        </button>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="billing_name" id="billing_name" class="form-control"
                                            placeholder="Enter full name" value="{{ old('name') }}" disabled>
                                        <span class="text-danger">
                                            @error('billing_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" name="billing_email" id="billing_email"
                                            class="form-control" placeholder="Enter email address"
                                            value="{{ old('email') }}" disabled>
                                        <span class="text-danger">
                                            @error('billing_email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="billing_phone" id="billing_phone"
                                            class="form-control" placeholder="Enter phone number"
                                            value="{{ old('phone') }}" disabled>
                                        <span class="text-danger">
                                            @error('billing_phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="billing_address" id="billing_address"
                                            class="form-control" placeholder="Enter address"
                                            value="{{ old('address') }}" disabled>
                                        <span class="text-danger">
                                            @error('billing_address')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Country</label>
                                        <input type="text" name="billing_country" id="billing_country"
                                            class="form-control" placeholder="Enter country"
                                            value="{{ old('country') }}" disabled>
                                        <span class="text-danger">
                                            @error('billing_country')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">State</label>
                                        <input type="text" name="billing_state" id="billing_state"
                                            class="form-control" placeholder="Enter state" value="{{ old('state') }}"
                                            disabled>
                                        <span class="text-danger">
                                            @error('billing_state')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="billing_city" id="billing_city" class="form-control"
                                            placeholder="Enter city" value="{{ old('city') }}" disabled>
                                        <span class="text-danger">
                                            @error('billing_city')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Pincode</label>
                                        <input type="text" name="billing_pincode" id="billing_pincode"
                                            class="form-control" placeholder="Enter pincode"
                                            value="{{ old('pincode') }}" disabled>
                                        <span class="text-danger">
                                            @error('billing_pincode')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5 mb-5">
                        <button type="submit" class="btn btn-success btn-lg">
                            Proceed Safely
                        </button>
                    </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    @push('scripts')
        <script>
            // Function to copy delivery info to billing info and enable billing fields
            function diffrentInfo() {
                const billingInputs = document.querySelectorAll('#billingFormCard input');
                
                billingInputs.forEach(input => {
                    input.removeAttribute('disabled');
                    input.value= '';
                }); 

            }
        </script>
    @endpush
@endsection
