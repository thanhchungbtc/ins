@inject('categories', 'App\Category')

{{ csrf_field() }}
<div class="box-body">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" >
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" value="{{ old('name', isset($project) ? $project->name : '') }}">
				@if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
			</div>

			<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}" >
				<label for="category_id">Category</label>
				<select name="category_id" class="form-control">
					<option value="0">Select category</option>
					@foreach($categories->all() as $category)
						<option	value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
				@if ($errors->has('category_id')) <p class="help-block">{{ $errors->first('category_id') }}</p> @endif
			</div>

			<div class="form-group {{ $errors->has('investor') ? 'has-error' : '' }}" >
				<label for="investor">Investor</label>
				<input class="form-control" type="text" name="investor" value="{{ old('investor', isset($project) ? $project->investor : '') }}">
				@if ($errors->has('investor')) <p class="help-block">{{ $errors->first('investor') }}</p> @endif
			</div>

			<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}" >
				<label for="price">Price</label>
				<input class="form-control" type="text" name="price" value="{{ old('price', isset($project) ? $project->price : '') }}">
				@if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
			</div>

			<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}" >
				<label for="description">Description</label>
				<textarea name="description" class="form-control">{{ old('description', isset($project) ? $project->description : '') }}</textarea>
				@if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}" >
				<label for="photo">Photo</label>
				<input class="form-control" type="file" name="photo" value="{{ old('photo', isset($project) ? $project->photo : '') }}">
				@if ($errors->has('photo')) <p class="help-block">{{ $errors->first('photo') }}</p> @endif
			</div>
		</div>
	</div>
</div>



<div class="box-footer">
	<a class="btn btn-default" href="{{ Request::query('returnUrl') }}">Cancel</a>
	<button class="btn btn-primary pull-right" type="submit">{{ $submitText }}</button>
</div>
@include('admins.shared.errors')
