@extends('layouts.admin.app')
@section('main-container')
 <div class="pc-container">
        <div class="pc-content">
            <div class="row mx-4 mt-6 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Add Product Category</h5>
                            <span>
                                @include('component.global-message')
                            </span>
                        </div>
                        <div class="card-body">

                            <form id="updateForm" method="POST" action="{{ route('submit.category', $categorydata->id) }}" class="mb-6" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-6 mb-4">
                                        <label for="username" class="form-label">Enter Category Name</label>
                                        <input type="text" class="form-control" id="username" name="categoryname"
                                            placeholder="Enter name of Product" autofocus
                                            value=" {{ $categorydata->name }}" />
                                        <span id="categoryname" class="text-danger">
                                            @error('categoryname')
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

                                    <div class="col-12 mb-4">
                                        <label for="category" class="form-label">Status</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="productStatus">
                                            <option selected>Status </option>
                                            <option value="0"{{ $categorydata->status == '0' ? 'selected' : '' }}>
                                                Unlisted
                                            </option>
                                            <option value="1"{{ $categorydata->status  == '1' ? 'selected' : '' }}>
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