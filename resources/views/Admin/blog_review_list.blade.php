@extends('layouts.Backend_layout')

@section('title', 'Meassage list')
@section('css_content')

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">

  <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

  <link rel="stylesheet" href="{{ asset('datatablecss/button.css') }}">

@endsection

@section('main_content')

<div class="content-wrapper">

    <section class="content-header">
      <h1>
        Blogs Review
        <small>list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reviews</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reviews</h3>
            </div>

            <div class="box-body">

              <div class="col-md-12">
                @if(Session::has('delete_message_flash_success'))
                 <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('delete_message_flash_success') !!} !</strong>
                 </div>
                @endif
              </div>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl no.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Bpost-title</th>
                  <th>Comments</th>
                  <th>Since</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $sl=1; ?>
                @foreach($reviews as $review)
                <tr>
                  <td>{{$sl}}</td>
                  <td>{{ App\Models\User::where(['id'=>$review->user_id])->pluck('name')[0] }}</td>
                  <td>{{ App\Models\User::where(['id'=>$review->user_id])->pluck('email')[0] }}</td>
                  <td>{{ App\Models\Blog::where(['id'=>$review->post_id])->pluck('title')[0] }}</td>
                  <td>{{$review->review}}</td>
                  <td>{{$review->created_at->diffForHumans()}}</td>
                 <td class="text-center"><a class="btn btn-danger" onclick="return confirm('Are you sure delete this post?')" href="{{ url('/admin/delete-review',$review->id) }}"><i class="fa fa-trash"> </i></a></td>
                </tr>
                <?php $sl++; ?>
                @endforeach
                </tbody>
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

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
</script>
</script>
@endsection
