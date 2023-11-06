@extends('layouts.Backend_layout')

@section('title', 'Add category')
@section('css_content')

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/plugins/iCheck/all.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/plugins/timepicker/bootstrap-timepicker.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">

@endsection

@section('main_content')

<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Categories
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add category</li>

      </ol>
    </section>


  <section class="content">

 <div class="row">
  <div class="col-sm-6">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Add category</h3>
      </div>
      <div class="col-md-12">
          @if(Session::has('add_category_flash_error'))
          <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! session('add_category_flash_error') !!} !</strong>
          </div>
          @endif
          @if(Session::has('add_category_flash_success'))
          <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{!! session('add_category_flash_success') !!} !</strong>
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

      <form role="form" method="POST" action="{{ url('/admin/add-category') }}" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label"> Main or Sub Category Name   </label>
                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" required autofocus>
                <span class="messages"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Category Level</label>
                <select class="form-control select2" name="parent_id" style="width: 100%;">
                  <option selected="selected" value="0">Main-Category</option>
                  @foreach($levels as $level)
                <option value="{{ $level->id }}">{{ $level->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Image(280x203)</label>
                  <input type="file" class="form-control-file" id="img" name="img">
                  <span class="messages"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Description</label>
                  <textarea type="text" class="form-control" id="editor" name="description" placeholder="Description"></textarea>
                  <span class="messages"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-success m-b-0">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
</div>

@endsection
@section('js_content')


<script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script src="{{ asset('backend/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('backend/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('backend/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<script src="{{ asset('backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('backend/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

<script src="{{ asset('backend/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('backend/plugins/iCheck/icheck.min.js') }}"></script>

<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>

<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('backend/dist/js/demo.js') }}"></script>

<script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
