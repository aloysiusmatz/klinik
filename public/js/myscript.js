var modal123 = document.getElementById("modalassignaller");
var btn123 = document.getElementById("assignaller");
var btnCloseAller = document.getElementById("closeassignaller");
var inpAssignAller = document.getElementById('medrecaller');
var inpAssignAller1 = document.getElementById('medrecaller1');
var formCheckup = document.getElementById('formCheckup');
var request = new XMLHttpRequest();
var arr_assignaller =[];
var arr_assignallername = [];
var idx = 0;
var arr_medicineadd = [];
var cntcheckupmedicine = 0;

//var btn_searchmed = document.getElementById('btn_searchmed');
var modal_searchmed = document.getElementById('modalsearchmed');
var modal_printsickl = document.getElementById('modalprintsickl');

$(document).ready(function(){
    
    if ($('#medrecage').length > 0){ //age in medrec
        var age = getAge($('#medrecbirthdate').val());
        $('#medrecage').val(age);
    };

    /*if ($('#medrecaller').length > 0) {
        if (inpAssignAller.value != ""){  
            arr_assignaller = inpAssignAller.value.split(',');
            arr_assignallername = inpAssignAller1.value.split(',');
        };
    };*/
    
    if ($('#headerallergy').length > 0){
        if ($('#medrecaller').val() != ''){
            $('#headerallergy').css({'color':'white', 'background-color':'#e63e3e'});
        }
    }

    if ($('#headernote').length > 0){
        if ($('#specialnote').val() != ''){
            $('#headernote').css({'color':'white', 'background-color':'#e63e3e'});
        }
    }

    $("#inp_searchmed").keypress(function(e){
        var keycode = e.keyCode;
        if(keycode == 13){
            var query = $(this).val();
            fetch_medicine_data(query);
        };
    });

    if ($("#checkupImages").length > 0){
        $("#checkupImages").val(null);
    };

    if ($('#checkup_today').length > 0){
        $('#checkup_today').on('click', function(e){
            get_report_checkup('today');
        });
    };

    if ($('#checkup_month').length > 0){
        $('#checkup_month').on('click', function(e){
            get_report_checkup('month');
        });
    };

    if ($('#checkup_applyrange').length > 0){
        $('#checkup_applyrange').on('click', function(e){
            $checkup_from = $('#checkup_from').val();
            //$query=$checkup_from;
            //if ($('#checkup_to').val() != ""){
                $checkup_to = $('#checkup_to').val();
                //$query=$query+','+$checkup_to;
            //}
            $query=$checkup_from+','+$checkup_to;
            get_report_checkup($query);
        });
    };

    if ($('#btn_showHistory').length > 0){
        $('#btn_showHistory').on('click', function(e){
            e.preventDefault();
            var modalhistory = document.getElementById('modalhistory');
            var medrecid = document.getElementById('medrecid');
            modalhistory.style.display = "block";
            modalhistory.classList.add("show");
            //alert(medrecid.value);
            fetch_history_medrec(medrecid.value);
        });
    }
    
    if ($('#btn_closeHistory').length > 0){
        $('#btn_closeHistory').on('click', function(e){
            e.preventDefault();
            var modalhistory = document.getElementById('modalhistory');
            modalhistory.style.display = "none";
            modalhistory.classList.remove("show");
        });
    }

    if ($('#btn_modalSickLetter').length > 0){
        $('#btn_modalSickLetter').on('click', function(e){
            e.preventDefault();
            var modalsickl = document.getElementById('modalprintsickl');
            modalsickl.style.display = "block";
            modalsickl.classList.add("show");
        });
    }

    if ($('#btn_closeSickLetter').length > 0){
        $('#btn_closeSickLetter').on('click', function(e){
            e.preventDefault();
            var modalsickl = document.getElementById('modalprintsickl');
            modalsickl.style.display = "none";
            modalsickl.classList.remove("show");
        });
    }
    
    if ($('#btn_printSickLetter').length > 0){
        $('#btn_printSickLetter').on('click', function(e){
            e.preventDefault();
            $dateFrom = $('#print_datefrom').val();
            if ($dateFrom == ''){
                alert('From date is required');
            }else{
                $medrecId = $('#medrecid').val(); 
                $checkupId = $('#inp_checkupid').val();            
                $dateTo = $('#print_dateto').val();
                $query=$checkupId+','+$dateFrom + ',' +$dateTo;
                //alert($query);
                store_print_sickletter($query, $medrecId);
            }

        });
    }
    
    function getAge(p_birthdate){
        var datetoday = new Date();
        var todayyear = datetoday.getFullYear();
        var birthdate = new Date(p_birthdate);
        var birthyear = birthdate.getFullYear();
        var age = todayyear - birthyear;
        return age;
    };

    function get_report_checkup(query){
        $.ajax({
            url:"/klinik/public/reportcheckupsearch",
            method:"GET",
            data:{query:query},
            dataType:'json',
            beforeSend: function(){
                // Show loading
            },
            success:function(data){
                //alert(data.totalrow+'%'+data.query);
                $('#t_checkup tbody').html(data.tabledata);
                //$('#total_record').html('Data Show: ' + data.total_data);
            },
            complete:function(data){
                // Hide loading
                //$("#medsearch_loading").hide();
            }          
        });
    };

    function fetch_medicine_data(query = ''){
        $.ajax({
            url:"/klinik/public/transmedsearch",
            method:"GET",
            data:{query:query},
            dataType:'json',
            beforeSend: function(){
            // Show image container
            $("#medsearch_loading").show();
            },
            success:function(data){
                //alert('data');
                $('#searchmedresult tbody').html(data.table_data);
                $('#total_record').html('Data Show: ' + data.total_data);
            },
            complete:function(data){
            // Hide image container
            $("#medsearch_loading").hide();
            }          
        });
    };

    function fetch_history_medrec(query){
        $.ajax({
            url:"/klinik/public/historycheckup",
            method:"GET",
            data:{query:query},
            dataType:'json',
            beforeSend: function(){
                // Show loading
            },
            success:function(data){
                $('#historyresult tbody').html(data.table_data);
                //alert(data.query);
            },
            complete:function(data){
                
            }          
        });
    }

    function store_print_sickletter(query, medrecid){
        $.ajax({
            url:"/klinik/public/printsickletter",
            method:"GET",
            data:{query:query},
            dataType:'json',
            beforeSend: function(){
                // Show loading
            },
            success:function(data){
                if (data.failed == 'false'){
                    open_print_sickletter(medrecid);
                }else {
                    Swal.fire({  
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        type: 'error',
                        title: data.message
                    });
                }                
                //alert(data.failed+'$'+data.message+'$'+data.query);
            },
            complete:function(data){
                
            }          
        });
        
    }

    function open_print_sickletter(medrecid){
        window.open('/klinik/public/opensickletter/'+medrecid);        
    }
});

