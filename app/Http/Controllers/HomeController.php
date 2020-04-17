<?php

namespace App\Http\Controllers;
use App\ta_produk;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function __construct()
    {
		$this->middleware(['auth', 'verified']);
    }

    public function index()
    {
		$id= Auth::user()->id;
		$ta_produk = ta_produk::where('id_user', '<>', $id)->get();
		
        return view('home', ['ta_produk' => $ta_produk]);
    }
}