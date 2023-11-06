@extends('layouts.ServiceProviders_layout')

@section('title', 'Service-Providers-Dashboard')
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

    @if($message = Session::get('flash_message_success'))
        <div class="alert alert-info alert-dismissible text-center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif


    <section class="content">

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">

             <h3 style="color:#A4AB53FF">
              <b>{{$products = DB::table('services_posts')
              ->join('service_bookings', 'services_posts.id', '=', 'service_bookings.service_post_id')
                ->where(['services_posts.posted_by_id'=>Auth::user()->id])
                ->where(['service_bookings.status'=>1])->count()}}</b></h3>

              <p>Approved service</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
            <h3><b>{{App\Models\ServicesPost::where(['posted_by_id'=>Auth::user()->id])->count()}}</b></h3>
              <p>services post</p>
            </div>
            <div class="icon">
              <i class="fa fa-flag"></i>
            </div>
            <a href="{{ route('ServicePro.show-service') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
            <div class="inner">
          <h3 style="color:#83CA34FF"><b>{{App\Models\Blog::where(['posted_by_id'=>Auth::user()->id])->count()}} </b></h3>
              <p>Manage Blog</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="{{ route('ServicePro.blog-list')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>

      <div class="row">

        <section class="col-lg-9 connectedSortable">
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-book"></i>

              <h3 class="box-title">New Ordered Service-Booking</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  {{ $bookings->links() }}
                </ul>
              </div>
            </div>

         <div class="box-body table-responsive">
         <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th width="15%">Address</th>
                  <th width="20%">Date - Time</th>
                  <th style="width:5px">S.need</th>
                  <th>Service</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $sl=1; ?>
                @foreach($bookings as $book)
                <tr>
                  <td>{{$sl}}</td>
                  <td>{{$book->booked_by_name}}</td>
                  <td>{{$book->phone}}</td>
                  <td width="15%">{{$book->address}}</td>
                  <td width="20%">{{$book->booking_date}} at {{ $book->booking_time }} </td>
                  <td style="width:5px; text-align:center;">{{$book->No_of_service}} </td>

                  <td><a href="{{url('service-details',$book->service_post_id)}}">Service details</a></td>
                  <td class="text-center"> @if ($book->status==1)<a class=" btn-success btn-sm">Approved</a>@endif</td>
                </tr>
                <?php $sl++; ?>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th width="15%">Address</th>
                  <th width="20%">Date - Time</th>
                  <th style="width:5px">S.need</th>
                  <th>Service</th>
                  <th class="text-center">Action</th>
                </tr>
                </tfoot>
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

    <script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
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
