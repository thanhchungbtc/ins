@extends('admins.layout')
@section('content-header')

<h1>
	Category
	<small>Project category</small>
</h1>

@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Category Table</h3>
				<a class="btn btn-primary pull-right" href="{{ link_to_route('categories.create') }}">New</a>
			</div>
			<div class="box-body">
				<table class="table table-bordered" id="dataTable">
					<thead>
						<th>Id</th>
						<th>Name</th>
						<th>Created At</th>
						<th>Updated At</th>
						<th>Actions</th>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr id="row{{ $category->id }}">
							<td>{{ $category->id }}</td>
							<td>
								<a href="{{ link_to_route('categories.edit', ['category' => $category->id]) }}">{{ $category->name }}
								</a>
							</td>
							<td>{{ $category->created_at }}</td>
							<td>{{ $category->updated_at }}</td>
							<td>
								<form class="deleteForm" method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<a class="btn btn-primary" href="{{ link_to_route('categories.edit', ['category' => $category->id]) }}">Edit</a>
									<button class="btn btn-danger" type="submit" id="deleteButton">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop

@section('scripts.footer')
<script>
	$('.deleteForm').on('submit', function(e) {
		var self = $(this);
		e.preventDefault();
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this imaginary file!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel plx!",
			closeOnConfirm: false
		},
		function(isConfirm){
			if (isConfirm) {
				var method = $('input[name=_method]').val() || self.attr('method');
				// fetch(self.attr('action'), {
				// 	method: method,
				// 	headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				// 	body: self.serialize()
				// }).then(function(response) {
				// 	$('#row' + response.id).remove();
				// 	swal({
				// 		title: "Done!",
				// 		text: "Delete successfully",
				// 		timer: 700,
				// 		type: 'success',
				// 		showConfirmButton: false
				// 	});
				// }).catch(function(err) {

				// });
				$.ajax({
					type: method,
					url: self.attr('action'),
					data: self.serialize(),
					success: function(data) {
						$('#row' + data.id).remove();
						swal({
							title: "Done!",
							text: "Delete successfully",
							timer: 700,
							type: 'success',
							showConfirmButton: false
						});
					},
					error: function(err) {

					}
				});
			}
		});

	});


</script>
@stop