btn123.onclick = function(){
    modal123.style.display = "block";
    modal123.classList.add("show");
};

btnCloseAller.onclick = function(){
    modal123.style.display = "none";
    modal123.classList.remove("show");
};

function f_assignaller(id, allername){
    var myButton = document.getElementById(event.srcElement.id);
    
    if (myButton.innerText == 'Assign'){
        arr_assignaller.push(id.toString());  
        arr_assignallername.push(allername);
        myButton.innerHTML = "Remove";
        myButton.classList.remove("btn-primary");
        myButton.classList.add("btn-danger");
    }
    else if(myButton.innerText == 'Remove'){
        idx = 0;
        myButton.innerHTML = "Assign";
        myButton.classList.remove("btn-danger");
        myButton.classList.add("btn-primary");
        idx = arr_assignaller.indexOf(id.toString());
        if (idx > -1){
            arr_assignaller.splice(idx,1);
            arr_assignallername.splice(idx,1);
        }
    }
    inpAssignAller.value = arr_assignaller;
    inpAssignAller1.value = arr_assignallername;
    //alert(arr_assignaller+'#'+arr_assignallername);  
};

function openSearchMed(){
    modal_searchmed.style.display = "block";
    modal_searchmed.classList.add("show");
};

function closeSearchMed(){
    modal_searchmed.style.display = "none";
    modal_searchmed.classList.remove("show");
};



