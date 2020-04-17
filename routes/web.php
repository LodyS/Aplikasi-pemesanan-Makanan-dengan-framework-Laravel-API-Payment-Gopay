<?php
use App\ta_produk;

Route::get('/', function () {

        $ta_produk = ta_produk::all();
        
    return view('welcome', ['ta_produk'=>$ta_produk]);
});

/*Route::get('/', function () {
    return view('auth/login');
});*/


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home'); //menampilkan halaman utama

//controller ta_produk
Route::get('daftarMenu', 'ta_produkController@daftarMenu');
Route::get('daganganKu/{id}', 'ta_produkController@daganganKu');
Route::get('carimakanan', 'ta_produkController@carimakanan');
Route::get('daganganKu/edit/{produkID}', 'ta_produkController@edit');
Route::get('daganganKu/hapusMakananKu/{produkID}', 'ta_produkController@hapusMakananKu');
Route::get('daganganKu/tambahMakanan/{id}', 'ta_produkController@tambahMakanan');
Route::get('belanja/{produkID}', 'ta_produkController@belanja');
// akhir ta_produk //

//controller orderPesanan//
Route::get('keranjangBelanja/{id}', 'orderPesananController@keranjangBelanja');
Route::get('keranjangBelanjaCash/{id}', 'orderPesananController@keranjangBelanja');
// akhir orderPesanan //


//controller ta_detailOrder//
Route::get('transaksiMakanan/{id}', 'ta_detailOrderController@transaksiMakanan');
Route::get('daganganKu/transaksiSelesai/{id}', 'ta_detailOrderController@transaksiSelesai');
Route::get('daganganKu/makananLaku/{id}', 'ta_detailOrderController@makananLaku');
Route::get('transaksiMakanan/updateTransaksi/{idDetail}', 'ta_detailOrderController@updateTransaksi');
Route::get('transaksiSelesai/{id}', 'ta_detailOrderController@transaksiSelesai');
// akhir ta_detailOrder //

//controller ta_kateg//
//Route::get('tambahMakanan/{id}', 'ta_kategController@tambahMakanan');

Route::get('belanja/{produkID}', 'ta_produkController@belanja');


Route::get('hapusItem/{produkID}', 'penggunaController@hapusItem');
Route::get('cariMakanan', 'penggunaController@cariMakanan');
Route::get('cariMakanan/{cariMakanan}', 'penggunaController@cariMakanan');

//Route admin
Route::get('loginAdmin', 'AdminController@loginAdmin');
Route::get('daftarAdmin', 'AdminController@daftarAdmin');
Route::get('HalamanAdmin', 'AdminController@halamanAdmin');
Route::get('tambahKategori', 'AdminController@tambahKategori');

//Route User
Route::get('profil/{id}', 'userController@halamanProfil');
Route::get('profil/updateProfil/{id}', 'userController@updateProfil');
//--------------------------------------------------------Method Post-----------------------------------//

//controller orderpesanan
Route::post('prosesBelanja', 'orderPesananController@prosesBelanja');

//controller ta_detailOrder 
Route::post('beliMakanan', 'ta_detailOrderController@beliMakanan');
Route::post('prosesUpdateTransaksi', 'ta_detailOrderController@prosesUpdateTransaksi');

//controller ta_produk
Route::post('prosesTambahMakanan', 'ta_produkController@prosesTambahMakanan');
Route::post('updateMakanan', 'ta_produkController@updateMakanan');
Route::post('hapusMakanan', 'ta_produkController@hapusMakanan');
//file akhir route ta_produk

//controller Admin

Route::post('simpanAdmin', 'AdminController@simpanAdmin');
Route::post('adminMasuk', 'AdminController@adminMasuk');
Route::post('prosesTambahKategori', 'AdminController@prosesTambahKategori');

//controller user
Route::post('prosesUpdateProfil', 'userController@prosesUpdateProfil');

//pengguna
Route::post('cariMakanan', 'penggunaController@cariMakanan');
Route::post('ratingPedagang', 'ratingController@ratingPedagang');
Route::get('belanja/{produkID}', 'penggunaController@belanja');