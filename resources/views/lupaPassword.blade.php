<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/pnc-logo.png') }}">
  <title>SI-LTS PNC | LOGIN</title>
  @include('template.css')

  <style>
    .aka {
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

<body class="">
  @include('sweetalert::alert')
<div class="aka hold-transition login-page">
  
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
          <p class="login-box-msg">Atur Ulang Password</p>

          <form action="{{ route('login.reset.action') }}" method="post">
            @csrf
            @method('PUT')

            <div class="input-group mb-3">
              <input class="form-control" name="email" value="{{ old('email',$user->email) }}"  disabled>
            </div>

            <div class="input-group mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password" placeholder="Password" required="">
              <div class="input-group-append">
              <span class="input-group-text" id="eye">
                  <i class="fa fa-eye" onclick="myFunction()">
                  </i></span></div>
            </div>
            
    <!-- SHOW HIDE PASSWORD -->

          <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                $('#eye i').addClass( "fa-eye-slash" );
                $('#eye i').removeClass( "fa-eye" );
                } else {
                    x.type = "password";
                $('#eye i').removeClass( "fa-eye-slash" );
                $('#eye i').addClass( "fa-eye" );
                }
            }
        </script>
            
            
            <div class="input-group mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required="">
            </div>
            @error('password')
            <div class="alert alert-danger text-center">
                {{ $message }}
            </div>
          @enderror





            <input type="text" value="{{ $user->email }}" name="email" hidden>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Atur Ulang Password</button>
              </div>
            </div>
          </form>



        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>
      <p class="text-center text-light pt-2">2022&copy;SI-LTS PNC | TA By FAIZ</p>
    <!-- /.login-box -->
    @include('template.js')

    {{-- </div>
    </div> --}}
    
</div>
</body>
</html>
