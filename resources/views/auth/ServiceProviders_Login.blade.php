      <!DOCTYPE html>
      <html lang="en">

      <head>

          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <meta name="description" content="">
          <meta name="author" content="">

          <title>Service-Providers - Login</title>
          <link rel="shortcut icon" href="{{ asset('SP-Auth-custom-desgin/icon/admin-settings-male-2.png') }}">

          <link href="{{asset('SP-Auth-custom-desgin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
          <link
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">


          <link href="{{asset('SP-Auth-custom-desgin/css/sb-admin-2.min.css')}}" rel="stylesheet">

      </head>

      <body style="background-image:url('SP-Auth-custom-desgin/try-img.jpg');   background-repeat:repeat; background-size:cover; height: 100%;">

          <div class="container">


              <div class="row justify-content-center">

                  <div class="col-xl-10 col-lg-12 col-md-9">

                      <div class="card o-hidden border-0 shadow-lg my-5">
                          <div class="card-body p-0">

                              <div class="row">
                                  <div class="col-lg-6 d-none d-lg-block bg-login-image" ></div>
                                  <div class="col-lg-6">
                                      <div class="p-5">

                                        <div class="col-md-12">
                                         @if ($message = Session::get('flash_message_error'))
                                      <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                          @endif
                                      </div>

                                       <div class="col-md-12">
                                         @if ($message = Session::get('success_msg'))
                                           <div class="alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @endif
                                    </div>


                                      <div class="text-center">
                                          <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                      </div>

                                      <form method="POST" class="user" action="{{ route('ServiceProviders.login.submit') }}">
                                         @csrf
                                         <div class="form-group single-login">
                                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-user" name="email" value="{{ old('email') }}" required autocomplete="email"placeholder="Enter Email Address..." autofocus >
                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        <span id="chkEmail"></span>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                           </div>

                                      <div class="form-group">
                                          <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                          @error('password')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-user btn-block">
                                   {{ __('Login') }}
                               </button>
                               </div>

                           </form>
                           <hr>
                           <div class="text-center success">
                             <a class="small" href=""></a>
                          </div>
                         <div class="text-center">
                             <a class="small" href="{{route('ServiceProviders.register')}}"><b>No account? Create an Account!</b></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
      </div>
      </div>
      </div>


      <script src="{{asset('SP-Auth-custom-desgin/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('SP-Auth-custom-desgin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

      <script src="{{asset('SP-Auth-custom-desgin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <script src="{{asset('SP-Auth-custom-desgin/js/sb-admin-2.min.js')}}"></script>

      </body>

      </html>
