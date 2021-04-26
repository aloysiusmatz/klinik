@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Checkup</h1>
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
        
    <div class="card card-default collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Medical Record Details</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
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
                            <input type="text" class="form-control" id="medrecname" name="medrecname"  value="{{$edititem->medrec_name}}" disabled>
                        </div>
                        @if ($errors->has('medrecname'))
                            <p class="text-danger">{{ $errors->first('medrecname') }}</p>
                        @endif                             
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="medrecbirthdate">Birth Date</label>
                            <input type="date" id="medrecbirthdate" name="medrecbirthdate" class="form-control" value="{{$edititem->birthdate}}" disabled>
                        </div>
                        @if ($errors->has('medrecbirthdate'))
                            <p class="text-danger">{{ $errors->first('medrecbirthdate') }}</p>
                        @endif 
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="sex">Sex</label>
                            <select name="medrecsex" class="form-control select2" style="width: 100%;" disabled>
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
                            <select name="medrecblood" class="form-control select2" style="width: 100%;" disabled>
                                @php( $blood = ['A', 'B', 'O', 'AB'] )
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input name="medrecreligion" type="text" class="form-control"  value ="{{$edititem->religion}}" disabled >
                        </div>
                    </div>                            
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input name="medrecaddress" type="text" class="form-control" id="address"  value="{{$edititem->address}}" disabled>
                </div>
                @if ($errors->has('medrecaddress'))
                    <p class="text-danger">{{ $errors->first('medrecaddress') }}</p>
                @endif 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input name="medreccity" type="text" class="form-control" id="city" value="{{$edititem->city}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="region">Region</label>
                            <input name="medrecregion" type="text" class="form-control" id="region" value="{{$edititem->region}}" disabled>
                        </div>
                    </div>                                                               
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input name="medrecpostal" type="text" class="form-control" id="postalcode" value="{{$edititem->postalcode}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="parent">Parent's Name</label>
                    <input name="medrecparent" type="text" class="form-control" id="parent"  value="{{$edititem->parent}}" disabled>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="phone1">Phone 1</label>
                            <input name="medrecphone1" type="text" class="form-control" id="phone1" value="{{$edititem->phone1}}" disabled>
                        </div>             
                        @if ($errors->has('medrecphone1'))
                            <p class="text-danger">{{ $errors->first('medrecphone1') }}</p>
                        @endif                                                
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="phone2">Phone 2</label>
                            <input name="medrecphone2" type="text" class="form-control" id="phone2" value="{{$edititem->phone2}}" disabled>
                        </div>                               
                    </div>                                
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="medrecemail" type="text" class="form-control" id="email" value="{{$edititem->email}}" disabled>
                </div> 
            
            </div>
            <!-- /.card-body -->
        
        </div>
        <!-- /.card -->     
        

        <div class="card card-default collapsed-card">
            
            <div id="headerallergy" class="card-header" >
                <h3 class="card-title">Allergy</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    <textarea id="medrecaller" name="medrecaller" class="form-control" disabled>{{$edititem->allergies}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->        
        </div>
        <!-- /.card -->     
        
        
        <div class="card card-default collapsed-card">
                
            <div id="headernote" class="card-header">
                <h3 class="card-title">Special Note</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                </div>
            </div>

            
            <div class="card-body">
                <div class="row" style="margin-top:5px;">
                    <textarea id="specialnote" name="specialnote" class="form-control" disabled>{{$edititem->special_note}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->        
        </div>
        <!-- /.card --> 

        
        <form action="{{route('newtransaction.store')}}" method="POST" enctype="multipart/form-data">
        <!--<form id="formCheckup" method="POST" enctype="multipart/form-data">-->
            {{ csrf_field() }}
            <input type="hidden" name="inp_medrecID" value="{{$edititem->id}}">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Checkup</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <div class="card-body">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="check_s">S</label>
                                <textarea type="text" class="form-control" name="check_s"></textarea>
                            </div>                                            
                        </div>
                        @if ($errors->has('check_s'))
                            <p class="text-danger">{{ $errors->first('check_s') }}</p>
                        @endif 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="check_o">O</label>
                                <textarea type="text" class="form-control" name="check_o"></textarea>
                            </div>                                            
                        </div>
                        @if ($errors->has('check_o'))
                            <p class="text-danger">{{ $errors->first('check_o') }}</p>
                        @endif 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="check_a">A</label>
                                <textarea type="text" class="form-control" name="check_a"></textarea>
                            </div>                                            
                        </div> 
                        @if ($errors->has('check_a'))
                            <p class="text-danger">{{ $errors->first('check_a') }}</p>
                        @endif 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="check_p">P</label>
                                <textarea type="text" class="form-control" name="check_p"></textarea>
                            </div>                                            
                        </div>
                        @if ($errors->has('check_p'))
                            <p class="text-danger">{{ $errors->first('check_p') }}</p>
                        @endif 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="check_action">Action</label>
                                <textarea type="text" class="form-control" name="check_action"></textarea>
                            </div>                                            
                        </div>    
                        @if ($errors->has('check_action'))
                            <p class="text-danger">{{ $errors->first('check_action') }}</p>
                        @endif 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="diagnosis">Diagnosis</label>
                                <textarea type="text" class="form-control" name="diagnosis"></textarea>
                            </div>                                            
                        </div>                                                    
                        @if ($errors->has('diagnosis'))
                            <p class="text-danger">{{ $errors->first('diagnosis') }}</p>
                        @endif     
                    </div>
                    
                </div>
                <!-- /.card-body -->        
            </div>
            <!-- /.card -->

            <div class="card card-default">
                
                <div class="card-header">
                    <h3 class="card-title">Medicines</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- diremark karena sementara nama medicines pakai freetext
                            <div class="form-group">
                                <button type="button" class="btn btn-default" id="btn_searchmed" onclick="openSearchMed()">Search</button>
                            </div>-->
                            <div class="form-group">
                                <button type="button" class="btn btn-default" id="btn_addmed" onclick="f_addmedsearch2()">Add Medicines</button>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <input name="inp_medID" id="inp_medID" type="hidden">
                            <div class="form-group">
                                <table id="t_medicineadd" class="table">
                                    <!-- diremark karena medicines sementara pakai free teks
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Medicine Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    -->
                                    <thead>
                                        <tr>
                                            <th>Medicine Name</th>
                                            <th>Qty</th>
                                            <th>Aturan Pakai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->        
            </div>
            <!-- /.card -->   

            <div class="card card-default">
                
                <div class="card-header">
                    <h3 class="card-title">Images</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    <input type="file" class="form-control-file" id="checkupImage" name="checkupImage[]" multiple="">
                </div>
                <!-- /.card-body -->        
            </div>
            <!-- /.card -->   

            <!-- submit button -->
            <div class="row mb-2">
                <div class="col-sm-6">       
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

        <!-- start modal search medicines-->
        <div class="modal fade" id="modalsearchmed">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!--<div id="medsearch_loading" class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>-->
                    <div class="modal-header">
                        <h4 class="modal-title">Search Medicines</h4>
                        <button id="closesearchmed" type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeSearchMed()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <input id="inp_searchmed" type="text" class="form-control"  placeholder="Search Medicines..." value="">   
                            </div>
                        </div>
                        <div class="row">
                            <div id="total_record" class="col-md-12" style="margin-top:10px">
                                
                            </div>
                        </div>

                        <div class="row" style="margin-top:5px">
                            <div class="card-body table-responsive p-0" style="height: 330px;">
                                <table id="searchmedresult" class="table table-head-fixed table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Medicine Name</th>
                                            <th>Description</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
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



    </div>
</section>


<!-- /.content -->        
@endsection