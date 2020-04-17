<template>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<form action="{{ url('prosesUpdateProfil') }}" method="POST"> 
					{{ @csrf_field() }}
						@foreach($users as $u)

			<h1>Update Profil {{ $u->name}}</h1>

	 <div class="col-sm-3">
	 <input type="hidden" name="id" value="{{$id = Auth::user()->id}}">
	    Nama : <input type="text" name="name" class="form-control" value="{{ $u->name }}"></br></div>
		
		<div class="col-sm-3">
		Nama Toko : <input type="text" name="nama_toko" class="form-control"><br/></div>

		<div class="col-sm-3">
		No HP : <input type="text" name="no_hp" class="form-control" value="{{ $u->no_hp}}"><br/></div>

		<div class="col-sm-3">
		Alamat : <input type="text" name="alamat" class="form-control" value="{{ $u->alamat }}"><br/></div>
	
		<div class="col-sm-3">   
                <button type="submit" class="btn btn-danger" value="Edit">Edit</button>
            </div>
        </form>
	@endforeach
</template>