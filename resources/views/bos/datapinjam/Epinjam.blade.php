@extends('pustaka.linkadmin')
@section('titlenav','DATA PINJAM')
@section('datapinjam','active')

@section('konten')
    <div class="container-fluid">
    <div class="row">
        <div class="col-12 table-responsive text-light ">
                {{-- <a class="btn btn-lg" style="background:linear-gradient(-180deg,#34d058,#28a745 90%);" href="{{url('addpinjam')}}">ADD DATA &nbsp;<i class="now-ui-icons education_atom"></i></a> --}}
            <table id="dt" class="table table-hover text-light" style="width:100%;">
                    <thead class="text-ligt">
                        <tr  style="background: #4d77c3;">
                            <th class="p-3"><b>No.</b></th>
                            <th class="p-3"><b>Aksi</b></th>
                            <th class="p-3"><b>Cetak</b></th>
                            <th class="p-3"><b>Kode Buku</b></th>
                            <th class="p-3"><b>Judul</b></th>
                            <th class="p-3"><b>Status</b></th>
                            <th class="p-3"><b>Kondisi</b></th>




                        </tr>

                    </thead>
                        <tbody class="table table-striped text-light" style="background: #1f485f7a;">

                            {{-- buat angka/ NO. --}}
                            @php
                                $no=0
                            @endphp


                            @foreach ($data3 as $d )

                                @php
                                    $no++
                                @endphp

                            <tr class="@if($d->sts_buku == 'HILANG') bg-primary @endif">
                                <td>{{$no}}</td>

                                    <td>
                                    <button id="{{$d->kdtrans.'_'     //0
                                                 .$d->id.'_'          //1
                                                 .$d->tglpjm.'_'      //2
                                                 .$d->id_de.'_'       //3
                                                 .$d->sts_details.'_' //4
                                                 .$d->id_buk.'_'      //5
                                                 .$d->sts_buku.'_'    //6
                                                 .$d->price.'_'       //7
                                                 .$d->tglpjm.'_'      //8,
                                                 .$d->tglkmb.'_'      //9,
                                                 .$d->kondetails.'_'  //10,11
                                                 .$d->idagt}}"
                                                  class="btn btn-sm btn-info Mbuk"><i class="far fa-edit" title="EDIT"></i></i></button>
                                    </td>
                                    <td>
                                        @if($d->sts_buku =='HILANG')
                                         <a class="btn btn-sm btn-danger" href='{{url("sanksih/$d->id_buk")}}'><i class="fas fa-print" title="Hilang"></i>
                                        </a>
                                        @endif
                                        @if($d->kondetails =='TELAT')
                                         <a class="btn btn-sm btn-warning" href='{{url("sanksit/$d->id_buk")}}'><i class="fas fa-print" title="Telat"></i>
                                        </a>
                                        @endif
                                    </td>
                                <td>{{$d->kode_b}}</td>
                                <td>{{$d->judul}}</td>
                                <td><a href="#" class="@if($d->sts_buku == 'HILANG') p-2 mt-1 badge badge-danger  @endif
                                                       @if($d->sts_buku == 'ADA') p-2 mt-1 badge badge-success  @endif
                                                       @if($d->sts_buku == 'PINJAM') p-2 mt-1 badge badge-light  @endif">{{$d->sts_buku}}</a></td>
                                <td ><a href="" class="@if($d->sts_details == 'BELUM')p-2 mt-1 badge badge-light  @endif
                                                       @if($d->sts_details == 'KEMBALI') p-2 mt-1 badge badge-success @endif
                                                       @if($d->sts_details == 'HILANG') p-2 mt-1 badge badge-danger @endif">{{$d->sts_details}}</a></td>


                            </tr>
                            @endforeach
                        </tbody>
            </table>

                             <!-- Modal -->
                                <div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bg-info">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-info">
                                        <form method="POST" action='{{url("Esavejam")}}'>
                                        @method('POST')
                                        @csrf

                                        <input id="t0" type="hidden" name="trans">
                                        <input id="t1" type="hidden" name="id">
                                        <input id="t2" type="hidden" name="tglpjm">
                                        <input id="t3" type="hidden" name="id_de">
                                        <input id="t4" type="hidden" name="sts_details">
                                        <input id="t10" type="hidden" name="id_buk">
                                        <input id="t11" type="hidden" name="price">
                                        <input id="t12" type="hidden" name="tglpjm">
                                        <input id="t13" type="hidden" name="tglkmb">
                                        <input id="t14" type="hidden" name="idagt">
                                        <label for="stsbuku" class="mb-1 col-12 text-black">Pilih Status Buku</label>
                                        <div class="row">
                                            <div class="form-check-inline ml-5 col-3 col-md-3">
                                                <input class="form-check-input" type="radio" id="t7" name="sts_buku" value="ADA">
                                                <label class="form-check-label text-black" for="t7"><b>Ada</b></label>
                                            </div>
                                            <div class="form-check-inline ml-1 col-3 col-md-3">
                                                <input class="form-check-input" type="radio" id="t9" name="sts_buku" value="HILANG">
                                                <label class="form-check-label text-black" for="inlineCheckbox1"><b>Hilang</b></label>
                                            </div>
                                        </div>
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
         $('.Mbuk').click(function(){

             var tran=$(this).attr('id');
             var nt= tran.split("_");
                $('#t0').val(nt[0].trim());
                $('#t1').val(nt[1].trim());
                $('#t2').val(nt[2].trim());
                $('#t3').val(nt[3].trim());
                $('#t4').val(nt[4].trim());

                    // var bk = nt[4].trim();
                    // // console.log(bk);
                    // if (bk.trim()=="BELUM") {
                    //     $('#t5').attr('checked','checked');
                    // }
                    // else if (bk.trim()=="KEMBALI") {
                    //     $('#t6').attr('checked','checked');
                    // }
                // $('#t5').val(nt[4].trim());
                // $('#t6').val(nt[4].trim());
                $('#t10').val(nt[5].trim());
                     var sb = nt[6].trim();
                    // console.log(bk);
                    if (sb.trim()=="ADA") {
                        $('#t7').attr('checked','checked');
                    }
                    else if (sb.trim()=="HILANG") {
                        $('#t9').attr('checked','checked');
                    }
                     $('#t11').val(nt[7].trim());
                     $('#t12').val(nt[8].trim());
                     $('#t13').val(nt[9].trim());
                     $('#t14').val(nt[11].trim());

            $('#modaldetail').modal({
                backdrop:'static',
                keyboard:false
            })
        })
    });
</script>
@endsection
