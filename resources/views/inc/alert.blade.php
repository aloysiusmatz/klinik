@if(  Session::get('notif_type') != 'none' and Session::get('notif_type') != '' )
    <script type="text/javascript">
        Swal.fire({  
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            type: '{{ Session::get('notif_type') }}',
            title: '{{ Session::get('notif_msg') }}'
        });
    </script>
     {{ Session::forget('notif_type') }}
     {{ Session::forget('notif_msg') }}
@endif
