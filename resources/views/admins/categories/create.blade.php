@extends('admins.layout')

@section('content-header')

	<h1>
		Category
		<small>Project category</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="">Catgory</li>
		<li class="active">New</li>
	</ol>

@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">New Category</h3>
				</div>
				<form action="{{ route('categories.store') }}" method="POST" role="form">
					@include('admins.categories._form', ['submitText' => 'Create'])
				</form>

			</div>
		</div>
	</div>
@stop