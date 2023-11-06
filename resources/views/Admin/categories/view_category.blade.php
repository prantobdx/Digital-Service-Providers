@extends('layouts.Backend_layout')

@section('title', 'Show category')
@section('css_content')

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">

{{--  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">--}}

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
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Show category</li>

      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
            </div>

            @if(Session::has('edit_category_flash_success'))
	          <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
	            <strong>{!! session('edit_category_flash_success') !!} !</strong>
	          </div>
          	@endif

            @if(Session::has('delete_category_flash_success'))
            <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
              <strong>{!! session('delete_category_flash_success') !!} !</strong>
            </div>
            @endif

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Category name</th>
                  <th>Level of Category</th>
                  <th>Image</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $sl2=1; ?>
                	@foreach($categories as $category)
                	<tr>
                        <td>{{ $sl2 }}</td>
                        <td>{{ $category->name }}</td>
                		<td>@if($category->parent_id ==0) Main-Category @endif
                  @if ($category->parent_id > 0) Sub-Category @endif </td>
                		<td><?php if (!empty($category->img)): ?>
                  <img src="{{asset('/')}}/images/categories/{{ $category->img }}" width="220" height="130">
                    <?php endif ?></td>
                        <td class="text-center"><a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-success btn-flat"><i class="fa fa-edit"></i></a><a href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-flat " style="margin-left: 12px" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="fa fa-trash"></i></a></td>
                	</tr>
                  <?php $sl2++; ?>
                	@endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Category name</th>
                  <th>Level of Category</th>
                  <th>Image</th>
                  <th class="text-center">Action</th>
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

{{--<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>--}}
{{--<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>--}}

<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

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

{{--<script>--}}
{{--  $(function () {--}}
{{--    $('#example1').DataTable()--}}
{{--    $('#example2').DataTable({--}}
{{--      'paging'      : true,--}}
{{--      'lengthChange': false,--}}
{{--      'searching'   : false,--}}
{{--      'ordering'    : true,--}}
{{--      'info'        : true,--}}
{{--      'autoWidth'   : false,--}}
{{--    })--}}
{{--  })--}}
{{--</script>--}}

@endsection
