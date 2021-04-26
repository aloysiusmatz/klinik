@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create Medicines</h1>
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
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form  method="POST" action=" {{ route('medicines.store') }} ">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="medicinename">Medicines Name</label>
                                <input id="medicinename" name="medicinename" type="text" class="form-control"  placeholder="Enter medicine" value="{{ old('medicinename') }}">
                            </div>
                            @if ($errors->has('medicinename'))
                            <p class="text-danger">{{ $errors->first('medicinename') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="medicinedesc">Description</label>
                                <textarea id="medicinedesc" name="medicinedesc" class="form-control" rows="5" placeholder="Enter medicine description ..." value="{{ old('medicinedesc') }}"></textarea>
                            </div>
                            @if ($errors->has('medicinedesc'))
                            <p class="text-danger">{{ $errors->first('medicinedesc') }}</p>
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