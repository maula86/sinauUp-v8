@extends('pustaka.linkadmin')
@section('titlenav','DATA PINJAM')
@section('datapinjam','active')

@section('konten')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 table-responsive text-light ">
                <a class="btn btn-lg" style="background:linear-gradient(-180deg,#34d058,#28a745 90%);" href="{{url('addpinjam')}}">ADD DATA &nbsp;<i class="now-ui-icons education_atom"></i></a>
            <table id="dt" class="table table-hover text-light" style="width:100%;">
                    <thead class="text-ligt">
                        <tr  style="background: #4d77c3;">
                            <th class="p-3"><b>No.</b></th>
                            <th class="p-3"><b>Aksi</b></th>
                            <th class="p-3"><b>Cetak</b></th>
                            <th class="p-3"><b>ID</b></th>
                            <th class="p-3"><b>Tgl Pinjam</b></th>
                            <th class="p-3"><b>Tgl Kembali</b></th>
                            <th class="p-3"><b>Status</b></th>
                            {{-- <th class="p-3"><b>BUKU</b></th> --}}

                        </tr>

                    </thead>
                        <tbody class="table table-striped text-light" style="background: #1f485f7a;">

                            {{-- buat angka/ NO. --}}
                            @php
                                $no=0
                            @endphp


                            @foreach ($dataAT as $djam)

                                @php
                                    $no++
                                @endphp


                            <tr>
                                <td>{{$no}}</td>

                                    <td>
                                        <a class="btn btn-sm btn-info" href='{{url("editpinjam/$djam->id")}} '><i class="now-ui-icons design_bullet-list-67" title="Detail"></i></a>
                                        {{-- <button id="{{$djam->id.'_'          //0
                                                 .$djam->id_agt.'_'
                                                 .$djam->sts_trans}}"
                                                 class="btn btn-primary btn-sm mt-1 bangkit"><i class="far fa-edit"></i>
                                        </button> --}}

                                    </td>
                                <td><a class="btn btn-sm btn-success" href='{{url("printtrans/$djam->id")}}'><i class="fas fa-print" title="PRINT"></i></a></td>
                                <td>{{$djam->kdtrans}}</td>
                                <td>{{$djam->tglpjm}}</td>
                                <td>{{$djam->tglkmb}}</td>
                                <td><a href="#" class="@if($djam->sts_trans =='PINJAM')p-2 badge badge-pill mt-1 badge-warning text-danger @endif
                                            @if($djam->sts_trans =='SELESAI')p-2 badge badge-pill badge-success mt-1 @endif">{{$djam->sts_trans}}</a></td>
                                @endforeach

                            </tr>

                        </tbody>
            </table>
                        {{-- iki modal buku detail --}}


                         <!-- Modal -->
                                <div class="modal fade" id="modaltran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bg-info">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                            <form method="POST" action='{{url("edittrans")}}'>
                            @method('POST')
                            @csrf

                            {{-- @if ($djam->id.$djam->id_agt)
                            // <input id="p0" type="hidden" name="id_t" value="{{$djam->id}}">
                            // <input id="p1" type="hidden" name="idagt" value="{{$djam->id_agt}}">
                            @endif --}}

                            {{-- <input id="p0" type="hidden" name="id_t" value="{{$djam->id}}">
                            <input id="p1" type="hidden" name="idagt" value="{{$djam->id_agt}}"> --}}
                            <p><h5><b>Cek apakah semua buku yang dipimjam <mark>'SUDAH'</mark> dikembalikan</b></h5></p>
                           <input id="p2" type="hidden" name="sts_trans" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            </form>

        </div>
    </div>
</div>
{{-- </div> --}}







@endsection

@section('addjs')
<script>
   $(document).ready(function() {
        $('#dt').DataTable();
        $('.bangkit').click(function(){

             var tran=$(this).attr('id');
             var ns= tran.split("_");
                $('#p0').val(ns[0].trim());
                $('#p1').val(ns[1].trim());
                $('#p2').val(ns[2].trim());
                // var sb = ns[2].trim();
                    // console.log(bk);
                    // if (sb.trim()=="PINJAM") {
                    //     $('#p2').attr('checked','checked');
                    // }
                    // else if (sb.trim()=="SELESAI") {
                    //     $('#p3').attr('checked','checked');
                    // }


            $('#modaltran').modal({
                backdrop:'static',
                keyboard:false
            })
        })
    });

        // seetalert
        @if(Session::has('sukses'))
        // alert('data sukses');
            Swal.fire({
                    position: 'top-middle',
                    icon: 'success',
                    title: 'mantabbbb',
                    showConfirmButton: false,
                    timer: 2000
                });
        @endif
</script>



@endsection
