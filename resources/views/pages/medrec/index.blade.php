@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Medical Records</h1>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="{{route('medrec.create')}}" class="btn btn-default">Create</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['action' => ['MedrecController@search'], 'method' => 'POST']) !!} 
                    <div class="card card-default collapsed-card">
                        <div class="card-header">                
                            <h3 class="card-title">Search</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                        <div id="searchbody" class="card-body" style="display:none">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="filter_medrecname">Name</label>
                                    <input name="filter_medrecname" id="filter_medrecname" type="text" class="form-control" value="{{ Session::get('filter_medrecname') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="filter_medrecaddress">Address</label>
                                    <input name="filter_medrecaddress" id="filter_medrecaddress" type="text" class="form-control" value="{{ Session::get('filter_medrecaddress') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="filter_medrecbirthdate">Birthdate</label>
                                    <input id="filter_medrecbirthdate" name="filter_medrecbirthdate" type="date" class="form-control" value="{{ Session::get('filter_medrecbirthdate') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="filter_medrecphone1">Phone 1</label>
                                    <input name="filter_medrecphone1" id="filter_medrecphone1" type="text" class="form-control" value="{{ Session::get('filter_medrecphone1') }}">
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
                                            <th>MedRec ID</th>
                                            <th>Name</th>
                                            <th>Birthdate</th>
                                            <th>Sex</th>
                                            <th>Address</th>  
                                            <th>City</th> 
                                            <th>Phone 1</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($listdata) > 0)
                                            @foreach($listdata as $temp_listdata)
                                                <tr>
                                                    <td>{{ $temp_listdata->id }}</td>
                                                    <td>{{ $temp_listdata->medrec_name }}</td>
                                                    <td>{{ date_format(date_create($temp_listdata->birthdate), 'd-M-Y') }}</td>
                                                    <td>{{ $temp_listdata->sex }}</td>
                                                    <td>{{ $temp_listdata->address }}</td>
                                                    <td>{{ $temp_listdata->city }}</td>
                                                    <td>{{ $temp_listdata->phone1 }}</td>
                                                    <td><a href="/klinik/public/medrec/{{ $temp_listdata->id }}/edit" class="btn btn-xs btn-primary">Edit</a>
                                                        <a href="/klinik/public/newtransaction/{{ $temp_listdata->id }}" class="btn btn-xs btn-warning">Create Checkup</a></td>
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