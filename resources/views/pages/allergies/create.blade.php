@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create Allergy</h1>
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
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form  method="POST" action=" {{ route('allergies.store') }} ">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="allername">Allergy</label>
                                <input id="allername" name="allername" type="text" class="form-control"  placeholder="Enter allergy" value="{{ old('allername') }}">
                            </div>
                            @if ($errors->has('allername'))
                            <p class="text-danger">{{ $errors->first('allername') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="allerdesc">Description</label>
                                <textarea id="allerdesc" name="allerdesc" class="form-control" rows="5" placeholder="Enter allergy description ..." value="{{ old('allerdesc') }}"></textarea>
                            </div>
                            @if ($errors->has('allerdesc'))
                            <p class="text-danger">{{ $errors->first('allerdesc') }}</p>
                            @endif                        
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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