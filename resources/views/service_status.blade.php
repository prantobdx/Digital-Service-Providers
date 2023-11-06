
@extends('layouts.app')

@section('title', 'Service-Status')

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

@section('content')

<section class="page-header">
    <div class="container text-center">
        <h1 style="color: #099107FF;"> Your Ordered booked service-status </h1>
    </div>
</section>

 <div class="content-wrapper">

    <section class="content-header">
      <div class="container">
      <h1>
         Booking
        <small>details & Status</small>
      </h1>
      <ol class="breadcrumb">
      <li class="">&nbsp;Digital Service Providers</li>
      <li><a href="{{ route('status') }}"><i class="fa fa-dashboard"></i>Order-list</a></li>
      </ol>
    </div>
    </section>


    <section class="content">
     <div class="container">
     <div class="jumbotron bg-dark text-white">
      <div class="row">
        <div class="col-xs-14">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Service status</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped text">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th width="25%">Email</th>
                  <th width="5%">Address</th>
                  <th width="15%">Date - Time</th>
                  <th width="10%">S-quantity</th>
                  <th width="10%">Note</th>
                  <th>Service</th>
                  <th width="15%">Order since</th>
                  <th class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php $sl=1; ?>
                @foreach($S_status as $booking)
                <tr>
                  <td>{{$sl}}</td>
                  <td>{{$booking->booked_by_name}}</td>
                  <td>{{$booking->phone}}</td>
                  <td width="25%">{{$booking->email}}</td>
                  <td width="5%">{{$booking->address}}</td>
                  <td width="10%">{{$booking->booking_date}} at {{ $booking->booking_time }} </td>
                  <td style="width:5px; text-align:center;">{{$booking->No_of_service}}    </td>
                  <td width="10%">{!! $booking->note !!}</td>
                  <td><a href="{{ url('service-details',$booking->service_post_id) }}">Service details</a></td>
                  <td width="15%">{{$booking->created_at->diffForHumans()}}</td>

                <td class="text-center">@if ($booking->status==0) <a class=" btn-danger btn-sm">Pending</a>@endif
                @if ($booking->status==1) <a class=" btn-success btn-sm">Approved</a>
                @endif</td>
                </tr>
                <?php $sl++; ?>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th width="25%">Email</th>
                  <th width="5%">Address</th>
                  <th width="15%">Date - Time</th>
                  <th width="10%">S-quantity</th>
                  <th width="10%">Note</th>
                  <th>Service</th>
                  <th width="15%">Order since</th>
                  <th class="text-center" style="width:10%">Status</th>
                </tr>
                </tfoot>
              </table>
            </div>

          </div>

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
@endsection
