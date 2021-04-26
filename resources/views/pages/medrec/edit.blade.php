@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Medical Record</h1>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="#" id="btn_showHistory" class="btn btn-success">History</a>
                <a href="{{route('medrec.index')}}" class="btn btn-default">Go Back</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="POST" action="{{ route('medrec.update', $edititem->id) }}">
            {{ csrf_field() }}
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Medical Record Details</h3>
                    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                    <label for="medrecid">Medical Record ID</label>
                                    <input type="text" class="form-control" id="medrecid" name="medrecid"  value="{{$edititem->id}}" disabled>
                                </div>                                            
                            </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="medrecname" name="medrecname" placeholder="Enter full name" value="{{$edititem->medrec_name}}">
                            </div>
                            @if ($errors->has('medrecname'))
                                <p class="text-danger">{{ $errors->first('medrecname') }}</p>
                            @endif                             
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="medrecbirthdate">Birth Date</label>
                                <input type="date" id="medrecbirthdate" name="medrecbirthdate" class="form-control" value="{{$edititem->birthdate}}">
                            </div>
                            @if ($errors->has('medrecbirthdate'))
                                <p class="text-danger">{{ $errors->first('medrecbirthdate') }}</p>
                            @endif 
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="medrecage">Age</label>
                                <input type="input" id="medrecage" class="form-control" disabled>
                            </div>
                        </div>                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select name="medrecsex" class="form-control select2" style="width: 100%;">
                                    @php( $sex = ['Pria', 'Wanita'] )
                                    @foreach($sex as $temp_sex)
                                        @if($edititem->sex == $temp_sex)
                                        <option selected="selected">
                                        @else
                                        <option>
                                        @endif
                                        {{ $temp_sex }}
                                        </option>
                                    @endforeach
                                </select>                                    
                            </div>
                        </div>                            
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="blood">Blood Type</label>
                                <select name="medrecblood" class="form-control select2" style="width: 100%;">
                                    @php( $blood = ['A', 'B', 'O', 'AB', '-'] )
                                    @foreach($blood as $temp_blood)
                                        @if($edititem->blood == $temp_blood)
                                        <option selected="selected">
                                        @else
                                        <option>
                                        @endif
                                        {{ $temp_blood }}
                                        </option>
                                    @endforeach                                    
                                </select>     
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <input name="medrecreligion" type="text" class="form-control" placeholder="Enter religion" value ="{{$edititem->religion}}" >
                            </div>
                        </div>                            
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input name="medrecaddress" type="text" class="form-control" id="address" placeholder="Enter address" value="{{$edititem->address}}">
                    </div>
                    @if ($errors->has('medrecaddress'))
                        <p class="text-danger">{{ $errors->first('medrecaddress') }}</p>
                    @endif 
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input name="medreccity" type="text" class="form-control" id="city" placeholder="Enter city" value="{{$edititem->city}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="region">Region</label>
                                <input name="medrecregion" type="text" class="form-control" id="region" placeholder="Enter region (Kecamatan, Kelurahan, RT/RW)" value="{{$edititem->region}}">
                            </div>
                        </div>                                                               
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="postalcode">Postal Code</label>
                                <input name="medrecpostal" type="text" class="form-control" id="postalcode" placeholder="Enter postal code" value="{{$edititem->postalcode}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent">Parent's Name</label>
                        <input name="medrecparent" type="text" class="form-control" id="parent" placeholder="Enter parent" value="{{$edititem->parent}}">
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone1">Phone 1</label>
                                <input name="medrecphone1" type="text" class="form-control" id="phone1" placeholder="Enter phone number" value="{{$edititem->phone1}}">
                            </div>             
                            @if ($errors->has('medrecphone1'))
                                <p class="text-danger">{{ $errors->first('medrecphone1') }}</p>
                            @endif                                                
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone2">Phone 2</label>
                                <input name="medrecphone2" type="text" class="form-control" id="phone2" placeholder="Enter phone number" value="{{$edititem->phone2}}">
                            </div>                               
                        </div>                                
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="medrecemail" type="text" class="form-control" id="email" placeholder="Enter email" value="{{$edititem->email}}">
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
                    </div>
                </div>

                
                <div class="card-body">
                    <div class="row" style="margin-top:5px;">
                        <textarea id="medrecaller" name="medrecaller" class="form-control" >{{$edititem->allergies}}</textarea>
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
                    </div>
                </div>

                
                <div class="card-body">
                    <div class="row" style="margin-top:5px;">
                        <textarea id="specialnote" name="specialnote" class="form-control" >{{$edititem->special_note}}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->        
            </div>
            <!-- /.card --> 

            
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{Form::hidden('_method', 'PUT')}}         
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

        

        

    </div>
</section>

<!-- start modal search medicines-->
<div class="modal fade" id="modalhistory" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!--<div id="medsearch_loading" class="overlay d-flex justify-content-center align-items-center">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>-->
            <div class="modal-header">
                <h4 class="modal-title">History</h4>
                <button id="btn_closeHistory" type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeSearchMed()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="historyresult" class="table table-head-fixed table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Diagnosis</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end modal assign allergy-->


<!-- /.content -->        
@endsection