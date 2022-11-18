@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <h3 class="text-center">Manama Bakery</h3>
                <h2>Bill # {{ $bill->id}}</h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Billing Details</div>
                        <div class="panel-body">
                            <strong>Customer :</strong> {{ $bill->order->customer->name }}<br>
                            <strong>Address :</strong>{{ $bill->order->customer->address }}<br>
                            Karachi,Pakistan.<br>
                            <strong>Mobile# :</strong>{{ $bill->order->customer->mobile_no }}<br>
                            <strong>Order Note# :</strong>{{ $bill->order->order_note }}<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6 pull-right">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Delivery Details</div>
                        <div class="panel-body">
                            <strong>Booking Date :</strong>{{ $bill->order->booking_date }}<br>
                            <strong>Delivery Date :</strong>{{ $bill->order->delivery_date }}<br>
                            <strong>Delivery Address :</strong>{{ $bill->order->delivery_address }}<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdata as $data)
                                <tr>
                                    <td>{{ $data->menu_name }}</td>
                                    <td class="text-center">{{ $data->price}}Rs</td>
                                    <td class="text-center">{{ $data->unit}}</td>
                                    <td class="text-right">{{ $data->amount}}Rs</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Service Charges</strong></td>
                                    <td class="highrow text-right">{{  $bill->service_amount }}Rs</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Fare Charges</strong></td>
                                    <td class="emptyrow text-right">{{ $bill->fare_amount }}Rs</td>
                                </tr>
                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Total Amount</strong></td>
                                    <td class="highrow text-right">{{ $bill->total_amount}}Rs</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Amount Received</strong></td>
                                    <td class="emptyrow text-right">{{ $bill->advance_amount}}Rs</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Remaining Amount</strong></td>
                                    <td class="emptyrow text-right">{{ $bill->remaining_amount }}Rs</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Adjust Amount</strong></td>
                                    <td class="emptyrow text-right">{{ $bill->adjust_amount}}Rs</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Balance</strong></td>
                                    <td class="emptyrow text-right">{{ $bill->remaining_amount - $bill->adjust_amount}}Rs</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>
@endsection        