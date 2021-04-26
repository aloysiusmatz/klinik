@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create Medical Record</h1>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="{{route('medrec.index')}}" class="btn btn-default">Go Back</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="POST" action="{{ route('medrec.store') }}">
            {{ csrf_field() }}
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Medical Record Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>

                
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="medrecname" name="medrecname" placeholder="Enter full name">
                    </div>
                    @if ($errors->has('medrecname'))
                        <p class="text-danger">{{ $errors->first('medrecname') }}</p>
                    @endif 
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="medrecbirthdate">Birth Date</label>
                                <input type="date" id="medrecbirthdate" name="medrecbirthdate" class="form-control">
                            </div>
                            @if ($errors->has('medrecbirthdate'))
                                <p class="text-danger">{{ $errors->first('medrecbirthdate') }}</p>
                            @endif 
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select name="medrecsex" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Pria</option>
                                    <option>Wanita</option>
                                </select>                                    
                            </div>
                        </div>                            
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="blood">Blood Type</label>
                                <select name="medrecblood" class="form-control select2" style="width: 100%;">
                                    <option selected="selected">A</option>
                                    <option>B</option>
                                    <option>O</option>
                                    <option>AB</option>
                                    <option>-</option>
                                </select>     
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <input name="medrecreligion" type="text" class="form-control" placeholder="Enter religion">
                            </div>
                        </div>                            
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input name="medrecaddress" type="text" class="form-control" placeholder="Enter address">
                    </div>
                    @if ($errors->has('medrecaddress'))
                        <p class="text-danger">{{ $errors->first('medrecaddress') }}</p>
                    @endif 
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input name="medreccity" type="text" class="form-control"  placeholder="Enter city">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="region">Region</label>
                                <input name="medrecregion" type="text" class="form-control"  placeholder="Enter region (Kecamatan, Kelurahan, RT/RW)">
                            </div>
                        </div>                                                               
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="postalcode">Postal Code</label>
                                <input name="medrecpostal" type="text" class="form-control"  placeholder="Enter postal code">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent">Parent's Name</label>
                        <input name="medrecparent" type="text" class="form-control"  placeholder="Enter parent">
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone1">Phone 1</label>
                                <input name="medrecphone1" type="text" class="form-control" placeholder="Enter phone number">
                            </div>             
                            @if ($errors->has('medrecphone1'))
                                <p class="text-danger">{{ $errors->first('medrecphone1') }}</p>
                            @endif                                                
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone2">Phone 2</label>
                                <input name="medrecphone2" type="text" class="form-control" placeholder="Enter phone number">
                            </div>                               
                        </div>                                
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="medrecemail" type="text" class="form-control" placeholder="Enter email">
                    </div> 
                
                </div>
                <!-- /.card-body -->
            
            </div>
            <!-- /.card -->     
            

            <div class="card card-default">
                
                <div class="card-header">
                    <h3 class="card-title">Allergy</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>

                
                <div class="card-body">
                    <div class="row">
                        <!--<button type="button" class="btn btn-default" id="assignaller">
                            Assign Allergy
                        </button>-->
                    </div>
                    <div class="row" style="margin-top:5px;">
                        <!--<select name="medrecaller" id="assignedaller" multiple="" class="form-control"></select>-->
                        <!--<input id="medrecaller" name="medrecaller" type="hidden" class="form-control" >-->
                        <textarea id="medrecaller" name="medrecaller" class="form-control" ></textarea>
                    </div>
                </div>
                <!-- /.card-body -->        
            </div>
            <!-- /.card -->   
            

            <div class="card card-default">
                
                <div class="card-header">
                    <h3 class="card-title">Special Note</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>

                
                <div class="card-body">
                    <div class="row" style="margin-top:5px;">
                        <textarea id="specialnote" name="specialnote" class="form-control" ></textarea>
                    </div>
                </div>
                <!-- /.card-body -->        
            </div>
            <!-- /.card -->   

            
            <div class="row mb-2">
                <div class="col-sm-6">                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        <!-- start modal assign allergy-->
        <div class="modal fade" id="modalassignaller">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Assign Allergy</h4>
                        <button id="closeassignaller" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                List Allergy
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-body table-responsive p-0" style="height: 330px;">
                                <table id="example1" class="table table-head-fixed table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Allergy Name</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($allergieslist) > 0)
                                            @foreach($allergieslist as $temp_listdata)
                                                <tr>
                                                    <td>{{ $temp_listdata->id }}</td>
                                                    <td>{{ $temp_listdata->allergyname }}</td>
                                                    <td>{{ $temp_listdata->allergydesc }}</td>
                                                    <td><button id="btnassign_{{$temp_listdata->id}}" onClick="f_assignaller({{$temp_listdata->id}}, '{{ $temp_listdata->allergyname }}')" class="btn btn-primary btn-xs">Assign</button></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        
                        
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end modal assign allergy-->

        

    </div>
</section>
<!-- /.content -->        
@endsection