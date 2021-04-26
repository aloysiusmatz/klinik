@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
            <h1>User Settings</h1>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="{{route('usrsettings.create')}}" class="btn btn-default">Create</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-default">
                    <div class="card-header">
                    <h3 class="card-title">User List</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table id="example1" class="table table-head-fixed table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($listdata) > 0)
                                            @foreach($listdata as $temp_listdata)
                                                <tr>
                                                    <td>{{ $temp_listdata->id }}</td>
                                                    <td>{{ $temp_listdata->name }}</td>
                                                    <td>{{ $temp_listdata->email }}</td>
                                                    <td>{{ $temp_listdata->level }}</td>
                                                    <td><a href="/klinik/public/usrsettings/{{ $temp_listdata->id }}/edit" class="btn btn-xs btn-primary">Edit</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

          
                    
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->        
@endsection