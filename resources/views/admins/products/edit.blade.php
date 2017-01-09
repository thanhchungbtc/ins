@extends('admins.layout')

@section('content-header')

    <h1>
        Products
        <small>Products Management</small>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Product</h3>
                </div>
                <form action="{{ route('products.update', ['id' => $product->id]) }}" enctype="multipart/form-data" method="POST" role="form">
                    <input type="hidden" name="_method" value="PUT">
                    @include('admins.products._form', ['submitText' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@stop