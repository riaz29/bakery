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
            <form class="user p-5" action="{{route('order.update',$order->id)}}" method="post">
                @csrf
                @method('put')
                    <div class="form-group row">
                        <div class="col">
                            <input class="date form-control" type="text" id="datepicker" name="booking_date" autocomplete="off" autofill="off" value="{{$order->booking_date}}"/>
                        </div>
                        <div class="col">
                            <input class="date form-control" type="text" id="datepicker2" name="delivery_date" autocomplete="off" autofill="off" value="{{$order->delivery_date}}"/>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <div class="col">
                            <input class="form-control" type="text" name="delivery_address" autocomplete="off" autofill="off" value="{{$order->delivery_address}}"/>
                        </div>            
                    </div> 
                    <div class="form-group row">
                        <div class="col">
                            <input class="form-control" type="text" name="service_keeper" value="{{$order->service_keeper}}"/> 
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="order_note" autocomplete="off" autofill="off" value="{{$order->order_note}}">
                        </div>            
                    </div>
                    <div class="form-group row ">
                        <button class="btn btn-success btn-user btn-block " type="submit">Update</button>
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