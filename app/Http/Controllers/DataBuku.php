<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



// Yang menggunakan [use App\...], ini Model*
use App\Buku;

class DataBuku extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // tampil seluruh data
    public function index()
    {
        $data_buku= Buku::all();
        return view('bos.databuku.Allbuku',compact('data_buku'));
    }

    //
    public function create()
    {
        return view('bos.databuku.Addbuku');
    }

    // Menerima tangkapan
    public function store(Request $request)
    //  ===**   KIRIMAN Yg Di ketik(di ^
    //      inputkan orang namanya itu | [request] )
    {
    //=============  Dibawah ini Script tampilkan kkiriman
        // $inputbuku =$request->all();
        // return $inputbuku;
        //  Setelah tercantum pada pustaka diatas *, tahap berikutnya meng Instance*

        // return url();

        $grand = $request->jml;
        if($grand >1)
        {
            //------------- UPLOAD GAMBAR/FILE
            //tangkap kiriman gambar Tanpa perulangan
            $gbr = $request->file('imgbuku');
            $ext = $gbr->getClientOriginalExtension();
            $nmfilebaru = $request->kode_b.".".$ext;

            for($p=1; $p<= $grand; $p++)
            {
                $gkode =$request->kode_b."-".$p;
                $inputbuku = new Buku(); // $inputbuku = VARIABEL; BUKU= pustaka di atas

                $inputbuku->kode_b   =$gkode;
                $inputbuku->judul    =$request->judul;
                $inputbuku->penerbit  =$request->penerbit;
                $inputbuku->pengarang =$request->pengarang;
                $inputbuku->rak      =$request->rak;
                $inputbuku->jml      =1;
                $inputbuku->price    =$request->price;
                $inputbuku->imgbuku  = $nmfilebaru;

                $inputbuku->save();

                $inputbuku->fo       =$p;
                $inputbuku->save();
            }

            //upload fotobuku
            $gbr->move('covers', $nmfilebaru);

        }
        return redirect('databuku');
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

   // Menampilkan data yang ingim di edit
    public function edit($id)
    {

        $idbuk = $id;
        $dte = Buku::where('id','=',$idbuk)->first();
        //Masih Menampilkan View
        return view('bos.databuku.Ebuku', compact('dte'));
        // $img = $dte->imgbuku;
        // return $img;
    }

    // Simpan data Editan
    public function update(Request $request, $id)
    {
        // return $request->all();
        $dte = Buku::findOrFail($id);
        $dte->judul     =$request->judul;
        $dte->penerbit  =$request->penerbit;
        $dte->pengarang =$request->pengarang;
        $dte->rak       =$request->rak;
        $dte->sts_buku  =$request->sts_buku;

        // Update gambar 'Tanpa nama baru'
        // $gbr = $request->file('imgbuku');

        // // // $ext = $gbr->getClientOriginalExtension();
        // // // $imgbuku= $request->imgbuku.$gbr;

        // $langka         =$dte->imgbuku;
        // $nmbuku = explode('.',$langka);
        // // return $nmbuku[0];
        // // Array Ngalem
        // $jos =  $nmbuku[0];
        // $ext = $gbr->getClientOriginalExtension();
        // $lama = $jos.".".$ext;
        // return $lama;

        // $dte->imgbuku   =$langka->getClientOriginalName();
        // $nmfilebaru     =$langka;
        // // return $nmfilebaru;


        $dte->update();
        // Move File picture
        // $gbr->move('covers',$lama);

        return redirect('databuku');
    }


    public function destroy($id)
    {

         return view('bos.databuku.Dbuku');
    }
}
