@extends('admin.layouts.main')
@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="row mx-4 mt-6 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Add new product</h5>
                            <span>
                                @include('component.global-message')
                            </span>
                        </div>
                        <div class="card-body">

                            <form id="updateForm" method="POST" class="mb-6" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-6 mb-4">
                                        <label for="username" class="form-label">Enter Product Name</label>
                                        <input type="text" class="form-control" id="username" name="productname"
                                            placeholder="Enter name of Product" autofocus
                                            value="{{ old('productname') }}" />
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
                                            <option value="" selected>Select Product Category </option>
                                            @foreach ($category as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ old('productCategory') == $data->id ? 'selected' : '' }}>
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
                                        <label class="form-file" for="basic-default-message">Upload Thumbnail</label>
                                        <input type="file" accept="image/jpeg, image/jpg, image/png" name="thumbnail"
                                            id="basic-default-message" class="form-control"></input>
                                        <small id="emailHelp" class="form-text text-muted">Supported file formats =
                                            .JPG,.PNG,
                                            .JPEG</small>
                                        <br>
                                        <span id="thumbnail" class="text-danger">
                                            @error('thumbnail')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="col-6 mb-4">
                                        <label for="username" class="form-label">Enter Product Description</label>
                                        <input type="text" class="form-control" id="username" name="productDescription"
                                            placeholder="Enter Description of Product" autofocus
                                            value="{{ old('productDescription') }}" />
                                        <span id="productname" class="text-danger">
                                            @error('productDescription')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label for="username" class="form-label">Enter Price </label>
                                        <input type="number" class="form-control" id="username" name="price"
                                            placeholder="Enter price of Product" autofocus value="{{ old('price') }}" />
                                        <span id="productname" class="text-danger">
                                            @error('price')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label for="username" class="form-label">Enter discount </label>
                                        <input type="number" class="form-control" name="discount"
                                            placeholder="Enter discount for Product" autofocus value="{{ old('discount') }}" />
                                        <span id="productname" class="text-danger">
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
                                            <option value="0"{{ old('productStatus') == '0' ? 'selected' : '' }}>
                                                Unlisted
                                            </option>
                                            <option value="1"{{ old('productStatus') == '1' ? 'selected' : '' }}>
                                                Listed
                                            </option>
                                        </select>
                                        <span id="productStatus" class="text-danger">
                                            @error('productStatus')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="my-7">
                                        <button class="btn btn-primary d-grid btn-md">Add new product</button>

                                    </div>

                            </form>

                        </div>
                    </div>
    </div>
@endsection