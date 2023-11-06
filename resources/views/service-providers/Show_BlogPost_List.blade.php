@extends('layouts.ServiceProviders_layout')

@section('title', 'Blog list')
@section('css_content')
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">
@endsection

@section('main_content')

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Blog
      <small>list</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Blog list</li>
    </ol>
  </section>


  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Own post by blog</h3>
            </div>

            <div class="box-body table-responsive">
              <div class="col-md-12">
                @if(Session::has('delete_blog_flash_success'))
                <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('delete_blog_flash_success') !!} !</strong>
                </div>
                @endif
              </div>
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  <th>Sl no.</th>
                  <th>Title</th>
                  <th>Sub-title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $sl=1; ?>
                @foreach($blogs as $blog)
                <tr>
                  <td width="5%">{{$sl}}</td>
                  <td width="10%">{{$blog->title}}</td>
                  <td width="10%">{{$blog->sub_title}}</td>
                  <td width="30%">{!! $blog->description  !!}</td>
                  <td width="10%"><img height="75px" src="../images/blog/{{$blog->image}}"></td>
                  <td width="15%">@if ($blog->status==0)
                    <a class="btn btn-warning">wait for approval</a>
                  @endif<a class="btn btn-primary" href="{{ route('ServicePro.edit-blog',[$blog->id]) }}"><i class="fa fa-edit"></i></a> <a class="btn btn-danger"  onclick="return confirm('Are you sure delete this post?')"  href="{{ url('/ServiceProvider/delete-blog',$blog->id) }}"><i class="fa fa-trash"></i></a></td>

                </tr>
                <?php $sl++; ?>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Sl no.</th>
                  <th>Title</th>
                  <th>Sub-title</th>
                    <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>

          </div>

        </div>

      </div>

    </section>

</div>


@endsection
@section('js_content')

<script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
