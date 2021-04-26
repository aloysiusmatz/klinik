@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Master Medicines</h1>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="{{route('medicines.create')}}" class="btn btn-default">Create</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['action' => ['MedicinesController@search'], 'method' => 'POST']) !!} 
                    <div class="card card-default collapsed-card">
                        <div class="card-header">                
                            <h3 class="card-title">Search</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" style="display:none">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="filter_medname">Medicine Name</label>
                                    <input name="filter_medname" id="filter_medname" type="text" class="form-control" value="{{ Session::get('filter_medname') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="filter_meddesc">Description</label>
                                    <input name="filter_meddesc" id="filter_meddesc" type="text" class="form-control" value="{{ Session::get('filter_meddesc') }}">
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-primary">Apply Search</button>        
                                </div>
                            </div>
                        </div>
                    </div>
                    {{Form::hidden('_method', 'GET')}}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">List</h3>
                        <div class="float-right">Data show  : {{ $countdata }}</div>
                    </div>
                        <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body table-responsive p-0" style="height: 360px;">
                                <table id="example1" class="table table-head-fixed table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Medicine Name</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($listdata) > 0)
                                            @foreach($listdata as $temp_listdata)
                                                <tr>
                                                    <td>{{ $temp_listdata->id }}</td>
                                                    <td>{{ $temp_listdata->medicinename }}</td>
                                                    <td>{{ $temp_listdata->meddesc }}</td>
                                                    <td><a href="/medicines/{{ $temp_listdata->id }}/edit" class="btn btn-xs btn-primary">Edit</a></td>
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
            </div>
        </div>
    </div>
</section>
<!-- /.content -->        
@endsection