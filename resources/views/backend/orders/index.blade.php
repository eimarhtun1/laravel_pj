@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order List</h1>
		{{-- <a href="{{ route('items.create')}}" class="btn btn-info">Add New</a> --}}

	</div>
</div>


<div class="container">
	<div class="row">
		<div class="co-md-12 h3 mb-0 text-gray-dark">

			<table class="table table-bordered">
				<thead class="bg-dark text-white">
					<th>NO</th>
					<th>Voucher No</th>
					<th>User</th>
					<th>Total</th>
					<th>Actions</th>
				</thead>
				<tbody>
					@php $i=1;@endphp
					@foreach($orders as $order)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$order ->voucherno}}</td>
						<td>{{$order ->user->name}}</td>
						<td>{{$order ->total}}MMK</td>
						<td>
							<a href="{{ route('orders.show',$order->id)}}" class="btn btn-info">Detail</a>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection