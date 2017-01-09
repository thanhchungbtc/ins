@extends('admins.layout')

@section('content-header')

	<h1>
		Product Category
		<small>Product Category</small>
	</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">New Product Category</h3>
				</div>
				<form action="{{ route('product-categories.store') }}" method="POST" role="form">
					@include('admins.products.categories._form', ['submitText' => 'Create'])
				</form>

			</div>
		</div>
	</div>
@stop