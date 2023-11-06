@extends('layouts.ServiceProviders_layout')

@section('title', 'Setting')
@section('css_content')

  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
 
  <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">

  <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('backend/bower_components/morris.js/morris.css')}}">
  
  <link rel="stylesheet" href="{{asset('backend/bower_components/jvectormap/jquery-jvectormap.css')}}">
  
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  
  <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

@endsection

@section('main_content')

<div class="content-wrapper">
  
  <section class="content-header">
    <h1>
      Profile
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit profile</li>
    </ol>
  </section>

  
  <section class="content">

    
    <div class="row">
      <div class="col-sm-6">
        <div class="box box-success">
          
      <div class="box-header with-border">
        <h3 class="box-title">Edit prfile</h3>
      </div>
      
      <div class="col-md-12">
          @if(Session::has('edit_profile_flash_error'))
          <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! session('edit_profile_flash_error') !!} !</strong>
          </div>
          @endif
          @if(Session::has('edit_profile_flash_success'))
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! session('edit_profile_flash_success') !!} !</strong>
          </div>
          @endif
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible" id="myAlert">
            <a href="" class="close">&times;</a>
            <ul>
            @foreach ($errors->all() as $error)
              <li>
              <strong>Oh sanp!</strong> {{ $error }}
              </li>
            @endforeach
            </ul>
          </div>
          @endif
          </div>
      
      <form role="form" method="POST" action="{{ route('ServicePro.update_profile.submit') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Name</label>
                <input type="hidden" class="form-control" name="id" id="id" placeholder="Name" value="{{ Auth::user()->id }}" required>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ Auth::user()->name }}" required>
                  
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Phone number</label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="{{ Auth::user()->phone }}">
                  <span class="messages"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Email address</label>
                  <input type="email" class="form-control" id="email" disabled name="email" placeholder="Email" value="{{ Auth::user()->email }}" required>
                  <span class="messages"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Image</label>
                  <input type="file" class="form-control-file" id="image" name="image">
              </div>
            </div>
          </div>
        </div>
        

        <div class="box-footer">
          <button type="submit" id="update_profile" class="btn btn-success m-b-0">Update profile</button>
        </div>
      </form>
        </div>
      </div>
    </div>
    

  </section>
  
</div>

    
@endsection
@section('js_content')
  
  <script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
  
  <script src="{{asset('backend/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
  
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  
  <script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  
  <script src="{{asset('backend/bower_components/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('backend/bower_components/morris.js/morris.min.js')}}"></script>
 
  <script src="{{asset('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
  
  <script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
  <script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  
  <script src="{{asset('backend/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
  
  <script src="{{asset('backend/bower_components/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  
  <script src="{{asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
 
  <script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
  
  <script src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  
  <script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
  
  <script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
  
  <script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
 
  <script src="{{asset('backend/dist/js/demo.js')}}"></script>
@endsection