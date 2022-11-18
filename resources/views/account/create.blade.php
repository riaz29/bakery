@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Make Entry</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="justify-content-center">
            <form class="user p-5" action="{{route('account.store')}}" method="post">
                @csrf
                    <div class="form-group">
                        <input class="date form-control" placeholder="Select Date" type="text" id="datepicker" name="received_date" autocomplete="off" autofill="off" required>
                    </div>   
                    <div class="form-group">
                        <select name="customer_id" class="form-select" aria-label="Customer Name" required>
                            <option selected>Select Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach  
                        </select>
                    </div>  
                    <div class="form-group">
                        <input class="form-control" type="number" name="amount" placeholder="Amount" autocomplete="off" autofill="off" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="note_text" placeholder="Note" autocomplete="off" autofill="off" required>
                    </div> 
                    <div class="form-group ">
                        <button class="btn btn-primary btn-user btn-block" type="submit">Save</button>
                    </div>
                
            </form>
    </div>
</div>  
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
     });
</script> 
@endsection