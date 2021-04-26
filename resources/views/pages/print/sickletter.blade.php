@extends('layouts.print')

@section('content')
    <div class="row">
        <div class="col-md-12" style="text-align:center">
            <h3>SURAT KETERANGAN SAKIT</h3>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align:center;margin-top:-10px">
            <i>medical certificate for leave or extension of leave or commutation of leave/ sick leave certificate</i>
        </div>
    </div>
    <div class="row" style="margin-top:30px;">
        Yang bertanda tangan dibawah ini,
    </div>
    <div class="row" style="margin-top:10px;">
        <i>I, the authorized attendant</i>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-12" >
            <table style="margin-left:30px">
                <tr>
                    <td style="min-width:100px">Dokter</td>
                    <td>:   .......................................................................................................</td>
                </tr>
                <tr>
                    <td>Doctor</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row" style="margin-top:20px;">
        Menerangkan bahwa,        
    </div>
    <div class="row" style="margin-top:10px;">
        <i>Hereby certify that</i>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-12" >
            <table style="margin-left:30px">
                <tr>
                    <td style="min-width:100px">Nama</td>
                    <td>:   {{$medrecdetail->medrec_name}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="min-width:100px"><br>Tanggal Lahir</td>
                    <td><br>:   {{date_format(date_create($medrecdetail->birthdate), 'd F Y')}}</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td></td>
                </tr>     
                <tr>
                    <td style="min-width:100px"><br>Alamat</td>
                    <td><br>:   {{$medrecdetail->address}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td></td>
                </tr> 
                <tr>
                    <td style="min-width:100px"><br>Pekerjaan</td>
                    <td><br>:   .......................................................................................................</td>
                </tr>
                <tr>
                    <td>Occupation</td>
                    <td></td>
                </tr>           
            </table>
        </div>
    </div>   
    
    <div class="row" style="margin-top:20px;">
        Telah berobat pada tanggal .......................................     
    </div>
    <div class="row" style="margin-top:20px;">
        Karena keadaan sakitnya yang bersangkutan diharapkan (because of his/her illness requires):
    </div>
    <div class="row" style="margin-top:10px;">
        <input type="checkbox" >Dirawat (hospitalized)
        <input type="checkbox" style="margin-left:20px">Istirahat (absence of duty)
        <input type="checkbox" style="margin-left:20px">Bekerja ringan (restricted from heavy work)<br>
        <input type="checkbox" style="margin-top:20px">Tidak mengikuti olahraga (absence of physical exercise)
    </div>
    <div class="row" style="margin-top:20px;">
        Selama  &nbsp&nbsp ................  &nbsp&nbsp (&nbsp&nbsp ................ &nbsp&nbsp)
        &nbsp hari/ minggu terhitung tanggal &nbsp ...................... &nbsp s/d &nbsp ......................
        <br>
        <i>for a periode of</i><i style="padding-left:155px">day/ week from</i>
    </div>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-12" >
            <table >
                <tr>
                    <td style="min-width:100px">Catatan</td>
                    <td>: 
                    </td>
                </tr>
                <tr>
                    <td>Note</td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row" style="margin-top:30px;">
        Demikian untuk menjadi perhatian.
        <br>
        <i>Thereby to be a notice</i>
    </div>
    <div class="row" style="float:right">
        ...............................................
        <br><br><br><br><br>
        (&nbsp...........................................&nbsp)
    </div>
@endsection