function f_minusqty(id){
    var inpval = document.getElementById('inpqtymed'+id);
    if (inpval.value == null){
        inpval.value = 0;
    };

    if( inpval.value <= 0){
        inpval.value = 0;
    }else{
        inpval.value--;
    };
};

function f_addqty(id){
    var inpval = document.getElementById('inpqtymed'+id);
    if (inpval.value == null){
        inpval.value = 0;
    };

    inpval.value++;
    
};

function f_addmedsearch(id, medname){
    var idx1 = -1;
    idx1 = arr_medicineadd.indexOf(id.toString());
    if (idx1 < 0){
        arr_medicineadd.push(id.toString());
        var newrow = '  <tr id="rowmed'+id+'">'
                            +'<td>'+id+'</td>'
                            +'<td>'+medname+'</td>'
                            +'<td>'
                                +'<div class="input-group mb-3">'
                                    +'<div class="input-group-prepend">'
                                        +'<button id="btn_reduceqtymed'+id+'" type="button" class="btn btn-primary" onclick="f_minusqty('+id+')">-</button>'
                                    +'</div>'
                                    +'<input name="inpqtymed'+id+'" id="inpqtymed'+id+'" type="text" class="form-control" style="max-width:80px">'
                                    +'<div class="input-group-append">'
                                        +'<button id="btn_addqtymed'+id+'" type="button" class="btn btn-primary" onclick="f_addqty('+id+')">+</button>'
                                    +'</div>'

                                    +'<div class="input-group-append">'
                                        +'<button id="btn_removerow'+id+'" type="button" class="btn btn-xs btn-danger" onclick="f_removemed('+id+')">Remove</button>'
                                    +'</div>'
                                +'</div>'
                            +'</td>'
                        +'</tr> ';
        $('#t_medicineadd tbody').append(newrow);
        $('#inp_medID').val(arr_medicineadd);
        Swal.fire({  
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            type: 'success',
            title: 'Medicine succesfully added'
        });
    }else{
        Swal.fire({  
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            type: 'error',
            title: 'Medicine already added'
        });
    };
};

function f_addmedsearch2(){
    cntcheckupmedicine++;
    //alert(cntcheckupmedicine);
    arr_medicineadd.push(cntcheckupmedicine.toString());
    var newrow = '  <tr id="rowmed'+cntcheckupmedicine+'">'
                        +'<td>'
                            +'<input name="inpnamemed'+cntcheckupmedicine+'" id="inpnamemed'+cntcheckupmedicine+'" type="text" class="form-control" >'
                        +'</td>'
                        +'<td style="max-width:60px">'
                            +'<input name="inpqtymed'+cntcheckupmedicine+'" id="inpqtymed'+cntcheckupmedicine+'" type="text" class="form-control" value="1" onkeyup="cekQtyInput('+cntcheckupmedicine+')">'
                        +'</td>'
                        +'<td>'
                            +'<input name="inprulemed'+cntcheckupmedicine+'" id="inprulemed'+cntcheckupmedicine+'" type="text" class="form-control" >'
                        +'</td>'
                        +'<td>'
                            +'<button id="btn_removerow'+cntcheckupmedicine+'" type="button" class="btn btn-xs btn-danger" onclick="f_removemed('+cntcheckupmedicine+')">Remove</button>'
                        +'</td>'
                    +'</tr> ';
    $('#t_medicineadd tbody').append(newrow);
    $('#inp_medID').val(arr_medicineadd);
        
};


function f_removemed(id){
    var idx1 = -1;
    var rowtoremove = document.getElementById('rowmed'+id);
    
    idx1 = arr_medicineadd.indexOf(id.toString());
    arr_medicineadd.splice(idx1,1);
    rowtoremove.remove();
    $('#inp_medID').val(arr_medicineadd);
    Swal.fire({  
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        type: 'warning',
        title: 'Medicine removed'
    });    
};

function cekQtyInput(id){
    
    // Remove invalid characters
    var patt = /\D/g;
    var str = $('#inpqtymed'+id).val();
    sanitized = str.replace(patt, '');
    
    if (sanitized == 0){
        sanitized = 1;
    }

    // Update value
    $('#inpqtymed'+id).val(sanitized);
   
}