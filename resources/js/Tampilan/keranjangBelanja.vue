<template>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-0JQTLSiNucLTTfQJ"></script>
<h2>Keranjang Belanja {{ Auth::user()->name }}</h2>
<!--{{$snapToken}}-->
<table class="table table-hover">
   <tr>
     <th>ID Order</th>
     <th>Pesanan</th>
     <th>Nama Pemesan</th>
     <th>Jumlah Order</th>
     <th>Total tagihan</th>
     <th>Alamat</th>
     <th>Status Pesanan</th>
     <th>Bayar Pakai GoPay</th>
     <th>Bayar Cash</th>
    </tr>
     <!-- <form action="{{ url('beliMakanan') }}" method="POST">!-->
            {{ @csrf_field() }} 
        
         <tr>
            <td>{{ $ta_order->id_order}}</td>
            <td>{{ $ta_order->Pnama }}</td>
            <td>{{ $ta_order->name }}</td>
            <td>{{ $ta_order->jmlOrder }}</td>
            <td>Rp. {{ number_format($ta_order->total) }}</td>
            <td>{{ $ta_order->alamat }}</td>
            <td>{{ $ta_order->orderStatus }}</td>
            <input type="hidden" name="id_order" value="{{ $ta_order->id_order }}">
            <input type="hidden" name="produkID" value="{{ $ta_order->produkID }}">
            <input type="hidden" name="detailJml" value="{{ $ta_order->jmlOrder }}">
            <input type="hidden" name="statusPembayaran" value="Bayar Pakai Go Pay">
            <input type="hidden" name="statusPengiriman" value="Akan dikirim">
            <td><button type="submit" id="pay" class="btn btn-danger">Go Pay</button></td>
        </form>
		
        <form action="{{ url('beliMakanan') }}" method="POST">
			{{ @csrf_field() }} <!-- Wajib jika isi data-->
        <input type="hidden" name="id_order" value="{{ $ta_order->id_order }}">
            <input type="hidden" name="produkID" value="{{ $ta_order->produkID }}">
            <input type="hidden" name="detailJml" value="{{ $ta_order->jmlOrder }}">
            <input type="hidden" name="statusPembayaran" value="Belum Bayar">
            <input type="hidden" name="statusPengiriman" value="Akan dikirim">
			<input type="hidden" name="metodePembayaran" value="Bayar cash">
				<td><button type="submit" id="pay" class="btn btn-danger">Cash</button></td>
        </form>
        </tr>
   </table>

   <script type="text/javascript">
      var payButton = document.getElementById('pay');
      payButton.addEventListener('click', function () {
        snap.pay( '{{$snapToken}}' );
      });
    </script>
</html>
</template>