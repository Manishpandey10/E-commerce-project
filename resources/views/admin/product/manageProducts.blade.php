@extends('layouts.admin.app')
@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="card mx-4 mt-6">
                <div>
                    <h5 class="card-header">Manage Listed Products </h5>
                    <span id="alert_msg" class="mx-6 mb-2 text-success">
                        @include('component.global-message')
                    </span>
                </div>
                <div class="mx-6">
                </div>
                <div class="card-body">
                    <button type="button" class=" btn btn-light " id="edit" name="edit"><a
                            href="{{ route('add.product') }}" class="link-primary">Add new Product </a>
                    </button>
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product details</th>
                                    <th>Product Category</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productdata as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>Name: {{ $data->name }}
                                            <br>
                                            <div>Thumbnail:
                                                <img src="{{ url('storage/' . $data->image) }}" width="50px"
                                                    height="50px" alt="Thumbnail">
                                            </div>
                                            <div>Price:{{ $data->price }}
                                            </div>
                                        </td>
                                        <td>Product Category :
                                            @if ($data->category->status == 0)
                                                <span class="text-danger">{{ $data->category->name }}</span>
                                            @else
                                                <span class="text-success">{{ $data->category->name }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $data->created_at }}</td>

                                        @if ($data->status == '0')
                                            <td>
                                                <span class="text-danger text-dangers">Unlisted</span>
                                            </td>
                                        @else
                                            <td>
                                                <span class="text-success text-successs">Listed</span>
                                            </td>
                                        @endif

                                        <td>
                                            <button type="button" class=" btn btn-primary edit-btn" name="edit "><a
                                                    class="link-light"
                                                    href="{{ route('edit.product', $data->id) }}">Edit</a>
                                            </button>&nbsp;&nbsp;
                                            <button type="button" class=" btn btn-primary ">
                                                <a class="link-light"
                                                    href="{{ route('delete.product', $data->id) }}">Delete</a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
