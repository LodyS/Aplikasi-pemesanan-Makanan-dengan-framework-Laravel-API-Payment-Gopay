<h1>Transaksi Makanan Yang sudah sampai ke customer</h1>
<h1>Warung : {{  Auth::user()->name  }}</h1>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <table class="table table-hover">
        <tr>
           <th>No Transaksi</th>
           <th>Nama Pembeli</th>
		   <th>Email</th>
           <th>Nama Makanan</th>
           <th>Jumlah Pesanan</th>
           <th>Total Pembayaran</th>
           <th>Status Pembayaran</th>
           <th>Status Pengiriman</th>
           <th>Tanggal Pesan</th>
         
        </tr>
         
        <tr>
           <td>{{ $ta_detailorder->idDetail }}</td>
           <td>{{ $ta_detailorder->name }}</td>
		   <td>{{ $ta_detailorder->email }}</td>
           <td>{{ $ta_detailorder->Pnama }}</td>
           <td>{{ $ta_detailorder->detailJml }}</td>
           <td>Rp. {{ number_format($ta_detailorder->total) }}</td>
           <td>{{ $ta_detailorder->statusPembayaran }}</td>
           <td>{{ $ta_detailorder->statusPengiriman }}</td>
           <td>{{ $ta_detailorder->tanggal }}</td>

        </tr> 
     
</table>