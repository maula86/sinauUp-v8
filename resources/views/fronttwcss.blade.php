<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{asset('footer/images/Splashscreen.png')}}" rel="shortcut icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="w-full bg-[#232a3d] px-10 py-5">
        <nav class="bg-slate-700">
            <ul>
                <li class="flex justify-between text-white font-semibold">
                    <a href="">Home</a>
                    <a href="">Service</a>
                    <a href="">New Book</a>
                    <a href="">List Ada</a>
                    <a href="">Contact Us</a>
                </li>
            </ul>
        </nav>
        <section class="flex justify-center mt-7">
            <div class="bg-[#232a3d] text-white w-1/2 flex justify-center">
                <div>

                    <h1 class="font-bold text-7xl">Cari List Buku Disini Aja, hanya Di Sianau
                    </h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo laudantium iste molestiae magnam quam asperiores sint fugiat ducimus. Temporibus, facilis necessitatibus delectus ipsum inventore ipsa, laboriosam repudiandae corporis fugit odio quasi natus. Atque placeat reprehenderit officiis ad libero beatae, Repudiandae harum accusamus reiciendis eum sequi quae reprehenderit, aliquid sint ex iure nihil fuga explicabo aperiam voluptates cumque corrupti modi omnis ullam possimus! Non, vitae quos! Magni at, ab totam ucimus laboriosam, sunt provident quasi accusamus officiis dolorum! Voluptate animi velit obcaecati corrupti est rem maxime repudiandae accusamus? Porro odit illo, vitae dolores sint sit commodi laboriosam iste praesentium nobis harum molestias, iusto aut tempora qui quisquam, aliquam debitis impedit. Voluptatem?</p>
                </div>
            </div>
            <div class="w-1/2 flex justify-center font-bold text-7xl font-mono">
            <img src="{{asset('img/Leonardo_ai.png')}}" alt="AiLeonardo" srcset="">
            </div>
        </section>
        <section class="flex mt-7">
            <div class="bg-indigo-300 w-full font-bold text-7xl font-mono">
                <div class="w-64 carousel rounded-box">
                    @foreach ($newbuku as $fb)
                        <div class="carousel-item w-full">
                            <img class="w-full" src="{{asset('/covers/'.$fb->imgbuku)}}" alt="cover Book">
                        </div> 
                    @endforeach

                </div>
                     <!-- Swiper -->
                    {{-- <div class="swiper-slide">
                        <div class="card-header text-center" style="background: #4d77c3; height:40%; width:65%"><b class="text-light">{{$fb->judul}}</b></div>
                        <div class="card-body bg-light" style="height:40%; width:65%">
                            
                        </div>
                        <div class="card-footer text-center" style="background: #4d77c3; height:40%; width:65%">
                            <small class="text-light">{{$fb->updated_at}} </small>
                        </div>
                    </div> --}}
            </div>
            {{-- <div class="bg-amber-500 w-1/2 font-bold text-7xl font-mono">Assets</div> --}}
        </section>
    </div>
</body>
</html>