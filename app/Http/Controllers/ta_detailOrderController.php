<?php
namespace App\Mail;
//use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;
namespace App\Http\Controllers;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Message;
use DB;
use Illuminate\Http\Request;
use App\ta_detailorder;
use Auth;
use App\User;
use App\Model\Donation;
use App\Mail\warungKuEmail;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use Mail;

class ta_detailOrderController extends Controller
{
    public function beliMakanan (Request $request){

			$beliMakanan = new ta_detailorder;

			$beliMakanan->id_order          = $request->id_order;
			$beliMakanan->statusPembayaran  = $request->statusPembayaran;
			$beliMakanan->statusPengiriman  = $request->statusPengiriman;
			$beliMakanan->detailJml         = $request->detailJml;
			$beliMakanan->save();
	}

	  public function makananLaku (Request $request){
		$id =  Auth::user()->id; // untuk mendapatkan user id/session
		$id_user = $request->id_user;
		$ta_detailorder = DB::table('ta_detailorder')
							->join('orderpesanan', 'orderpesanan.id_order','=','ta_detailorder.id_order')
							->join ('ta_produk', 'ta_produk.produkID','=', 'orderpesanan.produkID')
							->join ('users', 'users.id', '=', 'orderpesanan.id_user')
							->select('idDetail', 'ta_detailorder.id_order', 'users.name', 'ta_produk.Pnama',
							'statusPembayaran', 'statusPengiriman', 'detailJml', 'ta_detailorder.tanggal',
							DB::raw('ta_produk.Pharga * detailJml as total'))
							->where('ta_produk.id_user', $id)
							->where('statusPembayaran', 'Sudah Bayar')
							->get();

			return view('makananLaku', ['ta_detailorder'=>$ta_detailorder]);
		}

	public function transaksiMakanan (Request $request, $id_user){
			//$id_user =  Auth::user()->id;
		$ta_detailorder = DB::table('ta_detailorder')
							->join('orderpesanan', 'orderpesanan.id_order','=','ta_detailorder.id_order')
							->join ('ta_produk', 'ta_produk.produkID','=', 'orderpesanan.produkID')
							->join ('users', 'users.id', '=', 'orderpesanan.id_user')
							->select('idDetail', 'ta_detailorder.id_order', 'users.name', 'users.email', 'ta_produk.Pnama',
							'statusPembayaran', 'statusPengiriman', 'detailJml', 'ta_detailorder.tanggal',
							DB::raw('ta_produk.Pharga * detailJml as total'))
							->where('ta_produk.id_user', '=', $id_user)
							->Where('statusPembayaran', '=', 'Belum Bayar')
							->get();
                     
		return view ('transaksiMakanan', ['ta_detailorder'=>$ta_detailorder]);  
   }
   
   public function transaksiSelesai (Request $request, $id_user){
   
	$id = Auth::user()->id;

	$ta_detailorder = DB::table('ta_detailorder')
					 ->join('orderpesanan', 'orderpesanan.id_order', '=', 'ta_detailorder.id_order')
					 ->join('ta_produk', 'ta_produk.produkID', '=', 'orderpesanan.produkID')
					 ->join('users', 'users.id', '=', 'ta_produk.id_user')
					 ->select('ta_detailorder.id_order', 'ta_produk.Pnama', 
					 'ta_produk.id_user as id_penjual', 'users.name',
					 'ta_detailorder.idDetail')
					->where('orderpesanan.id_user', $id)
					->get();

				return view('transaksiSelesai', ['ta_detailorder'=>$ta_detailorder]);
	}

	public function updateTransaksi (Request $request){
	  
	  $ta_detailorder = DB::table('ta_detailorder')
	  ->join('orderpesanan', 'orderpesanan.id_order', '=', 'ta_detailorder.id_order')
	  ->join('users', 'users.id', '=' , 'orderpesanan.id_user')
	  ->select('idDetail', 'ta_detailorder.id_order', 'statusPengiriman', 'statusPembayaran', 'users.email')
	  ->where('idDetail', $request->idDetail)->get();

	  return view ('updateTransaksi', ['ta_detailorder'=>$ta_detailorder]);
	}

		public function prosesUpdateTransaksi (Request $request){
			
			DB::table('ta_detailorder')->where('idDetail', $request->idDetail)->update([
				'statusPembayaran'   => $request->statusPembayaran,
				'statusPengiriman'   => $request->statusPengiriman]);

			$ta_detailorder = DB::table('ta_detailorder')
			->join('orderpesanan', 'orderpesanan.id_order', '=', 'ta_detailorder.id_order')
			->join('ta_produk', 'ta_produk.produkID',  '=', 'orderpesanan.produkID')
			->join('users', 'users.id',	'=', 'orderpesanan.id_user')
			->select('idDetail', 'users.name', 'users.email','ta_produk.Pnama', 'statusPembayaran', 'statusPengiriman', 
			'detailJml', 'ta_detailorder.tanggal',
			DB::RAW('ta_produk.Pharga * detailJml AS total'))
			->where('idDetail', $request->idDetail)->first();
			$email = $ta_detailorder->email;
			
			return view ('transaksiMakananSelesai', ['ta_detailorder'=>$ta_detailorder]);
	 }
	 
	 public function ratingPedagang (Request $request){

		$rating = new rating;

		$rating->id_user 	= $request->id_user;
		$rating->id_penjual = $request->id_penjual;
		$rating->idDetail  = $request->idDetail;
		$rating->rating     = $request->rating;
		$rating->save();

		return view ('akunUser');
	}
}