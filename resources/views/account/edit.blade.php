@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Edit Account</h1>
</div>

<hr/>
@if($errors->any())
	<div class="alert alert-danger">
		<ul>
		   @foreach($errors->all() as $error)
			<li>{{$error}}</li>
		   @endforeach
		</ul>
	</div>
@endif
<div class="container">
<form class="row g-3" action="{{route('account.update',$account->id)}}" method="post">
	@csrf
	@method('put')
	<div class="row g-3">
		<div class="col">
			<label for="datepicker" class="col-form-label text-md-end text-gray-900">{{ __('Received Date') }}</label>
				<input class="date form-control" type="text" id="datepicker" name="received_date" autocomplete="off" autofill="off" value="{{$account->received_date}}" >
		</div>
		<div class="col">
			<label for="amount" class="col-form-label text-md-end text-gray-900">{{ __('Received') }}</label>
            <input type="number" name="amount" class="form-control" value="{{$account->amount}}" id="amount"/>
		</div>
	</div>
	<div class="row g-3">
		<div class="col">
			<label for="note" class="col-form-label text-md-end text-gray-900">{{ __('Customer Address') }}</label>
            <input class="form-control" type="text" name="note_text" placeholder="Note" value="{{ $account->note_text }}" id="note">
		</div>
	</div>
	<div class="row g-3">
		<div class="col">
			<button class="btn btn-success btn-user btn-block" type="submit">Update</button>
		</div>
	</div>
</form>
</div>
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
     });
</script> 
@endsection