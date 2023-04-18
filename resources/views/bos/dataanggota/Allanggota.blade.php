@extends('pustaka.linkadmin')
@section('titlenav','DATA Anngota')
@section('dataanggota','active')

@section('konten')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 table-responsive text-light ">
                <a class="btn btn-lg" style="background:linear-gradient(-180deg,#34d058,#28a745 90%);" href="{{url('tambahanggota')}}">ADD DATA &nbsp;<i class="now-ui-icons education_atom"></i></a>
            <table id="dt" class="table table-hover text-light" style="width:100%;">
                    <thead class="text-ligt">
                        <tr  style="background: #4d77c3;">
                            <th class="p-3"><b>No.</b></th>
                            <th class="p-3"><b>Aksi</b></th> 
                            <th class="p-3"><b>ID</b></th>
                            <th class="p-3"><b>Nama Anggota</b></th>
                            <th class="p-3"><b>Alamat</b></th>
                            <th class="p-3"><b>HP</b></th>
                            <th class="p-3"><b>Gambar</b></th>
                            <th class="p-3"><b>Kondisi</b></th>
                            <th class="p-3"><b>Status</b></th>
                        </tr>
                    </thead>
                        <tbody class="table table-striped text-light" style="background: #1f485f7a;">

                            {{-- buat angka/ NO. --}}
                            @php
                                $no=0
                            @endphp

                            @foreach ($data_anggota as $ang)
                            
                                @php
                                    $no++
                                @endphp

                            <tr>
                                <td>{{$no}}</td>

                                    <td>
                                        <a class="btn btn-icon btn-primary" href="#"><i class="now-ui-icons education_atom" title="Edit"></i></a>
                                        <a class="btn btn-icon btn-info " href="#"><i class="now-ui-icons education_atom" title="Detail"></i></a>
                                        <a class="btn btn-icon btn-danger " href="#"><i class="now-ui-icons education_atom" title="Delete"></i></a>
                                    </td>
                                <td>{{$ang->kd_agt}}</td>
                                <td>{{$ang->nm_agt}}</td>
                                {{-- <td>{{$item->imgbuku}}</td> --}}
                                <td>{{$ang->alamat_agt}}</td>
                                <td>{{$ang->hp}}</td>
                                <td>
                                    <img src="{{ asset('/profiles/'.$ang->img_agt) }}" class="rounded" width="75px" height="75px">
                                </td>
                                <td>{{$ang->kondisi}}</td>
                                <td>{{$ang->sts_agt}}</td>

                            </tr>
                            @endforeach
                        </tbody>
            </table>
        </div>
    </div>
</div>
{{-- </div> --}}







@endsection

@section('addjs')
<script>
   $(document).ready(function() {
        $('#dt').DataTable();
    } );
</script>



@endsection