<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{ asset('login_css/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login_css/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login_css/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login_css/vendor/animate/animate.css') }}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('login_css/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login_css/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login_css/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('login_css/css/main.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="{{ asset('login_css/images/img-01.png') }}" alt="IMG">
        </div>

        <form class="login100-form validate-form" action="{{ route('login') }}" role="form" method="POST">
          {{ csrf_field() }}
          <span class="login100-form-title">
            Selamat Datang
          </span>
          <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            @if ($errors->has('email'))
            <p class="login-box-msg" style="color: red;text-align: left;">
                <strong>{{ $errors->first('email') }}</strong>
            </p>
            @endif

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            
            <input class="input100" type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            @if ($errors->has('password'))
            <p class="login-box-msg" style="color: red;text-align: left;">
                <strong>{{ $errors->first('password') }}</strong>
            </p>
            @endif
            <input class="input100" type="password" name="password" id="password" placeholder="Password" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            <!-- <span class="txt1">
              Lupa
            </span>
            <a class="txt2" href="{{ asset('#') }}">
              Username / Password?
            </a> -->
          </div>

          <div class="text-center p-t-136">
            <!-- <a class="txt2" href="{{ asset('#') }}">
              Buat User Baru
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a> -->
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
</body>

<!--===============================================================================================-->  
  <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
  <script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="{{ asset('js/main.js') }}"></script>
</html>








