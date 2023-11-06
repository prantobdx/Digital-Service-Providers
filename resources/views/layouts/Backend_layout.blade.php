<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Admin | @yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <link rel="shortcut icon" href="{{ asset('backend/images/admin-settings-male.png') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('css_content')
</head>

<body  class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <a href="#" class="logo">

      <span class="logo-mini"><b>A</b> D</span>

      <span class="logo-lg"><b>Admin</b></span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('/')}}/images/admin-profile/{{ Auth::user()->image }}" class="user-image" alt="User Image" style="width:30px;height:35px;">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <img src="{{asset('/')}}/images/admin-profile/{{ Auth::user()->image }}" class="img-circle" alt="User Image">
              </li>

              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="{{ url('/admin/profile') }}" class="btn btn-info btn-block btn-flat">Profile</a>
                  </div>
                </div>

              </li>

              <li class="user-footer">
                <div class="text-center">
                  <a href="{{ route('admin.logout') }}"  class="btn btn-warning btn-flat btn-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sign out') }}</a>
                  <form id="logout-form" action="{{ route('admin.logout') }}" method="get" style="display: none;">@csrf</form>
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
      <!-- Sidebar user panel -->
      <div class="user-panel" style="padding-bottom: 20px">
        <div class="pull-left image">
            <img src="{{asset('/')}}/images/admin-profile/{{ Auth::user()->image }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="@if(Route::current()->getName() == 'admin.dashboard') active @endif">
          <a href="{{ route('admin.dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="@if(Route::current()->getName() == 'admin.add-category') active @endif @if(Route::current()->getName() == 'admin.show-category') active @endif treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(Route::current()->getName() == 'admin.add-category') active @endif"><a href="{{route('admin.add-category')}}"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li class="@if(Route::current()->getName() == 'admin.show-category') active @endif"><a href="{{route('admin.show-category')}}"><i class="fa fa-circle-o"></i> Show Category</a></li>
          </ul>
        </li>


        <li class="@if(Route::current()->getName() == 'admin.booking-list') active @endif treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Service-Booking</span>
              <span class="pull-right-container">
                <small class="label pull-left bg-yellow">{{App\Models\ServiceBooking::where(['status'=>0])->count()}}</small>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(Route::current()->getName() == 'admin.booking-list') active @endif"><a href="{{route('admin.booking-list')}}"><i class="fa fa-circle-o text-yellow"></i> Booking list</a></li>
          </ul>
        </li></ul>


        <ul class="sidebar-menu">
        <li class="header">VIEW</li>
        <li class="@if(Route::current()->getName() == 'admin.services-list') active @endif"><a href="{{route('admin.services-list')}}"><i class="fa fa-circle-o text-green"></i> <span>Services List</span>
          <span class="pull-right-container">
        <small class="label pull-left bg-green">{{App\Models\ServicesPost::count()}}</small>
          </span>
        </a></li>
        <li class="@if(Route::current()->getName() == 'admin.blog-list') active @endif"><a href="{{route('admin.blog-list')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Blog List</span>
          <span class="pull-right-container">
            <small class="label pull-left bg-aqua">{{App\Models\Blog::count()}}</small>
          </span>
        </a></li>
      </ul>

      <ul class="sidebar-menu">
        <li class="header">Check</li>

         <li class="@if(Route::current()->getName() == 'admin.review-list')
         active @endif"><a href="{{route('admin.review-list')}}"> <i class="fa fa-circle-o text-green"></i> <span>Blog-Reviews</span>
         <span class="pull-right-container">
         <small class="label pull-left bg-yellow">{{App\Models\Review::count()}}
         </small>
         </span>
        </a></li>

        <li class="@if(Route::current()->getName() == 'admin.message-list')
         active @endif"><a href="{{route('admin.message-list')}}"> <i class="fa fa-circle-o text-green"></i> <span>User-Message</span>
         <span class="pull-right-container">
         <small class="label pull-left bg-green">{{App\Models\Contact::count()}}</small>
         </span>
        </a></li>


      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

    @yield('main_content')


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Admin</b>
    </div>
    <strong>
         <a href="">Digital Service Providers Site</a>.</strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>
</div>

@yield('js_content')

</body>
</html>
