@extends('admin.layouts.main')
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

                            <form id="updateForm" method="POST" class="mb-6" action={{ route('register.category') }}
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-12 mb-4">
                                        <label for="username" class="form-label">Product Category Name</label>
                                        <input type="text" class="form-control" id="Category_name" name="categoryname"
                                            placeholder="Enter name of category" autofocus
                                            value="{{ old('categoryname') }}" />
                                        <span id="categoryname" class="text-danger">
                                            @error('categoryname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    {{-- <div class="col-6 mb-6">
                                        <label class="form-label" for="description">Enter description</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="description"
                                                placeholder="Enter description for the product category"
                                                class="form-control" name="categoryDescription" rows="3"
                                                value="{{ old('productDescription') }}"></input>
                                            <span class="input-group-text cursor-pointer"></span>
                                        </div>
                                        <span id="categoryDescription" class="text-danger">
                                            @error('categoryDescription')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div> --}}
                                    <div class="col-12  mb-6">
                                        <label class="form-file" for="basic-default-message">Upload Thumbnail</label>
                                        <input type="file" accept="image/jpeg, image/jpg, image/png" name="thumbnail"
                                            id="basic-default-message" class="form-control"></input>
                                        <small id="emailHelp" class="form-text text-muted">Supported file formats =
                                            .JPG,.PNG, .JPEG</small>
                                        <br>
                                        <span id="thumbnail" class="text-danger">
                                            @error('thumbnail')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="category" class="form-label">Status</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="productStatus">
                                            <option selected>Status </option>
                                            <option value="0"{{ old('productStatus') == '0' ? 'selected' : '' }}>
                                                Unlisted
                                            </option>
                                            <option value="1"{{ old('productStatus') == '1' ? 'selected' : '' }}>Listed
                                            </option>
                                        </select>
                                        <span id="productStatus" class="text-danger">
                                            @error('productStatus')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="my-7">
                                        <button class="btn btn-primary d-grid btn-md">Add new product category</button>

                                    </div>



                            </form>

                        </div>
                    </div>
                </div>
            @endsection
