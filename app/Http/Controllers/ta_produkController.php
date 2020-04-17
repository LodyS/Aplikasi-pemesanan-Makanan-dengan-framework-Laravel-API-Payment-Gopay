<?php

namespace App\Http\Controllers;
use App\ta_produk;
use App\ta_kateg;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\rating;

class ta_produkController extends Controller
{

    public function daganganKu (Request $request){
		
		$id= Auth::user()->id;
		$ta_produk = ta_produk::where('id_user', '=', $id)->get();

		return view ('daganganKu', ['ta_produk'=>$ta_produk]);
    }
    
    public function belanja (Request $request, $produkID){

      $ta_produk = DB::table('ta_produk')
      ->join ('users', 'users.id', '=', 'ta_produk.id_user')
      ->select('Pnama', 'Pharga', 'Pdesk', 'Pgmb', 'Pkategid', 'users.nama_toko')
      ->where('produkID', $request->produkID)->first(); // untuk seleksi produk sesuai id yang dipilih

      $rating = DB::table ('rating')
                          ->join('ta_produk', 'ta_produk.id_user', '=', 'rating.id_penjual')
                          ->select(DB::RAW('substr(avg(rating),1,3 as rata'))
                          ->where('ta_produk.produkID', '=', $request->produkID)
                          ->get();

          return view ('belanja', ['ta_produk'=>$ta_produk], ['rating'=>$rating]);
  }

     public function edit (Request $request){
		
    $ta_produk = ta_produk::where('produkID', $request->produkID)->get();

    return view ('edit', ['ta_produk'=>$ta_produk]);
   }

     public function updateMakanan (Request $request){
    
    $tambahFoto = $request->file('Pgmb');
    $fotoBaru  = rand() . '.' . $tambahFoto->getClientOriginalExtension();
    $tambahFoto->move(public_path('foto'), $fotoBaru);
    
    DB::table('ta_produk')->where('produkID', $request->produkID)->update([
        'Pnama'   => $request->Pnama,
        'Pharga'  => $request->Pharga,
        'Pgmb'    => $fotoBaru]);
    
    $ta_produk = ta_produk::where('produkID', $request->produkID)->get();

    return view ('daganganKu', ['ta_produk'=>$ta_produk]);
    
  }

  public function tambahMakanan (Request $request){

    $ta_kateg= ta_kateg::all();

    return view ('tambahMakanan', ['ta_kateg'=>$ta_kateg]);
    }
	
    public function prosesTambahMakanan (Request $request){
		
		$tambahFoto = $request->file('Pgmb');
		$fotoBaru  = rand() . '.' . $tambahFoto->getClientOriginalExtension();
		$tambahFoto->move(public_path('foto'), $fotoBaru);

		$tambahMakanan = new ta_produk;

		$tambahMakanan->id_user    = $request->id_user;
		$tambahMakanan->Pnama      = $request->Pnama;
		$tambahMakanan->Pharga     = $request->Pharga;
		$tambahMakanan->Pgmb       = $fotoBaru;
		$tambahMakanan->keterangan = $request->keterangan;
		$tambahMakanan->Pkategid   = $request->Pkategid;
		$tambahMakanan->save();
    
    $id= Auth::user()->id;
		$ta_produk = ta_produk::where('id_user', '=', $id)->get();

		return view ('daganganKu', ['ta_produk'=>$ta_produk]);
    }

    public function hapusMakananKu (Request $request){

      $ta_produk = ta_produk::where('produkID', $request->produkID)->get();

       return view ('hapusMakananKu', ['ta_produk'=>$ta_produk]);
    }

    public function hapusMakanan(Request $request){
      // hapus file
      $produkID = $request->produkId;

      $ta_produk = DB::table('ta_produk')->where('produkID', '=', $request->produkID)->delete();

      $ta_produk = ta_produk::where('id_user', Auth::user()->id )->get();

    return view ('daganganKu', ['ta_produk'=>$ta_produk]);
    }
}