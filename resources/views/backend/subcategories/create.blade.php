@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategory Create Form</h1>

	</div>
</div>

<form class="col-md-8" action="{{ route('subcategories.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
	

	<div class="form-group row">
		@error('name')
            <div class="alert alert-danger">{{ $message}}</div>
		@enderror
		<label for="name" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name">
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
		<input type="submit" name="btnsubmit" value="Create" class="btn btn-info">
	</div>
</form>
@endsection