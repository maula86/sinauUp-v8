<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Auth
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
//ini modelnya
use App\Anggotas;
use App\Buku;
use App\Transaksis;
use App\Details;
//ini addnya
use Validator;
use DB;
use Exception;
use Carbon\Carbon;
// use PDF;

class DataPinjam extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return view('bos.datapinjam.Allpinjam');
        // kaifiyah no 1
        $dataAT = DB::table('transakses')
                    ->join('anggotas','transakses.agt_id','=','anggotas.id')
                    // ->join('users','transakses.user_id','=','users.id')
                    // ->where('sts_trans','=','PINJAM')
                    ->select('transakses.*','anggotas.id as id_agt',
                                            // 'users.id as id_us',
                                            'anggotas.kondisi')
                                            // 'anggotas.kodisi')
                    ->get();
        //mau bagus ya JOIN
        // $dataBD =Buku::where('sts_buku','=','PINJAM');
        // // $pt= array([$dataAT,$dataBD]);
        // return $id;
        return view('bos.datapinjam.Allpinjam',compact('dataAT'));
/////////////////////   *****************   ///////////////////////
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dibawah ini cara membaca tabel....
        // tb Anggota
        $list_agt = Anggotas::where('sts_agt','=','AKTIV')->where('kondisi','=','BELUM')->orWhere('kondisi','=','SELESAI')->get();  //'=' itu bisa disisi dengan operator lain seperti ('>','<'),dln
        //tb buku   ->where('kondisi','=','BELUM','/','SELESAI')
        $list_buk = Buku::Where('sts_buku','=','ADA')->get();
        //bawa nilai dari kedua TB ini ke add peminjam
        return view('bos.datapinjam.Addpinjam', compact('list_agt','list_buk'));
    }


    public function store(Request $request)
    {
        $inputjam =$request->all();
        $validasi = Validator::make($inputjam,[
            'tglpjm'    => 'required',
            'agt_id'    => 'gt:0',
            'buku_id1'  => 'gt:0'

        ]);

        if ($validasi->fails())
        {
            // redirect()->back() "Kembali ke page awal"
            //withInput() "bawak isian yang lama"
            //withErrors () "bawak pesan error dari validator"
           return redirect()->back()->withInput()->withErrors($validasi);
        }

        // return $inputjam;


        //DB dibawah ini harus sudah melewati proses 'Validasi'

        // sifat penyimpanan seperti ini "percobaan "
        DB::beginTransaction(); // error handling Laravel
        // ini Percobaannya
        try
        {
            // coba 1. menyinpan (BARU) ke tabel transakses
            // Instance
            $pjm = new Transaksis();
            //Var
            $ai = $request->agt_id;
            // var
            $pca = "PJM|".Carbon::now()->format('dmY|His')."/".$ai; //.$request->agt_id
            $pjm->kdtrans     = $pca;
            //Var
            $rejam = $request->tglpjm;
            $pjm->tglpjm      = $rejam;
            $pjm->user_id     = Auth::user()->id;
            // var

            $pjm->agt_id      =$ai;
            //Var
            $ray_pjm = explode('-',$rejam);
            //Var
            $pecah = Carbon::create($ray_pjm[0],$ray_pjm[1],$ray_pjm[2])->addDay(7);
            $pjm->tglkmb      =$pecah;

            //* SAVE *
            $pjm->save();
            // ID pada DB diciptakan saat proses simpan sukses
            //Var
            $id_new = $pjm->id;
            // return $pjm;
            // return $ai;



            // coba 2. menyimpan (BARU) ke tabel details
            if ($request->buku_id1 > 0) {
                // Instance
                $dtls = new Details();

                $dtls->trans_id   = $id_new;
                $dtls->buku_id    = $request->buku_id1;
                $dtls->tgl_kembali= $pecah;
                $dtls->denda_tlt  = 0;
                $dtls->denda_hlng = 0;
                $dtls->denda_rsk  = 0;

                //Save
                $dtls->save();

                //coba 3. menyimpan (ganti sts) ke tabel bukus
                Buku::where('id','=',$request->buku_id1)
                    ->update(['sts_buku' =>'PINJAM']);

            }

            if ($request->buku_id2 > 0) {
                // Instance
                $dtls = new Details();

                $dtls->trans_id   = $id_new;
                $dtls->buku_id    = $request->buku_id2;
                $dtls->tgl_kembali= $pecah;
                $dtls->denda_tlt  = 0;
                $dtls->denda_hlng = 0;
                $dtls->denda_rsk  = 0;

                //Save
                $dtls->save();

                //coba 3. menyimpan (ganti sts) ke tabel bukus
                 Buku::where('id','=',$request->buku_id2)
                    ->update(['sts_buku' =>'PINJAM']);


            }

            if ($request->buku_id3 > 0) {
                // Instance
                $dtls = new Details();

                $dtls->trans_id   = $id_new;
                $dtls->buku_id    = $request->buku_id3;
                $dtls->tgl_kembali= $pecah;
                $dtls->denda_tlt  = 0;
                $dtls->denda_hlng = 0;
                $dtls->denda_rsk  = 0;

                //Save
                $dtls->save();

                //coba 3. menyimpan (ganti sts) ke tabel bukus
                 Buku::where('id','=',$request->buku_id3)
                    ->update(['sts_buku' =>'PINJAM']);

            }

            Anggotas::where('id','=',$ai)
                ->update(['kondisi'=>'PINJAM']);


            //coba 3. menyimpan (ganti sts) ke tabel bukus


        }
        // penangkap Error
        catch (Exception $pe)
        {
            DB::rollback(); // Kalau gagal "rollback" balik
            return redirect()->back()->withInput()->with('gagal','Data Gagal Disimpan');
        }
        DB::commit(); // kalau betul "commit" komitmen (ongguen)
        return redirect('datapinjam')->with('sukses','Transaksi Pinjam Berhasil Disimpan');
    }


    public function show($id)
    {


    }


    public function edit($id)
    {
        // Kaifiyah 1
        $idjam=$id;
        // $djam=Details::where('trans_id','=',$idjam)//->orWhere('sts_buku','=','PINJAM')
        //             ->get();
        // return view('bos.datapinjam.Epinjam', compact('djam'));
        // Kaifiyah 2

        $data3 = DB::table('transakses')
                        ->join('details','transakses.id','=','details.trans_id')
                        ->join('bukus','details.buku_id','=','bukus.id')
                        ->join('anggotas','transakses.agt_id','anggotas.id')
                        ->where('transakses.id','=',$idjam)
                        ->select('transakses.*','details.id as id_de',
                                                'details.sts_details',
                                                'bukus.id as id_buk',
                                                'bukus.kode_b',
                                                'bukus.judul',
                                                'bukus.sts_buku',
                                                'bukus.price',
                                                'tglpjm',
                                                'tglkmb',
                                                'kondetails',
                                                'anggotas.id as idagt')
                        // ->where('bukus.sts_buku','=','PINJAM')
                        ->get();
                        // return $data3;
        return view('bos.datapinjam.Epinjam', compact('data3'));
    }



    public function uptrans(Request $request)
    {
        // $d=$id;
        return $request->id_t;
        DB::beginTransaction();
        try
        {
            $et =$request->id_t;
            $ea =$request->idagt;
            // return $et.$ea;
            Transaksis::where('id',$et)->update([
                'sts_trans'=> 'SELESAI']);

            Anggotas::where('id',$ea)
                ->update(['kondisi'=> 'SELESAI']);

        }
        catch(Exception $e)
        {
            DB::rollback();
            // return redirect()->back()->withInput()->with('pesan', 'Data Gagal Disimpan');
        }

        DB::commit();

        // return redirect('datapinjam')->with('sukses', 'Transaksi Pinjam Berhasil Disimpan');
    }

