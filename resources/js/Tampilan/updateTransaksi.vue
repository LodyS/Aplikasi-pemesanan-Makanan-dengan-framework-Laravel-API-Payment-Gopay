<template>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<form action="{{ url('prosesUpdateTransaksi') }}" method="post">
			{{ @csrf_field() }}
				@foreach($ta_detailorder as $order)

   Nomor Transaksi : 
			<input type="hidden" name="id_order" value="{{$order->id_order}}">
			<input type="hidden" name="email" value="{{ $order->email }}">   
        <div class="col-sm-3">
        <input type="text"  class="form-control" name="idDetail" value="{{$order->idDetail}}" readonly><br/>
</div>

Status Pembayaran
<div class="col-sm-3">
    <select class="form-control" name="statusPembayaran">
        <option value="Sudah Bayar">Sudah Bayar</value><br/>
        <option value="Belum Bayar">Belum Bayar</value><br/></select>
</div><br/>

Status Pengiriman

<div class="col-sm-3">
    <select class="form-control" name="statusPengiriman">
        <option value="Sudah Diantar">Sudah Diantar</value><br/>
        <option value="Sudah Sampai tujuan">Sudah Sampai tujuan</value><br/></select>
</div><br/>


<div class="col-sm-3">

                <button type="submit" class="btn btn-danger" value="Edit">Edit</button>
            </div>
@endforeach
</form>
</template>