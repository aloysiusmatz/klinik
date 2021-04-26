@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create User</h1>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="{{route('usrsettings.index')}}" class="btn btn-default">Go Back</a>
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
                    <h3 class="card-title">User Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form  method="POST" action=" {{ route('usrsettings.store') }} ">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input id="username" name="username" type="text" class="form-control"  placeholder="Enter name" value="{{ old('username') }}">
                            </div>
                            @if ($errors->has('username'))
                            <p class="text-danger">{{ $errors->first('username') }}</p>
                            @endif

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input id="useremail" name="useremail" type="text" class="form-control"  placeholder="Enter email" value="{{ old('useremail') }}">
                            </div>
                            @if ($errors->has('useremail'))
                            <p class="text-danger">{{ $errors->first('useremail') }}</p>
                            @endif

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control"  placeholder="Enter password" required>
                            </div>
                            @if ($errors->has('userpass'))
                            <p class="text-danger">{{ $errors->first('userpass') }}</p>
                            @endif

                            <div class="form-group">
                                <label for="password-confirm">Password</label>
                                <input id="password-confirm" name="password_confirmation" type="password" class="form-control"  placeholder="Re-type password" required>
                            </div>

                            <div class="form-group">
                                <label for="userlevel">Level</label>
                                    <select id="userlevel" name="userlevel" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Admin</option>
                                        <option>Manager</option>
                                    </select>
                            </div>
                            @if ($errors->has('userlevel'))
                            <p class="text-danger">{{ $errors->first('userlevel') }}</p>
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