// Telat / hilang
    public function update(Request $request)
    {
        DB::beginTransaction();
        try
        {
/////////////////////////////////////////////////////////////////
            $podo =$request->id;
            $jln = DB::table('details')
                     ->select(DB::raw('count(*)'))
                     ->where('trans_id', '=', $podo)
                     ->where('sts_details', '=', 'BELUM')
                     ->count();

            $ib =$request->id_buk;
            $ie =$request->id_de;
            $hrg =$request->price;
            $kmbsyarat =$request->tglkmb;
            $ida =$request->idagt;
            // return $ida;

        if ($jln == 3) {

           if ($request->sts_buku == 'HILANG') {
                 Details::where('id',$ie)->update([
                 'denda_hlng'=> $hrg,
                 'sts_details'=> 'HILANG']);

                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);
             }

             else {
                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);

                 Details::where('id',$ie)->update([
                 'sts_details'=> 'KEMBALI',
                 'denda_hlng'=> 0.00]);
             }

            $dtnow = Carbon::now()->format('d-m-Y');

            if ($kmbsyarat < $dtnow) {
              Details::where('id',$ie)->update([
                 'denda_tlt'=> 2000,
                 'kondetails'=>'TELAT']);
            }

            else {
                Details::where('id',$ie)->update([
                 'denda_tlt'=> 0.00,
                 'kondetails'=>'TEPAT']);
            }

            if ($jln == 2) {

                if ($request->sts_buku == 'HILANG') {
                 Details::where('id',$ie)->update([
                 'denda_hlng'=> $hrg,
                 'sts_details'=> 'HILANG']);

                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);
             }

             else {
                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);

                 Details::where('id',$ie)->update([
                 'sts_details'=> 'KEMBALI',
                 'denda_hlng'=> 0.00]);
             }

            $dtnow = Carbon::now()->format('d-m-Y');

            if ($kmbsyarat < $dtnow) {
              Details::where('id',$ie)->update([
                 'denda_tlt'=> 2000,
                 'kondetails'=>'TELAT']);
            }

            else {
                Details::where('id',$ie)->update([
                 'denda_tlt'=> 0.00,
                 'kondetails'=>'TEPAT']);
            }

            if ($jln == 1) {
               if ($request->sts_buku == 'HILANG') {
                 Details::where('id',$ie)->update([
                 'denda_hlng'=> $hrg,
                 'sts_details'=> 'HILANG']);

                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);
             }

             else {
                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);

                 Details::where('id',$ie)->update([
                 'sts_details'=> 'KEMBALI',
                 'denda_hlng'=> 0.00]);
             }

            $dtnow = Carbon::now()->format('d-m-Y');

            if ($kmbsyarat < $dtnow) {
              Details::where('id',$ie)->update([
                 'denda_tlt'=> 2000,
                 'kondetails'=>'TELAT']);
            }

            else {
                Details::where('id',$ie)->update([
                 'denda_tlt'=> 0.00,
                 'kondetails'=>'TEPAT']);
            }

                Anggotas::where('id',$ida)->update([
                    'kondisi' => 'SELESAI'
                ]);

                Transaksis::where('id',$podo)->update([
                    'sts_trans' => 'SELESAI'
                ]);
                // 3.1
            }
                //3.2
            }

        // 3
        }

        elseif ($jln == 2) {

           if ($request->sts_buku == 'HILANG') {
                 Details::where('id',$ie)->update([
                 'denda_hlng'=> $hrg,
                 'sts_details'=> 'HILANG']);

                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);
             }

             else {
                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);

                 Details::where('id',$ie)->update([
                 'sts_details'=> 'KEMBALI',
                 'denda_hlng'=> 0.00]);
             }

            $dtnow = Carbon::now()->format('d-m-Y');

            if ($kmbsyarat < $dtnow) {
              Details::where('id',$ie)->update([
                 'denda_tlt'=> 2000,
                 'kondetails'=>'TELAT']);
            }

            else {
                Details::where('id',$ie)->update([
                 'denda_tlt'=> 0.00,
                 'kondetails'=>'TEPAT']);
            }

            if ($jln == 1) {
               if ($request->sts_buku == 'HILANG') {
                 Details::where('id',$ie)->update([
                 'denda_hlng'=> $hrg,
                 'sts_details'=> 'HILANG']);

                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);
             }

             else {
                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);

                 Details::where('id',$ie)->update([
                 'sts_details'=> 'KEMBALI',
                 'denda_hlng'=> 0.00]);
             }

            $dtnow = Carbon::now()->format('d-m-Y');

            if ($kmbsyarat < $dtnow) {
              Details::where('id',$ie)->update([
                 'denda_tlt'=> 2000,
                 'kondetails'=>'TELAT']);
            }

            else {
                Details::where('id',$ie)->update([
                 'denda_tlt'=> 0.00,
                 'kondetails'=>'TEPAT']);
            }

            Anggotas::where('id',$ida)->update([
                'kondisi' => 'SELESAI'
            ]);

            Transaksis::where('id',$podo)->update([
                'sts_trans' => 'SELESAI'
            ]);
            }


        // 2 / 1
        }

        elseif ($jln == 1) {

            if ($request->sts_buku == 'HILANG') {
                 Details::where('id',$ie)->update([
                 'denda_hlng'=> $hrg,
                 'sts_details'=> 'HILANG']);

                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);
             }

             else {
                 Buku::where('id',$ib)->update([
                 'sts_buku'=> $request->sts_buku,]);

                 Details::where('id',$ie)->update([
                 'sts_details'=> 'KEMBALI',
                 'denda_hlng'=> 0.00]);
             }

            $dtnow = Carbon::now()->format('d-m-Y');

            if ($kmbsyarat < $dtnow) {
              Details::where('id',$ie)->update([
                 'denda_tlt'=> 2000,
                 'kondetails'=>'TELAT']);
            }

            else {
                Details::where('id',$ie)->update([
                 'denda_tlt'=> 0.00,
                 'kondetails'=>'TEPAT']);
            }

            Anggotas::where('id',$ida)->update([
                'kondisi' => 'SELESAI'
            ]);

            Transaksis::where('id',$podo)->update([
                'sts_trans' => 'SELESAI'
            ]);

        // 1
        }
