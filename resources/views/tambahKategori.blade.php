<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<h1>Tambah Kategori Makanan</h1> 

<div class="col-sm-3">
      Kategori Yang Sudah ada : <select class="form-control">
            @foreach ($ta_kateg as $k)
                <option value="{{ $k->Pkategid }}">{{ $k->namakateg }}</value><br/>
            @endforeach
        </select>
     </div>
	 
	<form action="{{ url ('prosesTambahKategori') }}" method="POST">
			{{ @csrf_field() }} 
		<div class="col-sm-3">
			Kategori Makanan : <input type="text" class="form-control" name="namakateg"><br/></div>
				<button type="submit" class="btn btn-danger" value="Simpan Kategori">Simpan Kategori</button>