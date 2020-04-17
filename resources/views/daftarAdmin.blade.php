<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<h1>Register Jadi Admin</h1>
<form action="{{ url('simpanAdmin') }}" method="post">
     {{ @csrf_field() }}
	  <div class="col-sm-3">
		Nama Depan    : <input type="text"  class="form-control" name="nama_admin" required="required"></div><br/>
		 <div class="col-sm-3">
		E-mail        : <input type="text" class="form-control" name="email" required="required"></div><br/>
		 <div class="col-sm-3">
		Password      : <input type="password" class="form-control" name="password" required="required"></div><br/>
	<button type="submit" class="btn btn-danger" value="Simpan Data">Simpan Data</button>
</form>