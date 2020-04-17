<?php

namespace App\Http\Controllers;
use App\User;
use App\ta_produk;
use DB;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function halamanProfil (){
        
        $id = Auth::user()->id;
        $users = user::where('id', '=', $id)->get();

        return view('profil', ['users' => $users]);
    }

    public function updateProfil (){
        
        $id = Auth::user()->id;
        $users = user::where('id', '=', $id)->get();

        return view('updateProfil', ['users' => $users]);
    }

    public function prosesUpdateProfil (Request $request){

       $users = DB::table('users')->where('id', $request->id)->update([
            'name'   => $request->name,
            'nama_toko'  => $request->nama_toko,
            'no_hp'    => $request->no_hp,
            'alamat'  => $request->alamat
            ]);

            $id= Auth::user()->id;
            $ta_produk = ta_produk::where('id_user', '<>', $id)->get();

            return view ('home', ['ta_produk' => $ta_produk] );
    }
}
