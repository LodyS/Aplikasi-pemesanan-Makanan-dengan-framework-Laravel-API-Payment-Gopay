<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('js/app.js') }}" rel="stylesheet">

<h2>Selamat datang : {{ Auth::user()->name }} </h2>

   <table class="table table-successs">
   @extends('layouts.app')
        <tr>
           <th>Tambah Makanan</th>
           <th>Makanan Yang Sudah Laku</th>
      </tr>
         <tr>
        <input type="hidden" value="{{$id = Auth::user()->id }}">
            <td><a href="tambahMakanan/{{$id}}">Tambah Makanan</a></td>
            <td><a href="makananLaku/{{ $id}}">Makanan Yang Sudah Laku</a></td>
         </tr>
   </table>   

<table class="table table-dark">
    <tr>
       <th>Foto</th>
       <th>Nama</th>
       <th>Harga</th>
       <th>Edit</th>
       <th>Hapus</th>
    </tr>
    @foreach ($ta_produk as $produk)
        <tr>
           <td> <img src=" {{ url('foto/'. $produk->Pgmb) }}" width="100"> </td>
           <input type="hidden" value="{{ $produk->produkID }}"></td>
           <td>{{ $produk->Pnama }}</td>
           <td>Rp. {{ number_format($produk->Pharga)}}</td>
           <td><a href="edit/{{$produk->produkID}}">Edit</a></td>
           <td><a href="hapusMakananKu/{{$produk->produkID}}">Hapus</a></td>
        </tr>
        @endforeach
</table>