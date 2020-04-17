<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<h1>Login Admin</h1>
@if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
			
<form action="{{ url('adminMasuk')}}" method="post">
  {{ @csrf_field() }}
  <div class="col-sm-3">
      Nama     : <input type="text" class="form-control" name="email"></div><br/>
	 <div class="col-sm-3">
	  Password : <input type="password" class="form-control" name="password"></div><br/>
	<button type="submit" class="btn btn-danger" value="Login">Login</button><br/>
	<br/>
	<a href="daftarAdmin">Bikin Akun</a>
</form>