@extends('admins.layout')

@section('content-header')

	<h1>
		Projects
		<small>Projects Management</small>
	</h1>
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">New Project</h3>
				</div>
				<form action="{{ route('projects.store') }}" method="POST" role="form">
					@include('admins.projects._form', ['submitText' => 'Create'])
				</form>

			</div>
		</div>
	</div>
@stop