@extends('admins.layout')
@section('content-header')

	<h1>
		Category
		<small>Project category</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Catgory</li>
	</ol>

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
					<table class="table table-bordered">
						<thead>
							<th>Id</th>
							<th>Name</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th>Actions</th>
						</thead>
						<tbody>
							@foreach($categories as $category)
								<tr>
									<td>{{ $category->id }}</td>
									<td>
										<a href="{{ link_to_route('categories.edit', ['category' => $category->id]) }}">{{ $category->name }}
										</a>
									</td>
									<td>{{ $category->created_at }}</td>
									<td>{{ $category->updated_at }}</td>
									<td>
										<form>
											<a class="btn btn-primary" href="{{ link_to_route('categories.edit', ['category' => $category->id]) }}">Edit</a>
											<button class="btn btn-danger" type="submit">Delete</button>
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