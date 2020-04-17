<?php

namespace App\Http\Controllers;
use DB;
use App\Admin;
Use App\ta_kateg;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class AdminController extends Controller
{
    public function loginAdmin (){

        return view ('loginAdmin');
    }

    public function daftarAdmin (){

        return view('daftarAdmin');
    }

    public function simpanAdmin (Request $request){
		//menambahkan data user
		$tambah = new Admin(); // Pengguna adalah nama model
        
        $tambah->nama_admin   = $request->nama_admin;
		$tambah->email        = $request->email;
		$tambah->password     = bcrypt($request->password);
		
		$tambah->save();

		return view ('loginAdmin');
    }
    
    public function halamanAdmin(Request $request){
       
        if(!Session::get('login')){ 
            return redirect('login')->with('alert', 'Harus login'); 
        } else {
			$users = user::all();
			
			   return view('HalamanAdmin', ['users' => $users]);
		} 
    }
    
    public function adminMasuk (Request $request){
		
		$email        = $request->email;
		$password     = $request->password;
		$nama_admin   = $request->nama_admin;
		
		$Admin = Admin::where('email', $email)->first(); 
		//ambil data email dari request login
		
		$nama_admin = DB::table('admin')
							->select('nama_admin')
							->where('email', '=', $email)
							->first();
		if ($Admin) {
			 if (Hash::check($password,  $Admin->password)){

				Session::put('email', $Admin->email);
				Session::put('id_admin', $Admin->id_admin);
				Session::put('password', $Admin->password);
				Session::put('nama_admin', $Admin->nama_admin);
				Session::put('login', TRUE);
				
		return redirect ('HalamanAdmin');
			} 
			else {
				return redirect('loginAdmin')->with('alert','Password atau Email, Salah !');
			}
	    }
	}

	public function tambahKategori (){

		if(!Session::get('login')){ 
            return redirect('login')->with('alert', 'Harus login'); 
        } else {

		$ta_kateg = ta_kateg::all();

		return view ('tambahKategori', ['ta_kateg'=>$ta_kateg]);
	}
  }

    public function prosesTambahKategori (Request $request){

		$tambah = new ta_kateg();

		$tambah->namakateg = $request->namakateg;
		$tambah->save();

		$users = user::all();

		return view ('halamanAdmin', ['users' => $users]);
	} 
}
