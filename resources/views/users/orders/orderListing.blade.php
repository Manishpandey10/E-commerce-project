@extends('users.layouts.main')

@section('main-container')
    <div class="pc-container">
        <div class="pc-content">
            <div class="card mx-4 mt-6">
                <span id="alert_msg" class="text-success mt-6 mb-4 ">

                </span>

                <h5 class="card-header">Order Listing</h5>
                <br>
                <br>
                <br>

                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Delivery To</th>
                                    <th>Delivery Status</th>
                                    <th>Registered At</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderData as $data)
                                    <tr>
                                        <td>
                                            {{ $data->order_id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td>    
                                        @if ( $data->delivery_status === 'Delivered' )
                                            <span class="text-success">
                                                {{ $data->delivery_status }}
                                            </span>
                                                
                                            @else
                                                <span class="text-danger">
                                                {{ $data->delivery_status }}
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $data->created_at }}
                                        </td>
                                        <td>
                                            {{-- <button type="button" class=" btn btn-primary edit-btn"
                                                name="edit ">Edit</button>&nbsp;&nbsp; --}}
                                            <a class="btn btn-primary" href="{{ route('user.order.details',$data->id) }}">Details</a>
                                        </td>
                                @endforeach

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
