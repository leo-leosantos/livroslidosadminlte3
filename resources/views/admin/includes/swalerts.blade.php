
@if(Session::has('success'))
    <script>
        Swal.fire({!! Session:pull('success') !!})
    </script>
@endif
