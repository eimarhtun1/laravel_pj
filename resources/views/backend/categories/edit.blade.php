@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Category Edit Form</h1>

	</div>
</div>

<form class="col-md-8" action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-group row">
		@error('name')
		<div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="name" class="col-sm-2 col-form-label">Category Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
		</div>
	</div>

	<div class="form-group row">
		@error('photo')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="photo" class="col-sm-2 col-form-label">Photo</label>
		<div class="col-sm-10">
			<input type="file" name="photo" value="">
			<img src="{{asset($category->photo)}}" width="100" height="100">
			<input type="hidden" name="oldphoto" value="{{$category->photo}}">
		</div>
	</div>
	<div class="form-group row">
		<input type="submit" name="btnsubmit" value="Update" class="btn btn-info">
	</div>
</form>

@endsection