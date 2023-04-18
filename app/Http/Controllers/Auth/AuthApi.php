<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// add use
use App\User;
use App\Buku;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

use App\oauth_access_tokens;

class AuthApi extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $dtlogin = $request->only('email', 'password');
        if(!Auth::attempt($dtlogin)){
            return response()->json(['msg' => 'Login Gagal']);
        }
        $user = $request->user();
        $gaweToken = $user->createToken('Personal Access Token');
        $token = $gaweToken->token;
        $token->save();

        return response()->json([
            'access_token' => $gaweToken->accessToken,
            'token_type'   => 'Bearer',
            'expired_at'   => Carbon::parse(Carbon::now()->addWeek(1))->toDateTimeString()
        ]);
    }

    function register(Request $request)
    {
       $request->validate([
            'nama'      =>  'required|string',
            'email'     =>  'required|string|email|unique:users',
            'password'  =>  'required|string'
       ]);

       $user    = new User;
       $user->name      =   $request->nama;
       $user->email     =   $request->email;
       $user->password  =   bcrypt($request->password);
       $user->save();

       return response()->json(['msg' => 'Register Sukses']);
    }

    // versi class
    function logout (Request $request)
    {
        $request->user()->token()->revoke();
        // $request->user()->$token;
        // return $request;
        return response()->json([
            'msg' => 'Logout Success'
        ]);
    }

    function imguser(Request $request)
    {
        $request->validate([
            'imguser'  =>  'required|string'
       ]);
            $inputbuku = new User();
            $gbr = $request->file('imguser');
            $ext = $gbr->getClientOriginalExtension();
            $nmfilebaru = $gbr.".".$ext;
                $inputbuku->imgbuku  = $nmfilebaru ;
                $inputbuku->save();
             //upload fotobuku
            $gbr->move('imguser', $ext);

            return response()->json(['msg' => 'UPload Sukses']);


    }


    // me Version
    // function logout(Request $request)
    // {
    //     $user_id = $request->userid;
    //     ATM::where('user_id', '=', $user_id)
    //         ->where('revoked', '=', 0)
    //         ->update(['revoked' => 1]);
    //     return response()->json([
    //         'msg' => 'Logout Success'
    //     ]);
    // }


    function user(Request $request)
    {
       return response()->json($request->user());
    }

    function buku()
    {
        // return "janjosss";
         $data_buku= Buku::all();
       return response()->json($data_buku);
    }

    function addbuku(Request $request)
    {
       $total = $request->jml;
    //    return $grand;
        if ($total > 1)
        {
           for ($i=1; $i < $total ; $i++)
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

               return response()->json(['msg' => 'simpan Sukses']);
           }
        }
    }



    //
}
