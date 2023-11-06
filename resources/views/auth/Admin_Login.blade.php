<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/square/blue.css') }}">

    <link rel="shortcut icon" href="{{ asset('backend/images/admin-settings-male.png') }}">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('/')}}"><b>Admin</b></a>
    </div>

    <div class="login-box-body">

      @if ($message = Session::get('flash_message_for_error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
      @endif

      <div class="col-md-12">
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif
      </div>
      <p class="login-box-msg">{{ __('Admin Login') }}</p>
      <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <div class="form-group has-feedback">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address" autofocus>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <span id="chkEmail"></span>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group has-feedback">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <span id="chkPasss"></span>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="row text-center">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>

  <script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
      });
    });
  </script>
</body>
</html>
