<template>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<table class="table table-hover">
			<tr>
				<th>Nama Penjual & Pembeli</th>
				<th>E-mail</th>
				<th>Nama Toko Makanan</th>
				<th>Status</th>
				<th>Update</th>
			</tr>
				@foreach($users as $u)
			<tr>
				<td>{{ $u->name }}</td>
				<td>{{ $u->email }}</td>
				<td>{{ $u->nama_toko }}</td>
				<td>Aktif</td>
					<input type="hidden" name="id" value="{{$id = Auth::user()->id}}">
				<td><a href="updateProfil/{{$id}}">Update</a></td>
			</tr>
	@endforeach
</template>
	
	