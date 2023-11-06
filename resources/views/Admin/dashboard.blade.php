@extends('layouts.Backend_layout')

@section('title', 'Dashboard')
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

  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

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
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-olive">
            <div class="inner">
              <h3>{{App\Models\ServiceBooking::count()}}</h3>

              <p>Service-Booking Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="{{ route('admin.booking-list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box" style="background-color:#DC22AAFF;">
            <div class="inner">
          <h3 style="color:white">{{App\Models\ServicesPost::count()}}
          </h3>
              <p style="color:white">Services Post</p>
            </div>
            <div class="icon">
              <i class="fa fa-music"></i>
            </div>
            <a href="{{ route('admin.services-list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{App\Models\Contact::count()}}</h3>

              <p>User-Message</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{URL::to('/admin/message-list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{App\Models\Review::count()}}</h3>
              <p>Reviews</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>

      <div class="row">

        <section class="col-lg-12 connectedSortable">
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-user"></i>

              <h3 class="box-title">New registered service-providers</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
{{--                  {{ $SP_users->links() }}--}}
                </ul>
              </div>
            </div>

            <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Organization name</th>
                  <th>Organization type</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($SP_users as $user)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ App\Models\Category::where(['id'=>$user->org_type_id])->pluck('name')[0] }} </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td><?php if (!empty($user->image)): ?>
                            <img height="50" src="../images/Sp_Profile/{{ $user->image }}">
                            <?php endif ?></td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="box-footer clearfix no-border">
            </div>
          </div>
        </section>
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
    <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
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
