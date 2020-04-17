<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<h2>Keranjang Belanja {{ Auth::user()->name }}</h2>
<table class="table table-hover">
   <tr>
     <th>ID Order</th>
     <th>Pesanan</th>
     <th>Nama Pemesan</th>
     <th>Jumlah Order</th>
     <th>Total tagihan</th>
     <th>Alamat</th>
     <th>Status Pesanan</th>
     <th>Bayar Cash</th>
    </tr>
      <!--<form action="{{ url('beliMakanan') }}" method="POST">-->
            {{ @csrf_field() }} 
        @foreach ($ta_order as $order)
         <tr>
            <td>{{ $order->id_order}}</td>
            <td>{{ $order->Pnama }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->jmlOrder }}</td>
            <td>Rp. {{ number_format($order->total) }}</td>
            <td>{{ $order->alamat }}</td>
            <td>{{ $order->orderStatus }}</td>
            <input type="hidden" name="id_order" value="{{ $order->id_order }}">
            <input type="hidden" name="produkID" value="{{ $order->produkID }}">
            <input type="hidden" name="detailJml" value="{{ $order->jmlOrder }}">
            <input type="hidden" name="statusPengiriman" value="Akan dikirim">
        </form>
		
        <form action="{{ url('beliMakanan') }}" method="POST">
			{{ @csrf_field() }} <!-- Wajib jika isi data-->
        <input type="hidden" name="id_order" value="{{ $order->id_order }}">
            <input type="hidden" name="produkID" value="{{ $order->produkID }}">
            <input type="hidden" name="detailJml" value="{{ $order->jmlOrder }}">
            <input type="hidden" name="statusPembayaran" value="Belum Bayar">
            <input type="hidden" name="statusPengiriman" value="Akan dikirim">
			<input type="hidden" name="metodePembayaran" value="Bayar cash">
        </form>
        </tr>
   </table>
</html>
@endforeach