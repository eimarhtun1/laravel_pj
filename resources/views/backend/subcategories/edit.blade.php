@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory Edit Form</h1>

	</div>
</div>

<form class="col-md-8" action="{{ route('subcategories.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	

	<div class="form-group row">
		@error('name')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="name" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" value="{{$subcategory->name}}">
		</div>
	</div>

	

	<div class="form-group row">
		<select class="form-control form-control-md" id="inputBrand" name="category">
			<optgroup label="Choose category">
				@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
			</optgroup>
			
		</select>

	</div>
	<div class="form-group row">
		<input type="submit" name="btnsubmit" value="Update" class="btn btn-info">
	</div>
</form>
@endsection