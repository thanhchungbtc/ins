{{ csrf_field() }}
<div class="box-body">
	<div class="form-group">
		<label for="name">Name</label>
		<input class="form-control" type="text" name="name" value="{{ old('name', isset($category) ? $category->name : '') }}" autofocus="">
	</div>
</div>
<div class="box-footer">
	<a class="btn btn-default" href="{{ Request::query('returnUrl') }}">Cancel</a>
	<button class="btn btn-primary pull-right" type="submit">{{ $submitText }}</button>
</div>
@include('admins.shared.errors')
