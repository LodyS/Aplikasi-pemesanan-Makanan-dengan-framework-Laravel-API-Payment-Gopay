<template>
	<h1>Transaksi Makanan</h1>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
			<table class="table table-hover">
				<tr>
					<th>No Transaksi</th>
					<th>Nama Pembeli</th>
					<th>Nama Makanan</th>
					<th>Jumlah Pesanan</th>
					<th>Total Pembayaran</th>
					<th>Status Pembayaran</th>
					<th>Status Pengiriman</th>
					<th>Tanggal Pesan</th>
				</tr>
					@foreach($ta_detailorder as $order)
				<tr>
					<td>{{ $order->idDetail }}</td>
					<td>{{ $order->name }}</td>
					<td>{{ $order->Pnama }}</td>
					<td>{{ $order->detailJml }}</td>
					<td>Rp. {{ number_format($order->total) }}</td>
					<td>{{ $order->statusPembayaran }}</td>
					<td>{{ $order->statusPengiriman }}</td>
					<td>{{ $order->tanggal }}</td>
				@endforeach
			</table>
	</template>