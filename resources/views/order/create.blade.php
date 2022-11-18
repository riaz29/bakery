@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Generate Order</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="justify-content-center">
            <form class="user p-5" action="{{route('order.store')}}" method="post">
                @csrf
                     <div class="form-group row">
                        <div class="col">
                            <input class="date form-control" placeholder="Select Booking Date" type="text" id="datepicker" name="booking_date" autocomplete="off" autofill="off">
                        </div>
                        <div class="col">
                            <input class="date form-control" placeholder="Select Delivery Date" type="text" id="datepicker2" name="delivery_date" autocomplete="off" autofill="off">
                        </div>
                    </div>  
                    <div class="form-group row">
                        <div class="col">
                            <input class="form-control" type="text" name="delivery_address" placeholder="Delivery Address" autocomplete="off" autofill="off"/>
                        </div>            
                    </div> 
                    <div class="form-group row">
                        <div class="col">
                            <input class="form-control" type="text" name="service_keeper" placeholder="Service keeper"/> 
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="order_note" placeholder="Order Notes" autocomplete="off" autofill="off">
                        </div>            
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <select name="customer_id" class="form-select" aria-label="Customer Name">
                                <option selected>Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach  
                            </select>
                        </div>            
                    </div> 
                    <div class="form-group row ">
                        <button class="btn btn-primary btn-user btn-block " type="submit">Save</button>
                    </div>
            </form>
    </div>
</div>  
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
     });
     $('#datepicker2').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
     });
</script>
@endsection