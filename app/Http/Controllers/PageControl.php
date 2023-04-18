<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Buku;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PageControl extends Controller
{
    //



    public function create()
    {
        return("
        <center>
        Saya Dibuat oleh Maula Dengan <i>controller</i>
        <b>
        <p style='color : green; margin-top: 30px; font-size :25px;'>
         Aplikasi Perpustakaan Versi 1.0.1 <br>
         Kampus Wearnes Education Center Malang Create <br>
         By : [ Maula_Arif] @2019
         </b>
         </p>
         </center>");
    }

    public function umah()
    {
//==========================================         in here we ant make menu with    *ARRAY*
//==========================         saat array dikirim beserta view maka array di compact (tanpa= $)

        $menu= array ("Home","Katalog","Koleksi","Register","Guestbook");
        return view("first");

        // return view("awal", compact("menu"));

    }

    public function front()
    {
        $allbuku = Buku::all();
        $newbuku = DB::table('bukus')
        ->where('bukus.fo','=',1)
        ->select(
                    'imgbuku',
                    'updated_at',
                    'bukus.judul'
                )
        ->get();
        // $up= $allbuku->updated_at;
        $wkt= Carbon::now()->format('d/m/Y|His');
        // $ray_pjm = explode('-',->updated_at);
        // $pecah = Carbon::create($ray_pjm[0],$ray_pjm[1],$ray_pjm[2])->addDay(7);



        $frontbuku = DB::table('bukus')
        ->where('bukus.sts_buku','=','ADA')
        ->select(
                    'penerbit',
                    'pengarang',
                    'rak',
                    'sts_buku',
                    'bukus.kode_b',
                    'bukus.judul'
                )
        ->get();
            // return $up;
        // return view('front',compact('frontbuku','newbuku'));
        return view('fronttwcss',compact('frontbuku','newbuku'));
    }

// ini folio
    public function front1()
    {
        $now= Carbon::now()->format('d-m-Y');
        // return $now;
        $tglwe=  Buku::first();
        $tgl = $tglwe->updated_at;
        $tgl->addWeek(1);
        // return $tgl;
            $allbuku = Buku::all();
            $newbuku = DB::table('bukus')
            ->where('bukus.fo','=',1)
            ->select(
                        'imgbuku',
                        'updated_at',
                        'bukus.judul'
                    )
            ->get();
        // $up= $allbuku->updated_at;
        // $now= Carbon::now()->format('d-m-Y');
        // $wkt= Carbon::parse(Carbon::now()->addWeek(1))->toDateTimeString();

        // $d = $tglwe['updated_at']->toArray();
        // $da= Carbon::parse($tglwe['updated_at'])->toArray();
        // $par = Carbon::parse($wes);
        // $par = Carbon::parse($wes)->format('d-m-Y');
        // if ($now >  $tgl) {
        //    return "true.,.,.,.,";
        // }
        // else {
        //      return "FALSE";
        // }


        $frontbuku = DB::table('bukus')
        ->where('bukus.sts_buku','=','ADA')
        ->select(
                    'penerbit',
                    'pengarang',
                    'rak',
                    'sts_buku',
                    'bukus.kode_b',
                    'bukus.judul'
                )
        ->get();
            // return $finis;
        // return view('front1');
        if ($now > $tgl) {
            return view('awwal',compact('frontbuku','newbuku'));
        }
        else {
            return view('awwal',compact('frontbuku','newbuku'));
        }
    }

    // Admin
    public function bos()
    {
        return view("bos.bosmin");
    }

    public function buku()
    {
        return view("bos.bosmin");
    }

    public function siji()
    {
        return view("awwa");
    }









    //
}
