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
                    <h3 class="box-title">Edit Project</h3>
                </div>
                <form action="{{ route('projects.update', ['id' => $project->id]) }}" enctype="multipart/form-data" method="POST" role="form">
                    <input type="hidden" name="_method" value="PUT">
                    @include('admins.projects._form', ['submitText' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@stop