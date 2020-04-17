<template>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('js/jquery-3.4.1.min.js')}}" rel="stylesheet">

    <div class="container">
		<table class="table table-hover">
		   <thead>
		      <tr>
			     <th>Nama Makanan</th>
				   <th>Harga</th>
			  </tr>

			@foreach ($ta_produk as $produk)
      <tr>
         <td>{{ $produk->Pnama }}</td>
         <td>{{ $produk->Pharga }}</td>
      </tr>
         @endforeach
 </template>