@extends('layouts.users.app')
@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
    <div class="row mb-6 mt-6 gy-6 justify-content-center">
        <div class="col-6">
            <div class="card">
                <span id="alert_msg" class="text-danger mt-4 mx-4 ">
                    @include('component.global-message')
                </span>

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update Your Password</h5>
                </div>
                <div class="card-body">
                    <form id="updateForm" class="mb-6" action="{{ route('update.password') }}" method="POST">
                        @csrf
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" id="cur_password" for="password">Current Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="cur_password" />
                                <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                            </div>
                            <span id="curr_pass" class="text-danger">
                                @error('cur_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="basic-default-email">New Password</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" class="form-control" aria-label="john.doe"
                                    aria-describedby="basic-default-email2" name="new_password" />
                                <br>
                            </div>
                            <span id="new_pass" class="text-danger">
                                @error('new_password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label form-password-toggle" for="basic-default-phone">Confirm New
                                Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="basic-default-phone" class="form-control phone-mask"
                                    name="password_confirmation" />
                                <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                            </div>

                            <span id="confirm_pass" class="text-danger">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
