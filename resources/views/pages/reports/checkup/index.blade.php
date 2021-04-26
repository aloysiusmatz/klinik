@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Checkup Report</h1>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-inline">
                                <button id="checkup_today" type="button" class="btn btn-default" style="padding-top:1px;padding-bottom:1px;padding-left:20px;padding-right:20px">Today</button>
                                <button id="checkup_month" type="button" class="btn btn-default" style="margin-left:5px;padding-top:1px;padding-bottom:1px;padding-left:20px;padding-right:20px">This Month</button>
                                <label style="padding-left:10px;">From:</label>
                                <input id="checkup_from" type="date" class="form-control" style="height:30px;padding-top:1px;padding-bottom:1px;">
                                <label style="padding-left:10px;">To:</label>
                                <input id="checkup_to" type="date" class="form-control" style="height:30px;padding-top:1px;padding-bottom:1px;">
                                <button id="checkup_applyrange" type="button" class="btn btn-primary" style="padding-top:1px;padding-bottom:1px;padding-left:20px;padding-right:20px;margin-left:5px;">Apply</button>
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 360px;">
                                <table id="t_checkup" class="table table-head-fixed table-bordered" style="margin-top:5px;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Checkup ID</th>
                                            <th>MedRec ID</th>
                                            <th>Name</th>
                                            <th>Diagnosis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
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