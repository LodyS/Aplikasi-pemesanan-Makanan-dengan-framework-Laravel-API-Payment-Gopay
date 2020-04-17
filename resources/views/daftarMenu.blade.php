<h3>Selamat datang : {{  session::get('email') }}</h3>
<table border="1">
  <tr>
	 <th>Nama</th>
	 <th>Harga</th>
	 <th>Stok</th>
	</tr>
	@foreach( $ta_produk as $produk)
	  <tr>
	   <td>{{ $produk->Pnama }}</td>
	   <td>{{ $produk->Pharga}}</td>
	   <td>{{ $produk->pstok}}</td>
	 </tr>
	 @endforeach
</table>