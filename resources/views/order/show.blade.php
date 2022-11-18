@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row"> 
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Order Details</h1>
    </div>
    <div class="col-xl-5 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-6">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <h4 class="text-info">Booking Date</h4>
                            <p>  {{ $data->booking_date}}</p>
                            <h4 class="text-info">Delivery Date </h4>
                            <p>  {{ $data->delivery_date}}</p>
                            <h4 class="text-info">Delivery Address</h4>
                            <p>  {{ $data->delivery_address}}</p>
                            <h4 class="text-info">Service Keeper</h4>
                            <p> {{ $data->service_keeper }}</p>
                            <h4 class="text-info">Order Note</h4>
                            <p>  {{ $data->order_note}}</p>
                            <h4 class="text-info">Order Amount</h4>
                            <p>  {{ $data->order_amount }}</p> 
                            <h4 class="text-info">Customer Name</h4>
                            <p>  {{ $data->customer->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-7 col-md-6 mb-4">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Order Menu</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="container h5 card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Menu</th>
                                <th scope="col">Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($orderlinedata as $orderlinedata)
                                    <tr>
                                        <td>{{$orderlinedata->menu_name}}</th>
                                        <td>{{$orderlinedata->menu_type}}</td>
                                        <td>{{$orderlinedata->price}}</td>   
                                        <td>{{$orderlinedata->unit}}</td> 
                                        <td>{{$orderlinedata->amount}}</td>
                                    </tr>	
                                @endforeach
                            </tbody>
                        </table>
                </div>
             </div>
            </div>
        </div>
   </div>
</div>
        
@endsection        