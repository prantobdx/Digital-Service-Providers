<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


    <title>Digital Service Searching Site - @yield('title')</title>


<link rel="shortcut icon" href="{{ asset('frontend/images/loader.gif') }}">
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/loader.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/docs.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Domine:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i%7CRoboto:400,500" rel="stylesheet">

</head>

<body>
    <div class="page">
        <header id="header">
            <div class="quck-link">
                <div class="container ">
                    <div class="mail"><a href="MailTo:info@digital_Service_Providers.com"><span class="icon icon-envelope"></span>info@DigitalServiceProviders</a></div>
                    <div class="right-link">
                        <ul>
                          @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                            </li>
                            @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                            @endif
                          @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('My Account') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('logout') }}"> <button class="btn-block btn-info" style="width:80%; height:10%"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </button> </a>

                                <form id="logout-form"  action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                              </div>
                            </li>
                          @endguest

                          </ul>
                    </div>
                </div>
            </div>

          <div class="col-md-12">
               @if(Session::has('Message_success'))
                <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{!! session('Message_success') !!}</strong>
                 </div>
                @endif
            </div>

            <nav id="nav-main">
                <div class="container">
                    <div class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <a href="{{route('home')}}" class="navbar-brand"><img src="{{ asset('frontend/images/GIF-images/DSP-logo-1.gif') }}" alt=""></a>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon1-barMenu"></span>
                                <span class="icon1-barMenu"></span>
                                <span class="icon1-barMenu"></span>
                            </button>

                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="@if(Route::current()->getName() == 'home') active @endif"><a href="{{route('home')}}">Home</a></li>

                                <li class="single-col ">
                             <a>Services <span class="icon icon-arrow-down"></span></a>
                                  <ul>
                                   @foreach(App\Models\Category::where(['parent_id'=>0])->orderBy('id', 'asc')->get() as $category)
                                        <li><a href="services?service_id=<?php print $category->id; ?>">{{ $category->name }}</a></li>
                                    @endforeach
                                  </ul>
                                </li>

                            <li class="@if(Route::current()->getName() == 'blog') active @endif"><a href="{{route('blog')}}">Blog</a></li>

                            <li class="@if(Route::current()->getName() == 'status') active @endif"><a href="{{route('status')}}">Status</a></li>

                            <li class="@if(Route::current()->getName() == 'about-us') active @endif"><a href="{{route('about-us')}}">AboutUS</a></li>

                            </ul>

                        </div>
                    </div>
                </div>
            </nav>
        </header>



        @yield('content')


        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-md-4">
                            <h5>About us</h5>
                            <div class="contact-slide">
                                <p>Digital Service Provider is the best service providing compnay with experience and professional servicers.you can get services from at home. This site is a online platform which solved for our daily life faced problem.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4">
                            <div class="footer-contact">
                                <ul>
                                <h5>Contact us</h5>
                                <div class="contact-slide">
                                    <div class="icon icon-location-1"></div>
                                    <p>74/3,Mirpur-Road, Dhanmodi-15,Dhaka-1209</p>
                                </div>
                                <div class="contact-slide">
                                    <div class="icon icon-phone"></div>
                                    <p>+8801745-456734</p>
                                </div>

                                <div class="contact-slide">
                                    <div class="icon icon-message"></div>
                                    <a href="MailTo:info@Digital_Service_Providers.com">info@Digital_Service_Providers.com</a>
                                </div>
                                  </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-md-4">
                            <div class="contact-form">
                                <h5>Why stay with us?</h5>
                                    we are always ready to provide your urgent need service as soon as possible at your door step.
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <p>Digital-Service-Providers Searching Site | All Rights Reserved</p>
                </div>
            </div>
        </footer>
    </div>


    <script type="text/javascript" src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.selectbox-0.2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.form-validator.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/placeholder.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/coustem.js') }}"></script>
</body>

</html>

