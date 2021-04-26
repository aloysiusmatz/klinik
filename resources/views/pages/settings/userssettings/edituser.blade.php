@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit User</h1>
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
                        <form method="POST" action="{{route('usrsettings.destroy', $edititem->id)}}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-xs btn-danger float-right">Delete</button>
                            <input name="_method" type="hidden" value="DELETE">
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form  method="POST" action=" {{ route('usrsettings.update', $edititem->id) }} ">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="userid">ID</label>
                                <input type="text" class="form-control" id="userid" name="userid" value="{{$edititem->id}}" disabled>
                            </div> 

                            <div class="form-group">
                                <label for="username">Name</label>
                                <input id="username" name="username" type="text" class="form-control"  placeholder="Enter name" value="{{$edititem->name}}">
                            </div>
                            @if ($errors->has('username'))
                            <p class="text-danger">{{ $errors->first('username') }}</p>
                            @endif

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input id="useremail" name="useremail" type="text" class="form-control"  placeholder="Enter email" value="{{$edititem->email}}">
                            </div>
                            @if ($errors->has('useremail'))
                            <p class="text-danger">{{ $errors->first('useremail') }}</p>
                            @endif

                            <div class="form-group">
                                <label for="userlevel">Level</label>
                                    <select id="userlevel" name="userlevel" class="form-control select2" style="width: 100%;">
                                        @php( $level = ['Admin', 'Manager'] )
                                        @php( $index = 0 )
                                        @foreach($level as $temp_level)
                                            @php( $index++ )
                                            @if($edititem->level == $index)
                                            <option selected="selected">
                                            @else
                                            <option>
                                            @endif
                                            {{ $temp_level }}
                                            </option>
                                        @endforeach
                                    </select>
                            </div>
                            @if ($errors->has('userlevel'))
                            <p class="text-danger">{{ $errors->first('userlevel') }}</p>
                            @endif                            

                            <div class="form-group">
                            {{ Form::hidden('_method', 'PUT') }}
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>    
                        </div>
                        <!-- /.card-body -->

                                                              
                    </form>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->        
@endsection