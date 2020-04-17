<template>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <h3>Edit makanan</h3>
        <form action="{{ url('hapusMakanan')}}" method="POST">
            {{ @csrf_field() }}
        @foreach ($ta_produk as $produk)
                <input type="hidden" class="form-control" name="produkID" value="{{$produk->produkID}}">
           

            <div class="col-sm-3">
                <input type="text" class="form-control" name="Pnama" value="{{ $produk->Pnama}}"><br/>
            </div>

            <div class="col-sm-3">
               <input type="text" class="form-control" name="Pharga" value="{{ $produk->Pharga}}"><br/>
            </div>

            <div class="col-sm-3">   
                <button type="submit" class="btn btn-danger" value="Edit">Hapus</button>
            </div>
        </form>
    @endforeach 
</template>