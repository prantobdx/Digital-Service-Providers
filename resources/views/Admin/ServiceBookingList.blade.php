@extends('layouts.Backend_layout')

@section('title', 'Booking list')
@section('css_content')

  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">

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
        Ordered Booking
        <small>list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Booking</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Service booking list</h3>
            </div>

            <div class="box-body">
              <div class="col-md-12">
                @if(Session::has('booking_flash_success'))
                <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('booking_flash_success') !!} !</strong>
                </div>
                @endif
                @if(Session::has('booking_flash_delete'))
                <div class="alert alert-danger alert-dismissible fade in"  id="myAlert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>{!! session('booking_flash_delete') !!} !</strong>
                </div>
                @endif
                    @if(Session::has('booking_flash_unapproved'))
                        <div class="alert alert-warning alert-dismissible fade in"  id="myAlert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{!! session('booking_flash_unapproved') !!} !</strong>
                        </div>
                    @endif
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>U-Phone</th>
                  <th>Email</th>
                  <th width="5%">Address</th>
                  <th width="10%">Date - Time</th>
                  <th style="width:5px">Service-quantity</th>
                  <th>Note</th>
                  <th>Service</th>
                  <th>Order since</th>
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
                  <td>{{$book->email}}</td>
                  <td width="5%">{{$book->address}}</td>
                  <td width="10%">{{$book->booking_date}} at {{ $book->booking_time }} </td>
                  <td style="width:5px; text-align:center;">{{$book->No_of_service}}  </td>
                  <td>{!! $book->note !!}</td>
                  <td><a href="{{url('service-details',$book->service_post_id)}}">Service details</a></td>
                  <td>{{$book->created_at->diffForHumans()}}</td>

                  <td class="text-center" width="20%">@if ($book->status==0)<a class=" btn-primary btn-sm" href="{{ url('/admin/approved-booking',$book->id) }}">Approved</a> @endif @if($book->status==1) <a class=" btn-warning btn-sm" href="{{ url('/admin/unapproved-booking',$book->id) }}">Unapproved</a> @endif||<a class=" btn-danger btn-sm"
                    onclick="return confirm('Are you sure delete this booking?')" href="{{ url('/admin/delete-booking',$book->id) }}">Delete</a></td>
                </tr>
                <?php $sl++; ?>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>U-Phone</th>
                  <th>Email</th>
                  <th width="5%">Address</th>
                  <th width="10%">Date - Time</th>
                  <th style="width:5px">Service-quantity</th>
                  <th>Note</th>
                  <th>Service</th>
                  <th>Order since</th>
                  <th class="text-center" style="width:10%">Action</th>
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

<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>

<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('backend/dist/js/demo.js') }}"></script>

<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

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
