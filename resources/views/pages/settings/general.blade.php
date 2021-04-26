@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>General Settings</h1>
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
                    <h3 class="card-title">Parameters</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('gensettings.update', '1') }}">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="companyname">{{ $companyname->setting_show }}</label>
                                <input type="text" class="form-control" id="companyname" name="companyname" value="{{ $companyname->value }}" >
                            </div> 
                             
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            {{Form::hidden('_method', 'PUT')}}
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->        
@endsection