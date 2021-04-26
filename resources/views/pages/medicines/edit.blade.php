@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Medicines</h1>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="{{route('medicines.index')}}" class="btn btn-default">Go Back</a>
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
                        <h3 class="card-title">Medicines Details</h3>
                        <form method="POST" action="{{route('medicines.index')}}/{{$edititem->id}}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-xs btn-danger float-right">Delete</button>
                            <input name="_method" type="hidden" value="DELETE">
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        {!! Form::open(['action' => ['MedicinesController@update', $edititem->id], 'method' => 'POST']) !!} 
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="medicineid">ID</label>
                                        <input type="text" class="form-control" id="medicineid" name="medicineid" value="{{$edititem->id}}" disabled>
                                    </div>                   
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="medicinename">Medicines Name</label>
                                        <input name="medicinename" id="medicinename" type="text" class="form-control" value="{{$edititem->medicinename}}">
                                    </div>   
                                    @if ($errors->has('medicinename'))
                                    <p class="text-danger">{{ $errors->first('medicinename') }}</p>
                                    @endif                 
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="medicinedesc">Description</label>
                                <textarea name="meddesc" id="meddesc" class="form-control" rows="5" >{{$edititem->meddesc}}</textarea>
                            </div>
                            @if ($errors->has('meddesc'))
                            <p class="text-danger">{{ $errors->first('meddesc') }}</p>
                            @endif       

                            <div class="form-group">
                                {{Form::hidden('_method', 'PUT')}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>    
                        {!! Form::close() !!}

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