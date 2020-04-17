<?php

namespace App\Http\Controllers;
use App\rating;
use App\ta_detailorder;
use App\ta_produk;
use DB;
use Illuminate\Http\Request;

class ratingController extends Controller
{
    public function ratingPedagang (Request $request){

		$rating = new rating;

		$rating->id_user 	= $request->id_user;
		$rating->id_penjual = $request->id_penjual;
		$rating->idDetail  = $request->idDetail;
		$rating->rating     = $request->rating;
		$rating->save();
    }
}
