@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Edit Order Menu</h1>
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
<form class="row g-3" action="{{route('orderline.update',$orderline->id)}}" method="post">
	@csrf
	@method('put')
	<div class="row g-3">
		<div class="col">
			<strong><label for="menu" class="col-form-label text-md-end text-gray-900">{{ __('Menu Name') }}</label></strong>
			<input type="text" name="menu_name" class="form-control"  value="{{$orderline->menu_name}}" id="menu"/>
		</div>
		<div class="col">
			<strong><label for="type" class="col-form-label text-md-end text-gray-900">{{ __('Manu Type') }}</label></strong>
			<input type="text" name="menu_type" class="form-control"  value="{{$orderline->menu_type}}" id="type"/>
		</div>
	</div>
	<div class="row g-3">
		<div class="col">
			<strong><label for="price" class="col-form-label text-md-end text-gray-900">{{ __('Price ') }}</label></strong>
			<input type="number" name="price" class="form-control"  value="{{$orderline->price}}" id="price"/>
		</div>
		<div class="col">
			<strong><label for="unit" class="col-form-label text-md-end text-gray-900">{{ __('Unit') }}</label></strong>
			<input type="number" name="unit" class="form-control" value="{{$orderline->unit}}" id="unit"/>
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