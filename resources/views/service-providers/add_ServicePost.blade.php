@extends('layouts.ServiceProviders_layout')

@section('title', 'Add new Service')
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
      Add new Service
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add new Service </li>
    </ol>
  </section>


  <section class="content">
      <div class="row">
        <div class="col-md-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Service
                <small>Post</small>
              </h3>

            </div>

            <div class="box-body pad">
              <div class="col-md-12">
                @if(Session::has('add_event_flash_error'))
                <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('add_event_flash_error') !!} !</strong>
                </div>
                @endif
                @if(Session::has('add_service_flash_success'))
                <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('add_service_flash_success') !!} !</strong>
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
              <form method="POST" action="{{ url('/ServiceProvider/add-Service') }}" enctype="multipart/form-data">
                  @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-form-label">Service Category</label>
                      <select class="form-control select2" name="category_id" id="category_id">
                          <option selected="selected" value="" DISABLED>Category</option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Sub-title</label>
                        <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Sub-title">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Service Area</label>
                        <input type="text" class="form-control" name="service_area" id="location" value="" placeholder="Provide possible area for this service ">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Contact-Number</label>
                      <input type="text" class="form-control" name="contact" id="location" placeholder="Number for this service"
                       maxlength = "12" required>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Image (Max file size:2024 kb, Max_width=370,max_height=300)</label>
                      <span class="glyphicon glyphicon-file fa-2x "></span>
                      <a href="#" class="btn btn-primary btn-sm">
                        <input type="file" class="form-control-file" name="image" id="image"></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Description</label>
                      <textarea class="" name="Description" id="editor1" placeholder="Description here" ></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                  <div style="margin-top:-90px">
                      <input type="submit" name="event_post" class="btn btn-success btn-lg" value="POST">
                  </div>

              </form>
            </div>
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

    <script src="{{ asset('backend/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {

            CKEDITOR.replace('editor1')
            $('.textarea').wysihtml5()
        })
    </script>



@endsection
