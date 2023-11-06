@extends('layouts.Backend_layout')

@section('title', 'Edit category')
@section('css_content')

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">

@endsection

@section('main_content')

<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit category</li>

      </ol>
    </section>

  <section class="content">
<div class="row">
  <div class="col-sm-6">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Edit category</h3>
      </div>
      <div class="col-md-12">

        @if(Session::has('edit_category_flash_success'))
                <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('edit_category_flash_success') !!} !</strong>
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

      <form role="form" method="POST" action="{{ url('/admin/update-category',$categoryDetails->id) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Category Name</label>
                <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" value="{{ $categoryDetails->name }}" required>
                <span class="messages"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="form-group">
                  <label>Category Level</label>
                  <select class="form-control select2" name="parent_id" style="width: 100%;">
                    <option selected="selected" value="0">Main category</option>
                    @foreach($levels as $level)
                    <option value="{{ $level->id }}"  <?php if($level->id == $categoryDetails->parent_id) { echo 'selected';} ?> >{{ $level->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Image</label>
                  <input type="file" class="form-control-file" id="img" name="img">
                  <span class="messages"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-form-label">Description</label>
                  <textarea type="text" class="form-control" id="editor" name="description" placeholder="Description" required> {!! $categoryDetails->description !!}</textarea>
                  <span class="messages"></span>
              </div>
            </div>
          </div>
            <button type="submit" class="btn btn-success m-b-0">Update</button>
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
