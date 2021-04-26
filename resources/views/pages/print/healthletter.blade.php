@extends('layouts.print')
@section('content')
    <div class="row">
        <div class="col-md-12" style="text-align:center">
            <h3><u>SURAT KETERANGAN DOKTER</u></h3>
            
        </div>
    </div>

    <div class="row" style="margin-top:30px;">
        Yang bertanda tangan dibawah ini,
    </div>
    <div class="row" style="margin-top:10px;">
        <i>(I, the undersigned, hereby certify that)</i>
    </div>
    
    <div class="row" style="margin-top:20px;">
        <div class="col-md-12" >
            <table style="margin-left:30px">
                <tr>
                    <td style="min-width:100px">Nama</td>
                    <td>:   {{$medrecdetail->medrec_name}}</td>
                </tr>
                <tr>
                    <td>(Name)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:100px"><br>Tanggal Lahir</td>
                    <td><br>:   {{date_format(date_create($medrecdetail->birthdate), 'd F Y')}}</td>
                </tr>
                <tr>
                    <td>(Date of Birth)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:100px"><br>Jenis Kelamin</td>
                    <td><br>:   {{$medrecdetail->sex}}</td>
                </tr>
                <tr>
                    <td>(Gender)</td>
                    <td></td>
                </tr>     
                <tr>
                    <td style="min-width:100px"><br>Alamat</td>
                    <td><br>:   {{$medrecdetail->address}}</td>
                </tr>
                <tr>
                    <td>(Address)</td>
                    <td></td>
                </tr> 
                <tr>
                    <td style="min-width:100px"><br>Pekerjaan</td>
                    <td><br>:   .......................................................................................................</td>
                </tr>
                <tr>
                    <td>(Occupation)</td>
                    <td></td>
                </tr>           
            </table>
        </div>
    </div>   
    
    <div class="row" style="margin-top:20px;">
        Menurut hasil pemeriksaan, dinyatakan sehat jasmani rohani dan memenuhi syarat untuk:     
    </div>
    <div class="row" style="margin-top:10px;">
        (According to a thorough examination, the patient is deemed health and fulfill all requirement for/ to)
    </div>
    
    <div class="row" style="margin-top:20px;">
    .........................................................................................................................................................................
    </div>
    <div class="row" style="margin-top:20px;">
        Harap yang berkepentingan maklum.
    </div>
    <div class="row" style="margin-top:10px;">
        (Please be advised)
    </div>
    <div class="row" style="float:right">
        ...............................................
        <br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDokter Pemeriksa
        <br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(Physician)
        <br><br><br><br><br>
        (&nbsp...........................................&nbsp)
    </div>
@endsection