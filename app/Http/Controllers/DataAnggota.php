<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anggotas;
use Carbon\Carbon;

class DataAnggota extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data_anggota= Anggotas::all();
        return view('bos.dataanggota.Allanggota',compact('data_anggota'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View ('bos.dataanggota.Addanggota');
    }


    public function store(Request $request)
    {
        // // return $request->all();
        
        $anggota = new Anggotas();

        $dfr= Carbon::now()->format('d/m/Y');
        
        $complit =$request->kd_agt."-".$dfr;

        //// return $complit;
        // $anggota->kd_agt        =$complit."/".$aid;
        $anggota->nm_agt        =$request->nm_agt;
        $anggota->alamat_agt    =$request->alamat_agt;
        $anggota->hp            =$request->hp;

        //Prosess updae file
        $gbr =$request->file('img_agt');
        $ext = $gbr->getClientOriginalExtension();
        $imgang = $request->nm_agt.".".$ext;

        $anggota->img_agt =$imgang;

        $anggota->save();
        $aid=$anggota->id;
        $anggota->kd_agt        =$complit."/".$aid;
        
        $anggota->save();
        

         //upload fotobuku
         $gbr->move('profiles', $imgang);

         return redirect('dataanggota');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
