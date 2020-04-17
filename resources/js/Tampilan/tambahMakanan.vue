<template>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<h2>Selamat datang : {{ Auth::user()->name }} </h2>
				<h3>Tambah Makanan</h3>
					<form action="{{ url('prosesTambahMakanan')}}" method="post" enctype="multipart/form-data">
						{{ @csrf_field() }}
						<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
							<div class="col-sm-3">
								Nama : <input type="text" class="form-control" name="Pnama"><br/>
						</div>

							<div class="col-sm-3">
								Harga : <input type="number" class="form-control" name="Pharga"><br/>
						</div>

				<div class="col-sm-3">
						Kategori : <select class="form-control" name="Pkategid">
            @foreach ($ta_kateg as $k)
                <option value="{{ $k->Pkategid }}">{{ $k->namakateg }}</value><br/>
            @endforeach
        </select>
     </div>

				<div class="col-sm-3">
	 				Keterangan      : <textarea rows="4" cols="20" class="form-control" name="keterangan"></textarea><br/>
					</div>

     <div class="col-sm-3">
       Foto    : <input type="file" name="Pgmb"></br><br/>
     </div>

					<div class="col-sm-3">
						<button type="submit" class="btn btn-danger" value="Tambah">Simpan</button>
				</div>
		  </form>     
</template>  