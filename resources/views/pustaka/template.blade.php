<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{url('bootstrap-4/css/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="{{url('tabel/css/dataTables.bootstrap4.min.css')}}"> 
    <link rel="stylesheet" href="{{url('sweetalert/dist/sweetalert2.min.css')}}"> --}}
    
    {{-- <style>
    body
    {
        background-color: #646464;
    }
    </style> --}}
    <title>Perpustakaan</title>
</head>
    <body>
{{-- =============    **yield adalah tembakan dari *section yang berfungsi sebagai wadah dari data 
                        NB:nama dari yielad harus sama dengan nama section    **     ============ --}}
    @yield('file')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('bootstrap-4/js/jquery-3.3.1.slim.min.js') }}"></script>         
    <script src="{{ url('bootstrap-4/js/popper.min.js') }}"></script>         
    <script src="{{ url('bootstrap-4/js/bootstrap.min.js') }}"></script>

    {{-- <script src="{{ url('tabel/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('tabel/js/dataTables.bootstrap4.min.js') }}"></script>
    
    <script src="{{url('sweetalert/dist/sweetalert2.min.js')}}"></script>
    @yield('tabel') --}}
</body>
</html>