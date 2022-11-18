@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Register Customer</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="justify-content-center">
            <form class="user p-5" action="{{route('customer.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Customer Name" autocomplete="off" autofill="off" required/>
                    </div>   
                    <div class="form-group">
                        <input type="text" name="mobile_no" class="form-control" placeholder="Phone Number" autocomplete="off" autofill="off" required/>
                    </div>  
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="address" placeholder="Enter Address Here" autocomplete="off" autofill="off" required></textarea>
                    </div> 
                    <div class="form-group ">
                        <button class="btn btn-primary btn-user btn-block" type="submit">Save</button>
                    </div>
                
            </form>
    </div>
</div>   
@endsection