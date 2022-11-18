@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Edit Customer</h1>
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
<form class="row g-3" action="{{route('customer.update',$customer->id)}}" method="post">
	@csrf
	@method('put')
	<div class="row g-3">
		<div class="col">
			<label for="name" class="col-form-label text-md-end text-gray-900">{{ __('Customer Name') }}</label>
			<input type="text" name="name" class="form-control" value="{{$customer->name}}" id="name" />
		</div>
		<div class="col">
			<label for="mobile" class="col-form-label text-md-end text-gray-900">{{ __('Customer Number') }}</label>
            <input type="text" name="mobile_no" class="form-control" value="{{$customer->mobile_no}}" id="mobile"/>
		</div>
	</div>
	<div class="row g-3">
		<div class="col">
			<label for="address" class="col-form-label text-md-end text-gray-900">{{ __('Customer Address') }}</label>
            <textarea type="text" class="form-control" name="address" placeholder="Enter Address Here" id="address">{{$customer->address}}</textarea>
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