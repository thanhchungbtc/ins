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
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Products List</h3>
                </div>
                <div class="box-body">
                    <h3>
                        <a class="btn btn-danger" href="{{ link_to_route('products.destroy') }}">Delete All</a>
                        <a class="btn btn-primary pull-right" href="{{ link_to_route($breadcrums[0].'.create') }}">New</a>
                    </h3>
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($products as $p)
                            <tr id="row{{ $p->id }}">
                                <td>{{ $p->id }}</td>
                                <td>
                                    <a href="{{ link_to_route($breadcrums[0].'.edit', ['product' => $p->id]) }}">{{ $p->name }}
                                    </a>
                                </td>
                                <td>{{ $p->category->name }}</td>
                                <td>${{ number_format($p->price) }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->updated_at }}</td>
                                <td>
                                    <form class="deleteForm" method="POST"
                                          action="{{ route($breadcrums[0].'.destroy', ['product' => $p->id]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a class="btn btn-primary"
                                           href="{{ link_to_route($breadcrums[0].'.edit', ['product' => $p->id]) }}">Edit</a>
                                        <button class="btn btn-danger" type="submit" id="deleteButton">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts.footer')
    <script>
        $('.deleteForm').on('submit', function (e) {
            var self = $(this);
            e.preventDefault();
            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel plx!",
                        closeOnConfirm: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            var method = $('input[name=_method]').val() || self.attr('method');

                            $.ajax({
                                type: method,
                                url: self.attr('action'),
                                data: self.serialize(),
                                success: function (data) {
                                    $('#row' + data.id).remove();
                                    swal({
                                        title: "Done!",
                                        text: "Delete successfully",
                                        timer: 700,
                                        type: 'success',
                                        showConfirmButton: false
                                    });
                                },
                                error: function (err) {

                                }
                            });
                        }
                    });

        });


    </script>
@stop
