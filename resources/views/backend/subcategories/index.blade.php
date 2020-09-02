@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item List</h1>
		<a href="{{ route('subcategories.create')}}" class="btn btn-info">Add New</a>

	</div>
</div>
<div class="container">
	<div class="row">
		<div class="co-md-12 h3 mb-0 text-gray-dark">

			<table class="table table-bordered">
				<thead class="bg-dark text-white">
					<th>No</th>
					
					<th>Name</th>
					
					<th>Actions</th>
				</thead>
				<tbody>
					@php $i=1;@endphp
					@foreach($subcategories as $subcategory)
					<tr>
						<td>{{$i++}}</td>
						
						<td>{{$subcategory ->name}}</td>

						<td>
							<a href="#" class="btn btn-info">Detail</a>
							<a href="#" class="btn btn-danger">Delete</a>
							<a href="{{ route('subcategories.edit',$subcategory->id)}}" class="btn btn-success">Edit</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection