<?php

namespace App\Http\Controllers;
use App\ta_kateg;
use DB;
use Illuminate\Http\Request;

class ta_kategController extends Controller
{
    public function tambahMakanan (Request $request, $id_user){

		$session_email = $request->session()->get('email');
		$id_user = $request->id_user;

		//$users = users::where('id_user', $id_user)->first();
		$ta_kateg= ta_kateg::all();

		return view ('tambahMakanan', ['ta_kateg'=>$ta_kateg]);
}
}