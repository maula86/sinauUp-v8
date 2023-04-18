{{-- =============    **extends adalah mengimprofkan alamat(tanpa TAG<HTML>) --> beberapa pustaka**     ============ --}}

@extends('pustaka.template')

{{-- =============    **section  adalah mengimprofkan data file --> beberapa pustaka dengan wadah *yield**     ============ --}}

@section('file')

    <style>
     .b
        {
            padding : 5px;
            margin-right :35px;
            width: 110px;
            height: 40px;
            background: linear-gradient(45deg,#ff8c8c,#d74177);
            box-shadow: 0 5px 15px rgba(0,0,0,1);
            border-radius : 50px;
            font-size: 20px;
        }
        .nbg
        {
            background: linear-gradient(45deg,#38adae,#cd295a);
        }
    </style>

{{-- ==========  Saat array ditampilkan maka array tersebut ditulis (dengan =$) dan diberi alias (=as dilanjutkan namanya) --}}

    <center>
        <!-- <div class="container"> -->
            <div class="container-fluid" style="margin-top:10px;">
                        <!-- nav bro.. -->
                <nav class="navbar navbar-expand-lg navbar-light mb-5 fixed-top nbg">
                        <a class="navbar-brand text-light" href="#"><b>Sinau</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                    
{{--============================ Foreach = perulanagan --}}
                        @foreach($menu as $ls)
                        <!-- <a class="nav-link text-light b">{{ $ls }}</a> -->
                        <a class="nav-link text-light b" href="#{{$ls}}">{{ $ls }}<span class="sr-only">(current)</span></a>
                        
                        @endforeach
                        <ul class="navbar-nav ml-auto">
                             <li class="nav-item">
                                <a class="nav-link text-light" href="{{ url('/home') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
    </center>
                        </div>
                        <!-- and nav bro.... -->
                </nav>
            {{-- ======= --}}
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <!-- carousel -->
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="{{url('images/bg3.jpg')}}" class="d-block w-100" alt=".bg3" class="sz" style="height: 800px;" >
                            </div>
                            <div class="carousel-item">
                            <img src="{{url('images/bg2.jpg')}}" class="d-block w-100" alt=".bg4" class="sz" style="height: 800px;" >
                            </div>
                            <div class="carousel-item">
                            <img src="{{url('images/bg1.jpg')}}" class="d-block w-100" alt=".bg1" class="sz" style="height: 800px;" >
                            </div>
                        </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                    <!-- and carousel -->
















            </div>
       

                

    
@endsection
