    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Service Provider Register</title>
        <link rel="shortcut icon" href="{{ asset('SP-Auth-custom-desgin/icon/admin-settings-male-2.png') }}">

        <link href="{{asset('SP-Auth-custom-desgin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        <link href="{{asset('SP-Auth-custom-desgin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    </head>

    <body style ="background-image: linear-gradient(whitesmoke, antiquewhite, ghostwhite); ">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                    <form method="POST" action="{{ route('ServiceProviders.register.submit') }}" class="user">
                            @csrf

                                <div class="form-group">

                                    <input id="name" type="text" class="input-lg form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <div class="form-group">
                            <input id="email" type="email" class="input-lg form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                         <select class="input-lg form-control chosen-select" name="org_type" id="org_type" style="border-radius:30px; height:49px;" required>
                            <option selected="selected" value="" disabled selected>Select your service </option>
                            @foreach(App\Models\Category::where(['parent_id'=>0])->get() as $level)
                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                            @endforeach
                            </select>
                            </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password" class="input-lg form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password-confirm" type="password" class="input-lg form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                         @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                        {{ __('Register') }}
                               </button>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('ServiceProviders.login') }}"><b>Already have an account? Login!</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