/////////////////////////////////////////////////////////////////
        }
        catch(Exception $e)
        {
            DB::rollback();
            // return redirect()->back()->withInput()->with('pesan', 'Data Gagal Disimpan');
        }

        DB::commit();

       return redirect('datapinjam')->with('sukses','Transaksi Pinjam Berhasil Disimpan');
    }

// cetak Telat
    public function printtelat($id)
    {
         $dendatelat = DB::table('bukus')
                        ->join('details','bukus.id','=','details.buku_id')
                        ->join('transakses','details.trans_id','=','transakses.id')
                        ->join('anggotas','transakses.agt_id','=','anggotas.id')
                        ->join('users','transakses.user_id','=','users.id')
                        ->where('details.id','=', $id)
                        ->select(
                                'transakses.kdtrans',
                                'transakses.tglpjm',
                                'transakses.tglkmb',
                                'transakses.user_id',
                                'anggotas.kd_agt',
                                'anggotas.nm_agt',
                                'bukus.kode_b',
                                'bukus.judul',
                                'details.denda_tlt')
                        ->get();
        return $dendatelat;
        // return view('bos.datapinjam.print', compact('dendatelat'));
    }

// Cetak Hilang
    public function printilang($id)
    {
        $dendahilang = DB::table('anggotas')
                        ->join('transakses','anggotas.id','=','transakses.agt_id')
                        ->join('users','transakses.user_id','=','users.id')
                        ->join('details','transakses.id','=','details.trans_id')
                        ->join('bukus','details.buku_id','=','bukus.id')
                        ->where('transakses.id','=', $id)
                        ->select(
                                'transakses.kdtrans',
                                'transakses.tglpjm',
                                'transakses.tglkmb',
                                'transakses.user_id',
                                'anggotas.kd_agt',
                                'anggotas.nm_agt',
                                'bukus.kode_b',
                                'bukus.judul')
                        ->get();
        // return $dendahilang;
        // return view('bos.datapinjam.print', compact('dendahilang'));
    }

// cetak Trans
    public function printtrans($id)
    {
        // return $id;
        $buktipinjam = DB::table('anggotas')
                        ->join('transakses','anggotas.id','=','transakses.agt_id')
                        ->join('users','transakses.user_id','=','users.id')
                        ->join('details','transakses.id','=','details.trans_id')
                        ->join('bukus','details.buku_id','=','bukus.id')
                        ->where('transakses.id','=', $id)
                        ->select(
                                'transakses.kdtrans',
                                'transakses.tglpjm',
                                'transakses.tglkmb',
                                'transakses.user_id',
                                'anggotas.kd_agt',
                                'anggotas.nm_agt',
                                'bukus.kode_b',
                                'bukus.judul')
                        ->get();
        // return $buktipinjam;
        return view('bos.datapinjam.print', compact('buktipinjam'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
