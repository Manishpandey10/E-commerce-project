@extends('admin.layouts.main')

@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row mx-4 mt-6 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h5 class="mb-0">Edit the product category</h5>
                        </div>
                        <div class="mx-5">
                            <small class="form-text text-muted">Edit the details you want to edit for the existing product
                                category</small>
                        </div>
                        <div class="card-body">

                            <form id="updateForm" class="mb-6" method="POST"
                                action="{{ route('submit.product', $productdata->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-6 mb-4">
                                        <label for="username" class="form-label">Enter Product Name</label>
                                        <input type="text" class="form-control" id="username" name="productname"
                                            placeholder="Enter name of product" autofocus
                                            value="{{ $productdata->name }}" />
                                        <span id="productname" class="text-danger">
                                            @error('productname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label for="category" class="form-label">Category</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="productCategory">
                                            <option value="" selected>Select Theme</option>
                                            @foreach ($category as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $productdata->category->id == $data->id ? 'selected' : '' }}>
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span id="productCategory" class="text-danger">
                                            @error('productCategory')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 mb-6">
                                        <label class="form-label" for="description">Enter Product description</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="description" class="form-control"
                                                placeholder="Enter description of the product" name="productDescription"
                                                rows="3" value="{{ $productdata->description }}"></input>
                                            <span class="input-group-text cursor-pointer"></span>
                                        </div>
                                        <span id="productDescription" class="text-danger">
                                            @error('productDescription')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                    <div class="col-6 mb-6">
                                        <label class="form-file" for="basic-default-message">Upload Thumbnail</label>
                                        <input type="file" accept="image/jpeg, image/jpg, image/png"
                                            name="productthumbnail" id="basic-default-message" class="form-control"></input>
                                        <small id="emailHelp" class="form-text text-muted">Supported file formats =
                                            .JPG,.PNG,
                                            .JPEG</small>
                                        <span id="productthumbnail" class="text-danger">
                                            @error('productthumbnail')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-6 mb-6">
                                        <label class="form-label" for="description">Price</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="description" class="form-control"
                                                placeholder="Enter description of the product" name="price"
                                                rows="3" value="{{ $productdata->price }}"></input>
                                            <span class="input-group-text cursor-pointer"></span>
                                        </div>
                                        <span id="price" class="text-danger">
                                            @error('price')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>
                                    <div class="col-6 mb-6">
                                        <label class="form-label" for="description">Discount</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="description" class="form-control"
                                                placeholder="Enter description of the product" name="discount"
                                                rows="3" value="{{ $productdata->discount }}"></input>
                                            <span class="input-group-text cursor-pointer"></span>
                                        </div>
                                        <span id="discount" class="text-danger">
                                            @error('discount')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>


                                    <div class="col-12 mb-4">
                                        <label for="category" class="form-label">Status</label>

                                        <select class="form-select" aria-label="Default select example"
                                            name="productStatus">
                                            <option selected>Status </option>
                                            <option value="1"
                                                {{ $productdata->status == '1' ? 'selected' : '' }}>
                                                Listed</option>
                                            <option value="0"
                                                {{ $productdata->status == '0' ? 'selected' : '' }}>
                                                Unlisted</option>
                                        </select>

                                        <span id="productStatus" class="text-danger">
                                            @error('productStatus')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="my-7">
                                        <button class="btn btn-primary d-grid btn-md">Update Product</button>

                                    </div>



                            </form>

                        </div>
                    </div>
                </div>
            @endsection
