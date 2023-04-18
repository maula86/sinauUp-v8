<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        html, body {
      position: relative;
      height: 100%;
    }

    /* @media (max-width: 1200px) and (min-width: 992px)
    .big .bg {
        width: 75%;
    } */
    @media only screen and (min-width: 400px) {
  .big .bg {
            width: 75%;
        }
    }
    body {
      background: #8cbeff7d;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;
    }

    /* .full-height
    {
                height: 100vh;
    } */

    .flex-center
    {
                align-items: center;
                display: flex;
                justify-content: center;
    }
    .position-ref
    {
                position: relative;
    }
    .top-right
    {
                position: absolute;
                right: 10px;
                top: 18px;
    }
    .links > a
    {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
    }




    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap-4/css/bootstrap1.css')}}" i>
    <link href="{{asset('footer/bootstrapcdn2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('footer/footer2.css')}}">
    <link rel="stylesheet" href="{{asset('swiper/css/swiper.css')}}">

    <title>Sugeng Rawuh</title>
  </head>
  <body data-spy="scroll" data-target="#navbar-example">
      <!-- NAV -->
    <nav id="navbar-example" class="navbar navbar-expand-lg navbar-dark" style="background: #3a2a46">
    <a href="#"><img style="height: 50px; width: 90px" alt="logo" src="{{asset('footer/images/Splashscreen.png')}}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#carouselExampleFade">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#newb">NEW BOOK</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#ctl">CATALOG</a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="#gst">GUEST</a>
        </li>
        </ul>
        <ul>
       <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </ul>
    </div>
