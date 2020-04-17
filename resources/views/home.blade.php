@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Selamat datang</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 <table class="table table-hover">
	<tr>
		<th>Produk makanan saya</th>
		<th>Makanan Belanjaan saya</th>
		<th>Makanan Yang di Beli Pelanggan</th>
		<th>Transaksi Yang Selesai</th>
	    <th>Update Profil</th>
	</tr>
		<tr>
		  <input type="hidden" value="{{$id = Auth::user()->id}}">
			<td><a href="daganganKu/{{$id}}">Makanan saya</a></td>
			<td><a href="keranjangBelanjaCash/{{$id}}">Keranjang saya</a></td>
			<td><a href="transaksiMakanan/{{$id}}">Transaksi Makanan</a></td>
			<td><a href="transaksiSelesai/{{$id}}">Transaksi Yang Selesai</a></td>
            <td><a href="profil/{{$id}}">Profil</a></td>
		</tr>
<hr/>
<form action="cariMakanan" method="get">
<input class="form-control" id="cariMakanan" type="search" placeholder="Cari Makanan" aria-label="Cari Makanan">
<button type="submit" class="btn btn-danger">Cari Makanan</button><br/>
	<h2>Daftar Menu</h2>
		<table class="table table-success">
     <tr>
		<th>Foto</th>
	    <th>Nama</th>
	    <th>Harga</th>
	 	<th>Belanja</th>
	</tr>
	@foreach ($ta_produk as $p)
	  <tr>
	  <td><img src="{{ url('foto/'.$p->Pgmb) }}" width="100"></td>
	   <input type="hidden" value="{{ $p->produkID}}"></td>
	   <td>{{ $p->Pnama }}</td>
	   <td>Rp. {{ number_format($p->Pharga)}}</td>
	   <td><a href="belanja/{{ $p->produkID }}">Belanja</a></td>
	 </tr>
	 @endforeach
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection