@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Allergies</h1>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="{{route('allergies.index')}}" class="btn btn-default">Go Back</a>
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
                    <h3 class="card-title">Allergy Details</h3>
                        <form method="POST" action="{{route('allergies.index')}}/{{$edititem->id}}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-xs btn-danger float-right">Delete</button>
                            <input name="_method" type="hidden" value="DELETE">
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        {!! Form::open(['action' => ['AllergiesController@update', $edititem->id], 'method' => 'POST']) !!} 
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="allerid">ID</label>
                                        <input type="text" class="form-control" id="allerid" name="allerid" value="{{$edititem->id}}" disabled>
                                    </div>                   
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="allername">Allergy</label>
                                        <input name="allername" id="allername" type="text" class="form-control" value="{{$edititem->allergyname}}">
                                    </div>   
                                    @if ($errors->has('allername'))
                                    <p class="text-danger">{{ $errors->first('allername') }}</p>
                                    @endif                 
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="allerdesc">Description</label>
                                <textarea name="allerdesc" id="allerdesc" class="form-control" rows="5" >{{$edititem->allergydesc}}</textarea>
                            </div>
                            @if ($errors->has('allerdesc'))
                            <p class="text-danger">{{ $errors->first('allerdesc') }}</p>
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