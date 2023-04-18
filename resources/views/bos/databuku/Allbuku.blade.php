@extends('pustaka.linkadmin')
@section('titlenav','DATA BUKU')
@section('databuku','active')

@section('konten')

{{-- style="margin-bottom:490px" --}}
    {{-- <div style="margin-top:90px; border:solid thin black"> --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 table-responsive text-light ">
                        <a class="btn btn-lg" style="background:linear-gradient(-180deg,#34d058,#28a745 90%);" href="{{url('tambahbuku')}}">ADD DATA &nbsp;<i class="now-ui-icons education_atom"></i></a>
                    <table id="dt" class="table table-hover text-light w-100">
                            <thead class="text-ligt">
                                <tr  style="background: #4d77c3;">
                                    <th class="p-3"><b>No.</b></th>
                                    <th class="p-3"><b>Aksi</b></th>
                                    <th class="p-3"><b>Kode</b></th>
                                    <th class="p-3"><b>Cover</b></th>
                                    <th class="p-3"><b>Judul</b></th>
                                    <th class="p-3"><b>Penerbit</b></th>
                                    <th class="p-3"><b>Pengarang</b></th>
                                    <th class="p-3"><b>Rak</b></th>
                                    <th class="p-3"><b>Jumlah</b></th>
                                    <th class="p-3"><b>Status</b></th>
                                </tr>
                            </thead>
                                <tbody class="table table-striped text-light" style="background: #1f485f7a;">

                                    {{-- buat angka/ NO. --}}
                                    @php
                                        $no=0
                                    @endphp

                                    @foreach ($data_buku as $item)

                                        @php
                                            $no++
                                        @endphp

                                    <tr>
                                        <td>{{$no}}</td>

                                            <td>
                                                <a class="btn btn-icon btn-primary" href='{{url("editbuku/$item->id")}}'><i class="now-ui-icons education_atom" title="Edit"></i></a>
                                                <a class="btn btn-icon btn-info " href='#'><i class="now-ui-icons education_atom" title="Detail"></i></a>
                                                <a class="btn btn-icon btn-danger " href='{{url("deletebuku/$item->id")}}'><i class="now-ui-icons education_atom" title="Delete"></i></a>
                                            </td>
                                        <td>{{$item->kode_b}}</td>
                                        {{-- <td>{{$item->imgbuku}}</td> --}}
                                        <td>
                                            <img src="{{ asset('/covers/'.$item->imgbuku) }}" width="50px" height="70px">
                                        </td>
                                        <td>{{$item->judul}}</td>
                                        <td>{{$item->penerbit}}</td>
                                        <td>{{$item->pengarang}}</td>
                                        <td>{{$item->rak}}</td>
                                        <td>{{$item->jml}}</td>
                                        <td><a href="#" class="@if($item->sts_buku == 'HILANG') p-2 mt-1 badge badge-danger  @endif
                                                       @if($item->sts_buku == 'ADA') p-2 mt-1 badge badge-success  @endif
                                                       @if($item->sts_buku == 'PINJAM') p-2 mt-1 badge badge-light  @endif">{{$item->sts_buku}}</a></td>
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
