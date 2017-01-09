{{ csrf_field() }}
<div class="box-body">
	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" >
		<label for="name">Product Category Name</label>
		<input class="form-control" type="text" name="name" value="{{ old('name', isset($product_category) ? $product_category->name : '') }}" autofocus="">
		@if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    </div>
</div>
</div>
<div class="box-footer">
	<a class="btn btn-default" href="{{ Request::query('returnUrl') }}">Cancel</a>
	<button class="btn btn-primary pull-right" type="submit">{{ $submitText }}</button>
</div>
@include('admins.shared.errors')
