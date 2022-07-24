<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/pnc-logo.png') }}">
  <title>SI-LTS PNC | LOGIN</title>
  @include('template.css')

  <style>
    body {
	background: linear-gradient(-45deg, #00ff95, #060470, #79b6cc, #0059ff);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: 100vh;
}
@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

  </style>
</head>

<body class="hold-transition login-page">
  {{-- <div class="d-flex flex-column justify-content-center w-100 h-100">
    <div class="d-flex flex-column justify-content-center align-items-center"> --}}
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" 
  style="border-radius: 3%;"
  >
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>SI-LTS</b>PNC</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Isikan Email dibawah untuk melakukan reset password</p>

      <form action="{{ route('login.email') }}" method="post">
        @csrf
        {{-- <label for="">Email</label> --}}
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Reset</button>
          </div>
      </form>
      
      
      
    </div>
    <center> <a href="/login" ><span> Kembali </span></a></center>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <p class="text-center text-light pt-2">2022&copy;SI-LTS PNC | TA By FAIZ</p>
<!-- /.login-box -->
@include('template.js')

{{-- </div>
</div> --}}
</body>
</html>
