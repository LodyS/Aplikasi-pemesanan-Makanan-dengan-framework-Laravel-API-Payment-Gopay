<?php

namespace App\Http\Controllers;
use App\ta_order;
use Illuminate\Http\Request;
use DB;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use Midtrans;
include 'Midtrans.php';
use Illuminate\Support\Facades\Mail;
use App\Mail\warungKuEmail;

\Midtrans\Config::$serverKey = "Mid-server-xG8h6Zlt6uIV_VFoVYnRF33n"; //server key midtrans production
\Midtrans\Config::$isSanitized = true;
\Midtrans\Config::$isProduction = true; // menandakan sebagai versi production
\Midtrans\Config::$is3ds = true;

class orderPesananController extends Controller
{
    public function prosesBelanja (Request $request) {
	
		$prosesBelanja = new ta_order;

		$prosesBelanja->id_user         = $request->id_user;
		$prosesBelanja->produkID        = $request->produkID;
		$prosesBelanja->jmlOrder        = $request->jmlOrder;
		$prosesBelanja->alamat          = $request->alamat;
		$prosesBelanja->orderStatus     = $request->orderStatus;
		$prosesBelanja->save(); // menyimpan data ke daftar belanjaan

		$ta_order = DB::table('orderpesanan')
				->join ('users', 'users.id', '=', 'orderpesanan.id_user')
				->join ('ta_produk', 'ta_produk.produkID', '=', 'orderpesanan.produkID')
				->select ('ta_produk.Pnama', 'ta_produk.Pharga', 'users.name', 'users.email', 'users.no_hp', 'id_order', 'users.id',
				'orderpesanan.alamat','orderpesanan.produkID','jmlOrder', 'orderStatus', DB::RAW('ta_produk.Pharga * jmlOrder as total'))
                ->where('orderpesanan.id_user', $request->id_user)
				->whereNotIn('id_order', DB::table('ta_detailorder')->select ('id_order'))
				->latest()->first();
				
				$transaction = array(
					'transaction_details' => array(
									'order_id'      => $ta_order->id_order,
									'gross_amount'  => $ta_order->total,
					),
					'customer_details' => array(
							'first_name' => $request->name,
							'email'		 => $ta_order->email,
							'phone'		 => $ta_order->no_hp,
							'address'	 => $ta_order->alamat, // belum berhasil masuk
							)
					); // data yang di kirim ke midtrans
				
				$snapToken = \Midtrans\Snap::getSnapToken($transaction);
				 // mendapatkan Snaptoken agar tampilan api payment gopay berfungsi
				
		return view ('keranjangBelanja', ['ta_order'=>$ta_order, 'snapToken'=>$snapToken]);	
    }
    
    public function keranjangBelanja (Request $request, $id_user){

		$ta_order = DB::table('orderpesanan')
			->join ('users', 'users.id', '=', 'orderpesanan.id_user')
			->join ('ta_produk', 'ta_produk.produkID', '=', 'orderpesanan.produkID')
			->select ('ta_produk.Pnama', 'ta_produk.Pharga', 'users.name', 'id_order', 'orderpesanan.produkID',
			'orderpesanan.produkID','jmlOrder', 'orderpesanan.alamat', 'orderStatus', DB::RAW('ta_produk.Pharga * jmlOrder as total'))
			->where('orderpesanan.id_user', $id_user)
			->whereNotIn('id_order', DB::table('ta_detailorder')->select ('id_order'))
			->get();

		return view ('keranjangBelanjaCash', ['ta_order'=>$ta_order]);
	}
}