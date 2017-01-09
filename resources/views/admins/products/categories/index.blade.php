@extends('admins.layout')
@section('content-header')

    <h1>
        Product Categories
        <small>Product Categories</small>
    </h1>

@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Product Categories List</h3>
                </div>
                <div class="box-body">
                    <h3>
                        <a class="btn btn-danger" id="deleteAll">Delete All</a>
                        <a class="btn btn-primary pull-right" href="{{ link_to_route('product-categories.create') }}">New</a>
                    </h3>
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <th width="40" height="40" style="text-align: center;">
                            <input id="checkAll" type="checkbox" checked="false">
                        </th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr id="row{{ $category->id }}">
                                <td id="{{$category->id}}" class="checkItem" width="40" height="40" style="text-align: center;"><input type="checkbox"></tdi>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a href="{{ link_to_route('product-categories.edit', ['product_category' => $category->id]) }}">{{ $category->name }}
                                    </a>
                                </td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    <form class="deleteForm" method="POST"
                                          action="{{ route('product-categories.destroy', ['product_category' => $category->id]) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a class="btn btn-primary"
                                           href="{{ link_to_route('product-categories.edit', ['product_category' => $category->id]) }}">Edit</a>
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
        var selectedItems = [];
        // delete one
        $('.deleteForm').on('submit', function (e) {
            var self = $(this);
            e.preventDefault();
            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
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

        // select items
        $('.checkItem').change(function (e) {
            var isChecked = e.originalEvent.srcElement.checked;
            var index = selectedItems.indexOf($(this).attr('id'));
            if (isChecked && index < 0) {
                selectedItems.push($(this).attr('id'));
            } else {
                if (index > -1) selectedItems.splice(index, 1);
            }
            console.log(selectedItems);
        });

        $('#checkAll').change(function(e) {
            var isChecked = e.originalEvent.srcElement.checked;

                $('.checkItem').each(function(index) {
                    if (isChecked) {
                        selectedItems.push($(this).attr('id'));
                        $(this).attr('checked', true);
                    } else {
                        selectedItems.length = 0;
                    }
                });
            console.log(selectedItems);
        });

        // delete all
        $('#deleteAll').on('click', function (e) {
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
                            selectedItems.forEach((item, index) => {
                                $.ajax({
                                    type: "DELETE",
                                    url: "/admin/categories/" + item,
                                    data: {
                                      _token: "{{ csrf_token() }}"
                                    },
                                    success: function (data) {
                                        $('#row' + data.id).remove();
                                    },
                                    error: function (err) {

                                    }
                                });
                            });

                        }
                    });
        });

    </script>
@stop
