<template>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

 @if (isset(Auth::user()->name)) 
    <h2>Selamat datang : {{ Auth::user()->name }} </h2>
        <p>Makanan yang dipesan : {{ $ta_produk->Pnama}}</p><br/>
		<p>Makanan yang dipesan di toko : {{ $ta_produk->nama_toko }}</p><br/>
		<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ $ta_produk->nama_toko }}</div>

                <div class="card-body">
                   <div class="alert alert-success" role="alert">
                      </div>
                   
		<div class="row row-cols-7 row-cols-md-7">
  <div class="col mb-10">
    <div class="card bg-light mb-7">
      <img src="{{ url('foto/'. $ta_produk->Pgmb) }}" class="card-img-top" wdith="80">
      <div class="card-body">
        <h5 class="card-title">Keterangan</h5>
        <p class="card-text">{{ $ta_produk->Pdesk }}</p>
      </div>

  	       <form action="{{ url('prosesBelanja') }}" method="POST">
	          {{ @csrf_field() }}
	            <input type="hidden" name="id_user" value="{{ Auth::user()->id  }}"><br/>
              <input type="hidden" name="name" value="{{ Auth::user()->name  }}"><br/>
	            <input type="hidden" name="produkID" value="{{ $ta_produk->produkID}}" readonly><br/>
     		<div class="col-sm-30">
					 Jumlah Order  : <input type="number" class="form-control" name="jmlOrder"><br/></div>
			<div class="col-sm-30">
	 				Alamat        : <textarea rows="4" cols="20" class="form-control" name="alamat"></textarea><br/>
					</div>
			<input type="hidden"  name="orderStatus" value="Diproses"><br/>
	  <button type="submit" class="btn btn-danger" value="Simpan">Masukkan ke keranjang belanja</button>
</form>   
</div>
            </div>
        </div>
    </div>
</div>
  @else
  {{ 'Anda Harus Login'}}
     @include ('auth/login')
        @endif
</template>