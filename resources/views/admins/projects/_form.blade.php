@inject('categories', 'App\Category')
<div class="box-body">
    <div class="row">
        <div class="col-md-6">

            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name"
                       value="{{ old('name', isset($project) ? $project->name : '') }}">
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>

            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    <option value="0">Select category</option>
                    @foreach($categories->all() as $category)
                        <option value="{{ $category->id }}" {{ isset($project) && $category->id == $project->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id')) <p
                        class="help-block">{{ $errors->first('category_id') }}</p> @endif
            </div>

            <div class="form-group {{ $errors->has('investor') ? 'has-error' : '' }}">
                <label for="investor">Investor</label>
                <input class="form-control" type="text" name="investor"
                       value="{{ old('investor', isset($project) ? $project->investor : '') }}">
                @if ($errors->has('investor')) <p class="help-block">{{ $errors->first('investor') }}</p> @endif
            </div>

            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">Price</label>
                <input class="form-control" type="text" name="price"
                       value="{{ old('price', isset($project) ? $project->price : '') }}">
                @if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Description</label>
                <textarea name="description"
                          class="form-control">{{ old('description', isset($project) ? $project->description : '') }}</textarea>
                @if ($errors->has('description')) <p
                        class="help-block">{{ $errors->first('description') }}</p> @endif
            </div>
        </div>
        <div class="col-md-6">
            <label for="photo">Photo</label>
            <div class="row" id="photoList">
                @if(isset($project))
                    @foreach($project->photos as $photo)
                        <div class="col-md-3"><img src="/{{ $photo->path }}" alt="" class="img-responsive"></div>
                    @endforeach
                @endif
            </div>

            <div class="upload-photo">
                <input type="file" name="photo[]" multiple class="active">
            </div>

            <div class="col-md-3 template"><img src="" alt="" class="img-responsive"></div>
        </div>
    </div>

</div>

<div class="box-footer">
    <a class="btn btn-default" href="{{ Request::query('returnUrl') }}">Cancel</a>
    <input type="submit" class="btn btn-primary pull-right" value="{{ $submitText }}">
</div>
@include('admins.shared.errors')
@section('scripts.footer')
    <script>
        $('.upload-photo').on('change', 'input[type=file].active', function(e) {

            let self = $(this);
//            self.after(self.clone());

            for (let i = 0; i < this.files.length; i++) {
                let file = this.files[i];
                let reader = new FileReader();
                let newImg = $('.template').clone();
                newImg.removeClass('template');
                reader.onloadend = function () {
                    newImg.find('img').attr('src', reader.result);
                }
                reader.readAsDataURL(file);
                $('#photoList').append(newImg);
            }
        });
    </script>
@stop
