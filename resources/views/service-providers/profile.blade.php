@extends('layouts.ServiceProviders_layout')

@section('title', 'Profile')
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
        Service-Provider profile
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>


    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../images/Sp_Profile/{{ Auth::user()->image}}" alt="User profile picture">

            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">{{Auth::user()->job_title}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>{{Auth::user()->email}}</b>
                </li>
                <li class="list-group-item">
                  <b>{{Auth::user()->phone}}</b>
                </li>
                <li class="list-group-item">
                  <b>Member since</b> <a class="pull-right">{{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</a>
                </li>
              </ul>
              <a href="{{ route('ServicePro.edit.profile') }}" class="btn btn-primary btn-block">Update info</a>
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

<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>

<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
@endsection
