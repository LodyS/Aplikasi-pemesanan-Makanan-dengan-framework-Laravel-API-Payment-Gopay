<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pengguna;
use App\ta_produk;
use App\ta_detailorder;
use App\ta_order;
use App\ta_kateg;
use App\rating;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Session;
use Session;

class penggunaController extends Controller
{

	public function index(Request $request){
       
			$ta_produk = ta_produk::where('id_user', '<>', session::get('id_user'))->get(); // jika session login
			//ada maka tampilkan item produk yang bukan milik akun user yang login yang ditampilkan pada view akunUser
			   return view('akunUser', ['ta_produk' => $ta_produk]);
		} 
	

	public function pembeliPenjual (Request $request){
		
		$email    = $request->email;
		$password = $request->password;
		$Ufnama   = $request->Ufnama;
		
		$pengguna = Pengguna::where('email', $email)->first(); 
		//ambil data email dari request login
		
		$Ufnama = DB::table('users')
							->select('Ufnama')
							->where('email', '=', $email)
							->first();
		
				
		return redirect ('akunUser');
			} 
	

	public function belanja (Request $request, $produkID){

	  $session_email = $request->session()->get('email');// untuk mengambil session 
	  
	  $ta_produk = ta_produk::where('produkID', $request->produkID)->first(); 
	 // untuk seleksi produk sesuai id yang dipilih
		
		return view ('belanja', ['ta_produk'=>$ta_produk]);
}

	public function prosesBelanja (Request $request) {
	
		$prosesBelanja = new ta_order;

		$prosesBelanja->id_user         = $request->id_user;
		$prosesBelanja->produkID        = $request->produkID;
		$prosesBelanja->jmlOrder        = $request->jmlOrder;
		$prosesBelanja->almtOrder       = $request->almtOrder;
		$prosesBelanja->orderStatus     = $request->orderStatus;
		$prosesBelanja->save();

		$ta_order = DB::table('orderpesanan')
				->join ('users', 'users.id_user', '=', 'orderpesanan.id_user')
				->join ('ta_produk', 'ta_produk.produkID', '=', 'orderpesanan.produkID')
				->select ('ta_produk.Pnama', 'ta_produk.Pharga', 'users.Ufnama', 'id_order', 'users.id_user',
				'orderpesanan.produkID','jmlOrder', 'almtOrder', 'orderStatus', DB::RAW('ta_produk.Pharga * jmlOrder as total'))
				->where('orderpesanan.id_user', $request->id_user)->get();

		return view ('keranjangBelanja', ['ta_order'=>$ta_order]);
	    
	}

	public function keranjangBelanja (Request $request, $id_user){

		$ta_order = DB::table('orderpesanan')
			->join ('users', 'users.id_user', '=', 'orderpesanan.id_user')
			->join ('ta_produk', 'ta_produk.produkID', '=', 'orderpesanan.produkID')
			->select ('ta_produk.Pnama', 'ta_produk.Pharga', 'users.Ufnama', 'id_order', 'orderpesanan.produkID',
			'orderpesanan.produkID','jmlOrder', 'almtOrder', 'orderStatus', DB::RAW('ta_produk.Pharga * jmlOrder as total'))
			->where('orderpesanan.id_user', $id_user)
			->whereNotIn('id_order', DB::table('ta_detailorder')->select ('id_order'))
			->get();

		return view ('keranjangBelanja', ['ta_order'=>$ta_order]);
		
	}

	public function daganganKu (Request $request, $id_user){
		
		$session_email = $request->session()->get('email');

		$email    = $request->email;
		$id_user  = $request->id_user;

		$pengguna = Pengguna::where('email', $email)->first();

		$ta_produk = ta_produk::where('id_user', $id_user)->get();

		return view ('daganganKu', ['ta_produk'=>$ta_produk]);
	   
	}	
	
	/*public function tambahMakanan (Request $request, $id_user){

		$session_email = $request->session()->get('email');
		$id_user = $request->id_user;

		$pengguna = Pengguna::where('id_user', $id_user)->first();
		$ta_kateg= ta_kateg::all();

		return view ('tambahMakanan', ['ta_kateg'=>$ta_kateg]);
	}	*/

