@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item Edit Form</h1>

	</div>
</div>

<form class="col-md-8" action="{{ route('items.update',$item->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group row">
		@error('codeno')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="codeno" class="col-sm-2 col-form-label">Code No</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="codeno" name="codeno" value="{{$item->codeno}}" readonly="readonly">
		</div>
	</div>

	<div class="form-group row">
		@error('name')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="name" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
		</div>
	</div>

	<div class="form-group row">
		@error('photo')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="photo" class="col-sm-2 col-form-label">Photo</label>
		<div class="col-sm-10">
		<input type="file" name="photo" value="">
		<img src="{{asset($item->photo)}}" width="100" height="100">
		<input type="hidden" name="oldphoto" value="{{$item->photo}}">
		</div>
	</div>

	<div class="form-group row">
		@error('price')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="price" class="col-sm-2 col-form-label">Price</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="price" name="price" value="{{$item->price}}">
		</div>
	</div>

	<div class="form-group row">
		@error('discount')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="discount" class="col-sm-2 col-form-label">Discount</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="discount"  name="discount" value="{{$item->discount}}">
		</div>
	</div>

	<div class="form-group row">
		@error('description')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="description" class="col-sm-2 col-form-label">Description</label>
		<div class="col-sm-10">
			<textarea name="description" value="">{{$item->description}}</textarea>
		</div>
	</div>

	<div class="form-group row">
		<select class="form-control form-control-md" id="inputBrand" name="brand">
			<optgroup label="Choose Brand">
				@foreach($brands as $brand)
				<option value="{{$brand->id}}">{{$brand->name}}</option>
				@endforeach
			</optgroup>
			
		</select>
	</div>

	<div class="form-group row">
		<select class="form-control form-control-md" id="inputBrand" name="subcategory">
			<optgroup label="Choose Subcategory">
				@foreach($subcategories as $subcategory)
				<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
				@endforeach
			</optgroup>
			
		</select>

	</div>
	<div class="form-group row">
		<input type="submit" name="btnsubmit" value="Update" class="btn btn-info">
	</div>
</form>
@endsection