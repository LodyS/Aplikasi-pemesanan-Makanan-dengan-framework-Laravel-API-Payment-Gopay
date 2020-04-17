<template>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
</head>

<h3>Makanan yang sudah dibeli : {{  Auth::user()->name  }}</h3>
		<form action="{{ url ('ratingPedagang') }} " method="Post">
			{{ @csrf_field() }}
		<table class="table table-hover">
			<tr>
				<th>Id Order</th>
				<th>Nama Makanan</th>
				<th>Nama Penjual</th>
				<th>Beri Rating Penjual & Rasa Makanan</th>
				<th>Beri Rating</th>
			</tr>
				@foreach ($ta_detailorder as $order)
					<tr>
						<td>{{ $order->id_order }}</td>
						<td>{{ $order->Pnama}}</td>
						<td>{{ $order->name}}</td>
					<td>
						<input type="hidden" name="id_user" value="{{  Auth::user()->id  }}">
						<input type="hidden" name="id_penjual" value="{{ $order->id_penjual }}">
						<input type="hidden" name="idDetail" value="{{ $order->idDetail }}">
        <input id="input-1" name="rating" class="rating rating-loading"  data-min="0" data-max="5" data-step="1.0" data-size="md">
        </td>
				<td><button type="submit" class="btn btn-danger" value="Edit">Beri Rating</button></td>
			</tr>
		@endforeach
	</table>
</template>