	public function prosesTambahMakanan (Request $request){
		
		$tambahFoto = $request->file('Pgmb');
		$fotoBaru  = rand() . '.' . $tambahFoto->getClientOriginalExtension();
		$tambahFoto->move(public_path('foto'), $fotoBaru);

		$tambahMakanan = new ta_produk;

		$tambahMakanan->id_user  = $request->id_user;
		$tambahMakanan->Pnama    = $request->Pnama;
		$tambahMakanan->Pharga   = $request->Pharga;
		$tambahMakanan->Pgmb     = $fotoBaru;
		$tambahMakanan->Pkategid = $request->Pkategid;
		$tambahMakanan->Pstok    = $request->Pstok;
		$tambahMakanan->save();

		return redirect ('/akunUser');
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

	  public function beliMakanan (Request $request){

			$beliMakanan = new ta_detailorder;

			$beliMakanan->id_order          = $request->id_order;
			$beliMakanan->statusPembayaran  = $request->statusPembayaran;
			$beliMakanan->statusPengiriman  = $request->statusPengiriman;
			$beliMakanan->detailJml         = $request->detailJml;
			$beliMakanan->save();

			return redirect('akunUser');
	  }

	  public function transaksiMakanan (Request $request){

			$id_user = $request->id_user;
		$ta_detailorder = DB::table('ta_detailorder')
							->join('orderpesanan', 'orderpesanan.id_order','=','ta_detailorder.id_order')
							->join ('ta_produk', 'ta_produk.produkID','=', 'orderpesanan.produkID')
							->join ('users', 'users.id_user', '=', 'orderpesanan.id_user')
							->select('idDetail', 'ta_detailorder.id_order', 'users.Ufnama', 'ta_produk.Pnama',
							'statusPembayaran', 'statusPengiriman', 'detailJml', 'ta_detailorder.tanggal',
							DB::raw('ta_produk.Pharga * detailJml as total'))
							->where('ta_produk.id_user', $id_user)
							->get();
                     
		return view ('transaksiMakanan', ['ta_detailorder'=>$ta_detailorder]);
	  
   }

	  public function updateTransaksi (Request $request){
	  
	  $ta_detailorder = ta_detailorder::where('idDetail', $request->idDetail)->get();

	  return view ('updateTransaksi', ['ta_detailorder'=>$ta_detailorder]);
		}
   

      public function prosesUpdateTransaksi (Request $request){
	
		DB::table('ta_detailorder')->where('idDetail', $request->idDetail)->update([
			'statusPembayaran'   => $request->statusPembayaran,
			'statusPengiriman'   => $request->statusPengiriman]);
        
			$ta_detailorder = ta_detailorder::where('idDetail', $request->idDetail)->get();

		return view ('transaksiMakanan', ['ta_detailorder'=>$ta_detailorder]);
		
	}
	
	public function makananLaku (Request $request){
        
		$id_user = $request->id_user;
		$ta_detailorder = DB::table('ta_detailorder')
							->join('orderpesanan', 'orderpesanan.id_order','=','ta_detailorder.id_order')
							->join ('ta_produk', 'ta_produk.produkID','=', 'orderpesanan.produkID')
							->join ('users', 'users.id_user', '=', 'orderpesanan.id_user')
							->select('idDetail', 'ta_detailorder.id_order', 'users.Ufnama', 'ta_produk.Pnama',
							'statusPembayaran', 'statusPengiriman', 'detailJml', 'ta_detailorder.tanggal',
							DB::raw('ta_produk.Pharga * detailJml as total'))
							->where('ta_produk.id_user', $id_user)
							->where('statusPembayaran', 'Sudah Bayar')
							->get();

			return view('makananLaku', ['ta_detailorder'=>$ta_detailorder]);
	}

	public function transaksiSelesai (Request $request){
		 
		$ta_detailorder = DB::table('ta_detailorder')
						 ->join('orderpesanan', 'orderpesanan.id_order', '=', 'ta_detailorder.id_order')
						 ->join('ta_produk', 'ta_produk.produkID', '=', 'orderpesanan.produkID')
						 ->join('users', 'users.id_user', '=', 'ta_produk.id_user')
						 ->select('ta_detailorder.id_order', 'ta_produk.Pnama', 
						 'ta_produk.id_user as id_penjual', 'users.Ufnama',
						 'ta_detailorder.idDetail')
						->where('orderpesanan.id_user', $request->id_user)
						->get();

					return view('transaksiSelesai', ['ta_detailorder'=>$ta_detailorder]);
	}

	public function ratingPedagang (Request $request){

		$rating = new rating;

		$rating->id_user 	= $request->id_user;
		$rating->id_penjual = $request->id_penjual;
		$rating->idDetail   = $request->idDetail;
		$rating->rating     = $request->rating;
		$rating->save();

		return view ('akunUser');

	}
}