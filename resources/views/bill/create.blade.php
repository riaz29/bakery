@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Generate Bill</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="justify-content-center">
            <form class="user p-5" action="{{route('bill.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        
                            <select name="order_id" class="form-select" aria-label="Order ID">
                                <option selected>Select Order</option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->id}}</option>
                                @endforeach  
                            </select>
                            
                    </div>   
                    <div class="form-group">
                        <input class="form-control" type="number" name="service_amount" placeholder="Service Charges "/> 
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="fare_amount" placeholder="Fare Charges"/> 
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="advance_amount" placeholder="Advance Payment "/> 
                    </div>
                    <br>
                    <div class="form-group ">
                        <button class="btn btn-primary btn-user btn-block" type="submit">Generate</button>
                    </div>
                
            </form>
    </div>
</div>   

@endsection