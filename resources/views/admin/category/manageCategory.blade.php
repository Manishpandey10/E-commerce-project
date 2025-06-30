@extends('layouts.admin.app')
@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="card mx-4 mt-6">
                
                <h5 class="card-header">Manage Product Category </h5>
                <span id="alert_msg" class="text-success mt-6 mb-4 ">
                    @include('component.global-message')
                </span>

                <div class="mt-6">
                </div>
                <div class="card-body">
                    <button type="button" class=" btn btn-light " id="edit" name="edit"><a
                            href="{{ route('add.category') }}" class="link-primary">Add new Product category</a>
                    </button>

                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Thumbnail</th>
                                    <th>Registered At</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categorydata as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <img src="{{ url('storage/' . $data->image) }}" width="50px"
                                                height="50px">
                                        </td>
                                        <td>{{ $data->created_at }}</td>
                                        @if ($data->status == '0')
                                            <td>
                                                <span class="text-danger text-dangers">Unlisted</span>
                                            </td>
                                        @else
                                            <td>
                                                <span class="text-success text-success">Listed</span>
                                            </td>
                                        @endif
                                        <td><button type="button" class=" btn btn-primary edit-btn"
                                                name="edit"><a href="{{ route('edit.category',$data->id) }}" class=" link link-light">Edit</a></button>&nbsp;&nbsp;
                                            
                                            <button type="button" class=" btn btn-primary ">
                                                <a href="{{ route('delete.category',$data->id) }}" class=" link link-light">Delete</a></button>
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
