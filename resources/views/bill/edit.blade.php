@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Edit Bill</h1>
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
<form class="row g-3" action="{{route('bill.update',$bill->id)}}" method="post">
	@csrf
	@method('put')
	<div class="row g-3">
		<div class="col">
			<label for="service" class="col-form-label text-md-end text-gray-900">{{ __('Service Amount') }}</label>
			<input type="number" name="service_amount" class="form-control" value="{{$bill->service_amount}}" id="service"/>
		</div>
		<div class="col">
			<label for="fare" class="col-form-label text-md-end text-gray-900">{{ __('Fare Amount') }}</label>
			<input type="number" name="fare_amount" class="form-control"value="{{$bill->fare_amount}}" id="fare"/>
		</div>
	</div>
	<div class="row g-3">
		<div class="col">
			<label for="received" class="col-form-label text-md-end text-gray-900">{{ __('Received Amount') }}</label>
			<input type="number" name="advance_amount" class="form-control" value="{{$bill->advance_amount}}" id="received"/>
		</div>
		<div class="col">
			<label for="adjust" class="col-form-label text-md-end text-gray-900">{{ __('Adjust Amount') }}</label>
			<input type="number" name="adjust_amount" class="form-control"  value="{{$bill->adjust_amount}}" id="adjust"/>
		</div>
	</div>
	<div class="row g-3">
		<div class="col">
			<button class="btn btn-success btn-user btn-block" type="submit">Update</button>
		</div>
	</div>
</form>
</div>
@endsection