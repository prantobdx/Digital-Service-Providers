<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Service-Providers | @yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <link rel="shortcut icon" href="{{ asset('SP-Auth-custom-desgin/icon/admin-settings-male-2.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('css_content')
</head>

<body  class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <a href="" class="logo">

      <span class="logo-mini"><b>S</b>P</span>

      <span class="logo-lg"><b style="color:yellow">Service-Providers</b></span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('/')}}/images/Sp_Profile/{{ Auth::user()->image}}" class="user-image" alt="User Image" style="width:35px;height:35px">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{asset('/')}}/images/Sp_Profile/{{ Auth::user()->image}}" class="img-circle" alt="User Image">
                <p>
                   {{ Auth::user()->name }}
                  <small>Member since {{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/ServiceProvider/profile') }}" class="btn btn-info btn-block btn-flat">Profile</a>
                </div>
                <div class="pull-right ">
                  <a href="{{ route('ServiceProviders.logout.submit') }}"  class="btn btn-danger btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sign out') }}</a>
              <form id="logout-form" action="{{ route('ServiceProviders.logout.submit') }}" method="get" style="display: none;">@csrf</form>
                </div>
              </li>
            </ul>
          </li>
          <li>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('/')}}/images/Sp_Profile/{{ Auth::user()->image}}" class="img-circle" alt="User Image" style="width:70px; height:45px">
         </div>

         <div class="pull-left info">
          <p> {{ Auth::user()->name }} </p>
           <a href="#"> <i class="fa fa-circle text-success"> </i>Online
          </a>
        </div>
      </div>


      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="@if(Route::current()->getName() == 'ServicePro.dashboard') active @endif">
          <a href="{{ route('ServicePro.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

   <li class="@if(Route::current()->getName() == 'ServicePro.add-service-post') active @endif @if(Route::current()->getName() == 'ServicePro.show-service') active @endif treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Manage Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(Route::current()->getName() == 'ServicePro.add-service-post') active @endif" title="Add new service"> <a href="{{ route('ServicePro.add-service-post') }}"><i class="fa fa-circle-o"></i> Create New</a></li>

            <li class="@if(Route::current()->getName() == 'ServicePro.show-service') active @endif"><a href="{{ route('ServicePro.show-service') }}"><i class="fa fa-circle-o"></i> Services list</a></li>
          </ul>
        </li>

    <li class="@if(Route::current()->getName() == 'ServicePro.add-blog') active @endif @if(Route::current()->getName() == 'ServicePro.blog-list') active @endif treeview">
          <a href="#">
            <i class="fa fa-flag"></i>
            <span>Manage Blogs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(Route::current()->getName() == 'ServicePro.add-blog') active @endif"><a href="{{ route('ServicePro.add-blog') }}"><i class="fa fa-circle-o"></i>Add Blog </a></li>
            <li class="@if(Route::current()->getName() == 'ServicePro.blog-list') active @endif"><a href="{{ route('ServicePro.blog-list') }}"><i class="fa fa-circle-o"></i> Blog list</a></li>
          </ul>
        </li>
     </ul>


    </section>
  </aside>

    @yield('main_content')


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Service Provider
    </div>
    <strong> <a href="">Digital-Service-Providers</a>.</strong>
  </footer>


  <div class="control-sidebar-bg"></div>
</div>

@yield('js_content')

</body>
</html>
