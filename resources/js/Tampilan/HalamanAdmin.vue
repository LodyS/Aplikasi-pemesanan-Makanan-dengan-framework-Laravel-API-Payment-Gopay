<template>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <table class="table table-hover">
	<tr>
		<th>Tambah Kategori</th>
	</tr>
		<tr>
			<td><a href="tambahKategori">Tambah Kategori</a></td>
		</tr>
	<table class="table table-hover">
	<tr>
	  <th>Nama Penjual & Pembeli</th>
	  <th>E-mail</th>
	  <th>Status</th>
	 </tr>
	 @foreach($users as $u)
	 <tr>
	    <td>{{ $u->name }}</td>
		<td>{{ $u->email }}</td>
		<td>Aktif</td>
	</tr>
	@endforeach
</template>