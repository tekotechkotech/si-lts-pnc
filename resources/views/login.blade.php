<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SI-LTS PNC | LOGIN</title>
  @include('template.css')

</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>SI-LTS</b>PNC</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login Untuk masuk ke sistem</p>

      <form action="{{ route('login.action') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="Username" class="form-control" name="Username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>
        </div>
        
      <div class="input-group mb-3">
        <input type="password" class="form-control"  id="password" name="Password" placeholder="Password" required="">
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
  @error('password')
    <div class="alert alert-danger text-center">
        {{ $message }}
    </div>
  @enderror
      <div class="row">
          
          <!-- /.col -->
          <div class="col text-center"><hr>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button><br>
            <a href="" class="text center"><span> Butuh Bantuan? </span></a>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@include('template.js')

</body>
</html>
