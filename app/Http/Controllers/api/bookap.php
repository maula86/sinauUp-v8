<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Buku;
use Carbon\Carbon;




class bookap extends Controller
{

    public function index()
    {
       // return "janjosss";
         $data_buku= Buku::all();
       return response()->json($data_buku);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        // $total = $request->jml;

        if ($request->jml > 1)
        {

           for($i=1; $i<= $request->jml; $i++)
        //    for($p=1; $p<= $grand; $p++)
           {
               $gkode =$request->kode_b."-".$i;
               $inbuk = new Buku();

               $inbuk->kode_b     = $gkode;
               $inbuk->judul      = $request->judul;
               $inbuk->penerbit   = $request->penerbit;
               $inbuk->pengarang  = $request->pengarang;
               $inbuk->rak        = $request->rak;
               $inbuk->jml        = 1;
               $inbuk->price      = $request->price;

               $inbuk->save();

                $inbuk->fo       =$i;
                $inbuk->save();

            //    return response()->json(['msg' => 'simpan Sukses']);
           }
        }

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $idbuk = $id;
        $dte = Buku::where('id','=',$idbuk)->first();
        // $dte = Buku::where('id','=',$id);
        // $idbuk = Buku::findOrFail($id);

        //Masih Menampilkan View
        // return view('bos.databuku.Ebuku', compact('dte'));
           return response()->json($dte);
        // return response()->json(['msg' => 'simpan Sukses']);


    }

    public function update(Request $request, $id)
    {
        $idbuk = $id;
        $dte = Buku::where('id','=',$idbuk)->first();
          // return $request->all();
        //   $dte = Buku::findOrFail($id);
          $dte->judul     =$request->judul;
          $dte->penerbit  =$request->penerbit;
          $dte->pengarang =$request->pengarang;
          $dte->rak       =$request->rak;
          $dte->price     =$request->price;
          $dte->sts_buku  =$request->sts_buku;

          // Update gambar 'Tanpa nama baru'
        //   $gbr = $request->file('imgbuku');

          // // $ext = $gbr->getClientOriginalExtension();
          // // $imgbuku= $request->imgbuku.$gbr;

        //   $langka         =$dte->imgbuku;
        //   $nmbuku = explode('.',$langka);
        //   // return $nmbuku[0];
        //   // Array Ngalem
        //   $jos =  $nmbuku[0];
        //   $ext = $gbr->getClientOriginalExtension();
        //   $lama = $jos.".".$ext;
          // return $lama;

          // $dte->imgbuku   =$langka->getClientOriginalName();
          // $nmfilebaru     =$langka;
          // // return $nmfilebaru;


          $dte->update();
        //   return response()->json(['msg' => 'simpan Sukses']);
          // Move File picture
        //   $gbr->move('covers',$lama);
        // return response()->json($dte);
        //   return redirect('databuku');

    }

    public function destroy(Request $request, $id)
    {
        $idbuk = Buku::findOrFail($id);
        $idbuk->delete();
    }
}