</nav>
<!-- End Nav-->
<div class="row big" style="width: 220vh; height: 88vh; background: #9ec8ff; margin-top: -20px;">
    {{-- <div > --}}
        <div class="col-4 bg">
            <img src="{{asset('images/BG_www.png')}}" alt=""
            width="1085" height="995" data-no-retina="" style="width: 378.608px; height: 547.205px; transition: none 0s ease 0s;
            text-align: inherit; line-height: 0px;
            border-width: 0px; margin-top: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 9px;">
        </div>
    {{-- </div> --}}
    {{-- awal courosal --}}
            <div id="carouselExampleIndicators" class="carousel slide col-7" data-ride="carousel" style="width: 378.608px; height: 547.205px;">
                <ol class="carousel-indicators" style="margin-top: -50%;">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner text-dark" style="margin-top: 10px;">
                    <div class="carousel-item active">
                        <h1 class="text-center">Sugeng Rawuh di Sinau</h1>
                    {{-- <img class="d-block w-100" src="..." alt="First slide"> --}}
                    </div>
                    <div class="carousel-item">
                    {{-- A card --}}
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('covers/B002.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="{{asset('covers/B002.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                        <div class="card">
                           <img class="card-img-top" src="{{asset('covers/B002.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                    {{-- E card --}}
                    </div>
                    <div class="carousel-item">
                    {{-- <img class="d-block w-100" src="..." alt="Third slide"> --}}
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="margin-right: 110px;"></span>
                    <span class="sr-only" style="margin-right: 110px;">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="margin-left: 110px;"></span>
                    <span class="sr-only" style="margin-left: 110px;">Next</span>
                </a>
            </div>
        {{-- end Courosal --}}
</div>

<!-- card cover -->
    <div class="row m-4">
      <div class="col-lg-1"></div>
      <div id="newb" class="card col-lg-10 col-md-12 col-sm-12" style="background-color:#7b7b7b17;">
        <h5 class="card-title display-3 text-light" style="background: #4d77c3 ;">Cover Book</h5>
        <div class="card-body">

            {{-- <h5 class="card-title">Card title</h5> --}}
            {{-- <div class="row"> --}}
                <div class="swiper-container">
                    <div class="swiper-wrapper" >
                    @foreach ($newbuku as $fb)
                 <!-- Swiper -->
                            <div class="swiper-slide">
                                <div class="card-header text-center" style="background: #4d77c3; height:40%; width:65%"><b class="text-light">{{$fb->judul}}</b></div>
                                <div class="card-body bg-light" style="height:40%; width:65%">
                                    <img alt="logo" src="{{asset('/covers/'.$fb->imgbuku)}}" style="height:185pt; width:245pt">
                                </div>
                                <div class="card-footer text-center" style="background: #4d77c3; height:40%; width:65%">
                                    <small class="text-light">{{$fb->updated_at}} </small>
                                </div>
                            </div>
                    @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                {{-- <div class="card text-white m-1" style="max-width: 18rem; background-color:#7b7b7b17;">
                    <div class="card-header text-center" style="background: #4d77c3 ;"><b class="text-light">{{$fb->judul}}</b></div>
                    <div class="card-body bg-light">
                    <img alt="logo" src="{{asset('/covers/'.$fb->imgbuku)}}">
                    </div> --}}
                    {{-- <a class="btn btn-info" >{{$fb->judul}}
                        </a> --}}
                    {{-- <div class="card-footer text-center" style="background: #4d77c3 ;">
                    <small class="text-light">
                        {{$fb->updated_at}}
                    </small>
                    </div>
                </div> --}}
                {{-- //// --}}
                {{-- @endforeach --}}
            </div>
            </div>
        </div>
      <div class="col-lg-1"></div>
    </div>
<!-- and cover -->

<!-- Catalog -->
  <div class="row m-4">
      <div class="col-lg-1"></div>
      <div id="ctl" class="card col-lg-10 col-md-12 col-sm-12" style="background-color:#7b7b7b17;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body">
            <h5 class="card-title display-3 text-light" style="background: #4d77c3 ;">Catalog</h5>
               <table id="dtf" class="table table-hover text-light w-100">
                            <thead class="text-ligt">
                                <tr  style="background: #4d77c3;">
                                    <th class="p-3"><b>No.</b></th>
                                    {{-- <th class="p-3"><b>Aksi</b></th> --}}
                                    <th class="p-3"><b>Kode</b></th>
                                    {{-- <th class="p-3"><b>Cover</b></th> --}}
                                    <th class="p-3"><b>Judul</b></th>
                                    <th class="p-3"><b>Penerbit</b></th>
                                    <th class="p-3"><b>Pengarang</b></th>
                                    <th class="p-3"><b>Rak</b></th>
                                    {{-- <th class="p-3"><b>Jumlah</b></th> --}}
                                    <th class="p-3"><b>Status</b></th>
                                </tr>
                            </thead>
                                <tbody class="table table-striped text-light" style="background: #1f485f7a;">

                                    {{-- buat angka/ NO. --}}
                                    @php
                                        $no=0
                                    @endphp

                                    @foreach ($frontbuku as $item)

                                        @php
                                            $no++
                                        @endphp

                                    <tr>
                                        <td>{{$no}}</td>

                                            {{-- <td>
                                                <a class="btn btn-icon btn-primary" href='{{url("editbuku/$item->id")}}'><i class="now-ui-icons education_atom" title="Edit"></i></a>
                                                <a class="btn btn-icon btn-info " href='#'><i class="now-ui-icons education_atom" title="Detail"></i></a>
                                                <a class="btn btn-icon btn-danger " href='{{url("deletebuku/$item->id")}}'><i class="now-ui-icons education_atom" title="Delete"></i></a>
                                            </td> --}}
                                        <td>{{$item->kode_b}}</td>
                                        {{-- <td>{{$item->imgbuku}}</td> --}}
                                        {{-- <td>
                                            <img src="{{ asset('/covers/'.$item->imgbuku) }}" width="50px" height="70px">
                                        </td> --}}
                                        <td>{{$item->judul}}</td>
                                        <td>{{$item->penerbit}}</td>
                                        <td>{{$item->pengarang}}</td>
                                        <td>{{$item->rak}}</td>
                                        {{-- <td>{{$item->jml}}</td> --}}
                                        <td><a href="#" class="p-2 mt-1 bg-success text-light">{{$item->sts_buku}}
                                        </a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                    </table>
            </div>
            {{-- <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
            </div> --}}
        </div>
      <div class="col-lg-1"></div>
  </div>
<!-- and Catalog-->

   <!-- card About -->
      {{-- <div class="row m-4">
      <div class="col-lg-2"></div>
      <div class="card col-lg-8 col-md-12 col-sm-12">
                <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
      <div class="col-lg-2"></div>
        </div> --}}
  <!-- and about -->

<!-- card Guest -->
    <div class="row m-4">
      <div class="col-lg-2"></div>
      <div id="gst" class="card col-lg-8 col-md-12 col-sm-12" style="background-color:#7b7b7b17;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
            <div class="card-body text-light">
            <h5 class="card-title display-3 text-light" style="background: #4d77c3 ;">Guest</h5>
           <form class="text-light" method="POST">
                <div class="form-group row">
                <label for="exampleInputEmail1" class="col-12 text-light">User</label>
                <input type="text" class="form-control mx-3 col-10" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group row">
                <label for="exampleInputEmail1" class="col-12 text-light">E-mail</label>
                <input type="email" class="form-control mx-3 col-10" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group" style="margin-right:14%;">
                    <label class="text-light" for="exampleFormControlTextarea1">Komentar</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-round">Kirim</button>
            </form>
            </div>
        </div>
      <div class="col-lg-2"></div>
    </div>
<!-- and guest -->

{{-- end Container --}}
{{-- </div> --}}
{{-- </div> --}}
  <!-- footer -->
<footer class="ct-footer">
    <div class="container">
        <div class="ct-footer-meta text-center-sm">
            <div class="row">
                <div class="col-sm-6 col-md-2">
                    <img alt="logo" src="{{asset('footer/images/Splashscreen.png')}}">
                </div>
                <div class="col-sm-6 col-md-3">
                    <address>
                        <span>WebCorpCo<br></span>123 Easy Street<br>
                        Orlando, Florida, 32801<br>
                        <span>Phone: <a href="tel:081'salahsatu_salahsemua'">tel:081'salahsatu_salahsemua'</a></span>
                    </address>
                </div>
                <div class="col-sm-6 col-md-2 ct-u-paddingTop10">
                    <a href="" target="_blank"><img alt="app store" src="{{asset('footer/images/appstore.png')}}"></a>
                </div>
                <div class="col-sm-6 col-md-2 ct-u-paddingTop10">
                    <a href="" target="_blank"><img alt="google play store" src="{{asset('footer/images/androidstore.png')}}"></a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <ul class="ct-socials list-unstyled list-inline">
                        <li>
                            <a href="" target="_blank"><img alt="facebook" src="{{asset('footer/images/facebook-white.png')}}"></a>
                        </li>
                        <li>
                            <a href="" target="_blank"><img alt="twitter" src="{{asset('footer/images/twitter-white.png')}}"></a>
                        </li>
                        <li>
                            <a href="" target="_blank"><img alt="youtube" src="{{asset('footer/images/youtube-white.png')}}"></a>
                        </li>
                        <li>
                            <a href="" target="_blank"><img alt="instagram" src="{{asset('footer/images/instagram-white.png')}}"></a>
                        </li>
                        <li>
                            <a href="" target="_blank"><img alt="pinterest" src="{{asset('footer/images/pinterest-white.png')}}"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ct-footer-post">
        <div class="container">
            <div class="inner-left">
                <ul>
                    <li>
                        <a href="">FAQ</a>
                    </li>
                    <li>
                        <a href="">News</a>
                    </li>
                    <li>
                        <a href="">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="inner-right">
                <p>
                    Copyright © 2016 WebCorpCo.&nbsp;<a href="">Privacy Policy</a>
                </p>
                <p>
                    <a class="ct-u-motive-color" href="" target="_blank">Web Design</a> by DigitalUs on <a href="" target="_blank">Solodev CMS</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- and ooterf -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('bootstrap-4/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap-4/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap-4/js/bootstrap.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{-- Data Table --}}
    <script src="{{ url('tabel/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('tabel/js/dataTables.bootstrap4.min.js') }}"></script>
    {{-- swiper --}}
    <script src="{{ url('swiper/js/swiper.js') }}"></script>
    <script>
        $(document).ready(function() {
                $('#dtf').DataTable();
        });
    </script>

    <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
    </script>

  </body>

  </html>
