@inject('categories', 'App\ProductCategory')
<div class="box-body">
    <div class="row">
        <div class="col-md-6">

            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name"
                       value="{{ old('name', isset($product) ? $product->name : '') }}">
                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
            </div>

            <div class="form-group {{ $errors->has('product_category_id') ? 'has-error' : '' }}">
                <label for="product_category_id">Category</label>
                <select name="product_category_id" class="form-control">
                    <option value="0">Select category</option>
                    @foreach($categories->all() as $category)
                        <option value="{{ $category->id }}" {{ isset($product) && $category->id == $product->product_category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('product_category_id')) <p
                        class="help-block">{{ $errors->first('product_category_id') }}</p> @endif
            </div>

            <div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
                <label for="short_description">Short Description</label>
                <textarea name="short_description"
                          class="form-control">{{ old('short_description', isset($product) ? $product->short_description : '') }}</textarea>
                @if ($errors->has('short_description')) <p
                        class="help-block">{{ $errors->first('short_description') }}</p> @endif
            </div>

            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">Price</label>
                <input class="form-control" type="number" name="price"
                       value="{{ old('price', isset($product) ? $product->price : '') }}">
                @if ($errors->has('price')) <p class="help-block">{{ $errors->first('price') }}</p> @endif
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Description</label>
                <textarea name="description"
                          class="form-control">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
                @if ($errors->has('description')) <p
                        class="help-block">{{ $errors->first('description') }}</p> @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="photo">Photo</label>
                <div class="row" id="photoList">
                    @if(isset($product))
                        @foreach($product->photos as $photo)
                            <div class="col-md-3"><img src="/{{ $photo->path }}" alt="" class="img-responsive"></div>
                        @endforeach
                    @endif
                </div>

                <div class="upload-photo">
                    <input type="file" name="photo[]" multiple class="active" accept=".jpg, .jpeg, .png">
                </div>

                <div class="col-md-3 template"><img src="" alt="" class="img-responsive"></div>
            </div>

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
        $('#datepicker').datepicker({
            autoclose: true,
        });

        $('.upload-photo').on('change', 'input[type=file].active', function(e) {

            let self = $(this);

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
