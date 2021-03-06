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
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Category</h3>
				</div>
				<form action="{{ link_to_route('categories.update', ['category' => $category->id]) }}" method="POST" role="form">
					<input type="hidden" name="_method" value="PUT">
					@include('admins.categories._form', ['submitText' => 'Update'])
				</form>

			</div>
		</div>
	</div>
@stop