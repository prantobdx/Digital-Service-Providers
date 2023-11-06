@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<section class="page-header">
    <div class="container text-center">
        <h1 > About us </h1>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="home-event">
            <div class="heading">
                <div class="text">
                    <h2>About</h2>
                </div>
                <div class="info-text">We are always ready to fixed with solve your daily life feaced trouble by professional service providers.</div>
                <div class="stickLine"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                    <p>Digital Service Provider is the best service providing compnay with experience and professional servicers.you can book any services with some validated information,proper time and date as your need and will get services from at home.
                    This site is a online platflom wich is needed for our daily life faced problem.Our customer agent will contact to you within 24 hours working days after you book a service and service provider will go with proper time and also contact to you.All users can communicate with each other through blog site and can visit our services workshop details.After all we provide you  </p>
                    </div>
                </div>
                <div class="heading">
                    <div class="text">
                        <h2>Contact info</h2>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-box">
                        <div class="contactIcon">
                            <span class="icon icon-phone"></span>
                        </div>
                        <a href="telTo:4408007654321">+880-2765 4321</a>
                        <a href="telTo:44047856977145">+880-2856 9771</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-box">
                        <div class="contactIcon">
                            <span class="icon icon-location-1"></span>
                        </div>
                        <address>Corporate-Office: 11/2 Road,Dhanmondi-12, Dhaka-1207
                            Branch-Office:22/5-Road,Mirpour-10,Dhaka-1216
                         </address>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-box">
                        <div class="contactIcon">
                            <span class="icon icon-message"></span>
                        </div>
                        <span>Email - <a href="mailTo:info@Digital-Service-Providers.com">info@Digital-Service-Providers.com</a></span>
                        <span>Website - <a href="#">Digital Service Providers.com</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contackForm" style="margin-top:-120px">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @if(Session::has('message_flash_success'))
                    <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{!! session('message_flash_success') !!} !</strong>
                    </div>
                @endif
            </div>
            <div class="col-sm-12">
                <h2>Contact Form</h2>
            </div>
            <form class="has-validation-callback" action="{{url('/contact-us')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-sm-6">
                    <div class="input-box">
                        <label>Your Name <sup>*</sup></label>
                        <input type="text" data-validation="required" data-validation-error-msg="Name cannot be blank."
                         name="name"  @if (Auth::check())
                          {
                          value="{{ Auth::user()->name }}"
                          }
                         @endif>
                    </div>
                    <div class="input-box">
                        <label>Your Email <sup>*</sup></label>
                        <input type="text" data-validation="email" data-validation-error-msg="Incorrect e-mail address" name="email" @if (Auth::check())
                          {
                          value="{{ Auth::user()->email }}"
                          }
                         @endif>
                    </div>
                    <div class="input-box">
                        <label>Subject <sup>*</sup></label>
                        <input type="text" data-validation="required" data-validation-error-msg="Subject cannot be blank." name="subject">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-box">
                        <label>Your Message <sup>*</sup></label>
                        <textarea data-validation="required" data-validation-error-msg="Message cannot be blank." name="message"></textarea>
                    </div>
                    <input type="submit" class="btn" value="Submit">
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
