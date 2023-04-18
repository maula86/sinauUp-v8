<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-4/css/bootstrap.min.css') }}">
    <title>Bukti Peminjaman Buku</title>
<style>
     html,body,div
     {
        text-align:center;
    }
    table,tr,td,thead
    {
        margin-left: 31%;
    }
</style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <H2>STRUK PEMINJAMAN BUKU</H2>
                <?php
                    $notrans ="";
                    $tglpjm  ="";
                    $kdagt   ="";
                    $nmagt   ="";
                    $tglkmbl ="";
                ?>
                @foreach($buktipinjam as $bp)
                <?php
                    $notrans = $bp->kdtrans;
                    $tglpjm  = $bp->tglpjm;
                    $kdagt   = $bp->kd_agt .'-'. $bp->nm_agt;
                    $tglkmbl = $bp->tglkmb;
                ?>
                @endforeach

                <table class="table table-bordered" style="width:400px;">

                    <tr>
                        <td style="width:100px;">NOPINJAM</td>
                        <td style="width:10px;">:</td>
                        <td>{{ $notrans }}</td>
                    </tr>
                    <tr>
                        <td>TGLPINJAM</td>
                        <td>:</td>
                        <td>{{ $tglpjm }}</td>
                    </tr>
                    <tr>
                        <td>ANGGOTA</td>
                        <td>:</td>
                        <td>{{ $kdagt }}</td>
                    </tr>
                    <tr>
                        <td>TGLKEMBALI</td>
                        <td>:</td>
                        <td>{{ $tglkmbl }}</td>
                    </tr>
                </table>

                <table  class="table w-50 table-bordered">
                    <thead>
                        <tr>
                            <th>KODEBUKU</th>
                            <th>JUDUL BUKU</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buktipinjam as $bp)
                        <tr class="w-100">
                            <td>{{ $bp->kode_b }}</td>
                            <td>{{ $bp->judul }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h6>PETUGAS</h6>
            </div>
        </div>
    </div>



    <script src="{{ asset('bootstrap-4/js/jquery-3.3.1.slim.min.js') }}" ></script>
    <script src="{{ asset('bootstrap-4/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap-4/js/bootstrap.min.js') }}" ></script>
</body>
</html>


