@extends('layouts.app')

@section('content')

 <section class="banner">
    <div class="carousel" id="mainBnner">

        <div class="item"><img src="{{ asset('frontend/images/All-Service-img/Ac banner-2.jpg') }}" alt=""></div>

        <div class="item"><img src="{{ asset('frontend/images/All-Service-img/Stove-2.jpg') }}" alt=""></div>

        <div class="item"><img src="{{ asset('frontend/images/All-Service-img/Home-Appliance.jpg') }}" alt=""></div>

        <div class="item"><img src="{{ asset('frontend/images/All-Service-img/Home-change-banner.jpg') }}" alt=""></div>

    </div>

    <div class="banner-nav">
        <div class="prev"><span class="icon icon-arrow-left"></span></div>
        <div class="next"><span class="icon icon-arrow-right"></span></div>
    </div>
        <div class="banner-text">
          <div class="title text-center">
          </div>
        </div>
</section>

<section class="service-type">
    <div class="container">
        <div class="heading">

            <div class="text">
                <h2>Our Services</h2>
            </div>
            <div class="info-text">We Provide all service Carefully.</div>
        </div>
        <div class="service-catagari">
            <ul>
                @foreach(App\Models\Category::where(['parent_id'=>0])->orderBy('id', 'asc')->get() as $category)
             <li>
            <a href="services?service_id=<?php print $category->id; ?>">
                <span class="text">{{ $category->name }}</span>
            </a>
            </li>
            @endforeach
        </ul>
    </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="home-event">
            <div class="heading">
                <div class="text">
                    <h2>Recent Services post</h2>
                </div>
                <div class="info-text">Take service as your need.We always with you to solve your problem.</div>
            </div>
            <div class="row">
                <div class="event-slider">
           @foreach(App\Models\ServicesPost::orderBy('id', 'desc')->limit(7)->get() as $service)
           <div class="item">
                <div class="event-box">
                    <div class="img">
                    <a href="{{ url('service-details',$service->id) }}">
                            <img src="{{asset('/')}}/images/services-post/{{$service->image}}" alt="" width="280" height="200">
                            <span class="capsan">
                            <span>{{App\Models\Category::where(['id'=>$service->category_id])->pluck('name')[0] }}</span>
                            </span>
                        </a>
                    </div>
                    <div class="name">{{ App\Models\Category::where(['id'=>$service->category_id])->pluck('name')[0] }}</div>
                    <p>{{ $service->title }}</p>
                    <a href="{{ url('service-details',$service->id) }}">Readmore</a>
                </div>
            </div>
            @endforeach
                </div>
            </div>

        </div>
    </div>
</section>


@endsection
