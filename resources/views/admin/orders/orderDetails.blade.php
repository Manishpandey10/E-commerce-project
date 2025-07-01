@extends('layouts.admin.app')

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
                                    <th>User ID</th>
                                    <th>Delivering To</th>
                                    <th>Delivering status</th>
                                    <th>Registered At</th>
                                    {{-- <th>Actions</th> --}}
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderData as $data)
                                    <tr>


                                        <td>
                                            {{ $data->order_id }}
                                        </td>
                                        <td>
                                            {{ $data->user_id }}
                                        </td>
                                        <td>
                                            {{ $data->name }}
                                        </td>
                                        <td>
                                            <form action="{{ route('order.updateDeliveryStautus', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                <select name="delivery_status"  class="form-select" id="deliveryStatus"  onchange="this.form.submit()">
                                                    <option value="Pending"
                                                        {{ $data->delivery_status === 'Pending' ? 'selected' : '' }}>
                                                        Pending</option>
                                                    <option value="Not Delivered"
                                                        {{ $data->delivery_status === 'Not Delivered' ? 'selected' : '' }}>Not
                                                        Delivered</option>
                                                    <option value="Delivered"
                                                        {{ $data->delivery_status === 'Delivered' ? 'selected' : '' }}>
                                                        Delivered</option>
                                                    <option value="Returned"
                                                        {{ $data->delivery_status === 'Returned' ? 'selected' : '' }}>
                                                        Returned</option>
                                                    <option value="Cancelled"
                                                        {{ $data->delivery_status === 'Cancelled' ? 'selected' : '' }}>
                                                        Cancelled</option>

                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            {{ $data->created_at }}
                                        </td>
                                        {{-- <td>
                                            <button type="button" class=" btn btn-primary edit-btn"
                                                name="edit ">Edit</button>&nbsp;&nbsp;
                                            <button type="button" class="btn btn-primary dlt-btn">Status</button>
                                        </td> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
