@extends('pustaka.linkadmin')
{{--  --}}
@section('titlenav','DASHBOARD')
{{--  --}}
@section('home','active')
{{--  --}}
@section('konten')
{{-- style="margin-bottom:490px" --}}
        <div class="content">
            <div class="card-deck text-center mb-3" style="height: 35%">
                <div class="card ml-3 bayang" style="background-color:rgba(0,0,0,0.3); color:#ffff;">
                    <div class="card-body">
                    <canvas id="diagram"></canvas>              
                    </div>
                </div>
                
                <div class="mr-3 ">
                </div>

                <div class="card mr-3 bayang" style="background-color:rgba(0,0,0,0.3); color:#ffff;">
                    <div class="card-body">
                    <canvas id="diagramtwo"></canvas>
                    </div>
                </div>
            </div>
            
            {{-- Details/////////////////// --}}
            <div class="card-deck text-center">

                <div class="card ml-3 bayang" style="background-color:rgba(0,0,0,0.3); color:#ffff;">
                    <div class="card-body">
                    <h3 class="card-title">Buku</h3>
                    <h1 class="ubah">{{$buku}}</h1><br>
                    <h1><i class="now-ui-icons education_agenda-bookmark col-2"></i></h1>

                    </div>

                    {{-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div> --}}
                </div>
                    <div class="card mr-3 bayang" style="background-color:rgba(0,0,0,0.3); color:#ffff;">
                    <div class="card-body">
                    <h3 class="card-title">Anggota</h3>
                    <h1 class="ubah">{{$agt}}</h1><br>
                    <h1><i class="now-ui-icons business_badge col-6"></i></h1>

                    </div>

                    {{-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div> --}}
                </div>
                    <div class="card mr-3 bayang" style="background-color:rgba(0,0,0,0.3); color:#ffff;">
                    <div class="card-body">
                    <h3 class="card-title">Transaksi</h3>
                    <h1 class="ubah">{{$trans}}</h1><br>
                    <h1><i class="now-ui-icons location_bookmark col-6"></i></h1>

                    </div>

                    {{-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div> --}}
                </div>
            </div>
        </div>

@endsection

@section('addjs')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    $(document).ready(function() {
        $(".ubah").counterUp({delay:10,time:1000});
        $('.bayang').on('mouseenter', function(){
            $(this).css({
                "box-shadow": "2px 2px 20px",
                "color": "#00a8cc"
                 })
        })
        $('.bayang').on('mouseleave', function(){
            $(this).css({
                "box-shadow": "0px 0px 0px",
                "color": "#f4eeff"
                 })
        })
        var diagram1 = document.getElementById("diagram").getContext('2d')
        var labone = ['Buku', 'Anggota', 'Transaksi']
        var datone = ['{{$buku}}', '{{$agt}}', '{{$trans}}']
        var bacone = ['#36cab6', '#ff6384', '#ff834a']
        var chart1 = new Chart(diagram1, {
            type: 'doughnut',
            data: {
                labels: labone,
                datasets: [ {
                    data: datone,
                    backgroundColor: bacone,
                }]
            },
        })

        var diagram2 = document.getElementById("diagramtwo").getContext('2d')
        var labtwo = ['Buku', 'Anggota', 'Transaksi']
        var dattwo = ['{{$buku}}', '{{$agt}}', '{{$trans}}']
        var bactwo = ['#36cab6', '#ff6384', '#ff834a']
        var chart2 = new Chart(diagram2, {
            type: 'polarArea',
            data: {
                labels: labtwo,
                datasets: [ {
                    data: dattwo,
                    backgroundColor: bactwo,
                }]
            },
        })
    });

</script>
@endsection
