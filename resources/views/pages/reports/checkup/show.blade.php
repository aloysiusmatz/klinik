@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Checkup ID {{$displaycheckup->id}}</h1>
            {{ date_format($displaycheckup->created_at, 'd-M-Y, H:i') }}
        </div>
        <div class="col-sm-6">
            <div class="float-sm-right">
                <a href="{{route('print.healthletter', $edititem->id)}}" target="_blank" id="btn_healthLetter" class="btn btn-default"><i class="fas fa-print"></i> Health Letter</a>
                <a id="btn_modalSickLetter" class="btn btn-default"><i class="fas fa-print"></i> Sick Letter</a>
                <a href="{{route('reportcheckup.index')}}" class="btn btn-default">Go Back</a>
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
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="medrecbirthdate">Birth Date</label>
                            <input type="date" id="medrecbirthdate" name="medrecbirthdate" class="form-control" value="{{$edititem->birthdate}}" disabled>
                        </div>

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
            
            <div id="headerallergy" class="card-header">
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

                <div class="row">
                <textarea id="specialnote" name="specialnote" class="form-control" disabled >{{$edititem->special_note}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->        
        </div>
        <!-- /.card --> 
       
        
        
        
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Checkup</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>

            <input type="hidden" id="inp_checkupid" value="{{$displaycheckup->id}}">

            <div class="card-body">
            
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="check_s">S</label>
                            <textarea type="text" class="form-control" name="check_s" disabled>{{ $displaycheckup->check_s }}</textarea>
                        </div>                                            
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="check_o">O</label>
                            <textarea type="text" class="form-control" name="check_o" disabled>{{ $displaycheckup->check_o }}</textarea>
                        </div>                                            
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="check_a">A</label>
                            <textarea type="text" class="form-control" name="check_a" disabled>{{ $displaycheckup->check_a }}</textarea>
                        </div>                                            
                    </div> 

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="check_p">P</label>
                            <textarea type="text" class="form-control" name="check_p" disabled>{{ $displaycheckup->check_p }}</textarea>
                        </div>                                            
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="check_action">Action</label>
                            <textarea type="text" class="form-control" name="check_action" disabled>{{ $displaycheckup->action }}</textarea>
                        </div>                                            
                    </div>    

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea type="text" class="form-control" name="diagnosis" disabled>{{ $displaycheckup->diagnosis }}</textarea>
                        </div>                                            
                    </div>                                                    
   
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Medicine Name</th>
                                        <th>Qty</th>
                                        <th>Aturan Pakai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions_medicines as $temp_tm)
                                        <tr>
                                            <td>{{ $temp_tm->desc }}</td>
                                            <td>{{ $temp_tm->qty }}</td>
                                            <td>{{ $temp_tm->rule }}</td>
                                        </tr>
                                    @endforeach
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
                @foreach($transactions_images as $temp_ti)
                    <img src="{{ asset('storage/CheckupPhoto/'.$displaycheckup->id.'/'.$temp_ti->image_url ) }}" style="max-height:500px;">
                @endforeach
            </div>
            <!-- /.card-body -->        
        </div>
        <!-- /.card -->   
      
    </div>
</section>
<!-- /.content -->        


<!-- start modal cetak surat sakit-->
<div class="modal fade" id="modalprintsickl" >
    <div class="modal-dialog modal-xl" style="max-width:500px">
        <div class="modal-content">
            <!--<div id="medsearch_loading" class="overlay d-flex justify-content-center align-items-center">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>-->
            <div class="modal-header">
                <h4 class="modal-title">Sick Letter</h4>
                <button id="btn_closeSickLetter" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="print_datefrom">From:</label> 
                <input type="date" id="print_datefrom" name="print_datefrom" class="form-control">
                <label for="print_dateto">To:</label> 
                <input type="date" id="print_dateto" name="print_dateto" class="form-control">
            </div>
            <div class="modal-footer justify-content-between">
                <a id="btn_printSickLetter" class="btn btn-default" target="_blank"><i class="fas fa-print"></i> Print</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end modal -->
@endsection
