@extends('layouts.app')

@section('title', 'Service-Providers')

@section('content')
    <div class="searchFilter-main">
        <section class="content">
            <div class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="#">Services</a>/</li>
                        <li class="active"><a href="#"><?php print_r($org_type); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="venues-view">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="left-side">
                                <div class="left-link">
                                    <h2 style="color:#19803AFF">People also viewed...</h2>
                                    <ul>
                                        @foreach(App\Models\Category::where('parent_id','!=',0)->orderBy('id', 'desc')->limit(6)->get() as $category)
                                            <li><a href="{{ url('organization',$category->id) }}"><span class="icon icon-arrow-right"></span> <span style="font-size:14px; color:#DB25A8FF;"> {{ $category->name }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="left-productBox hidden-sm">
                                    <h2>Featured Service</h2>
                                    @foreach(App\Models\ServicesPost::orderBy('id', 'asc')->limit(1)->get() as $service)
                                        <div class="product-img"><img src="../images/services-post/{{$service->image}}" alt=""></div>
                                        <h3>{{ $service->title }}</h3>
                                        <p>{{ $service->sub_title }}</p>
                                        <a href="{{ url('service-details',$service->id) }}">View Details <span class="icon icon-arrow-right"></span></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-12">
                            <div class="right-side">
                                <div class="toolbar">
                                    <div class="finde-count"><?php print_r($org_type); ?></div>
                                </div>
                                @foreach($servicesList as $service)
                                    <div class="venues-slide">
                                        <div class="img"><img src="../images/services-post/{{$service->image}}" width="280" height="200" alt="">
                                        </div>
                                        <div class="text">
                                            <h3>{{ $service->title }}</h3>
                                            <div class="address">{{$service->sub_title}}</div>
                                            <div class="reviews"></div>
                                            <div class="outher-info">
                                                {{$service->location}}
                                            </div>
                                            <div class="outher-link">
                                                <ul>
                                                    <li><a href="#"><span class="icon icon-calander-check"></span>Check Availability</a></li>
                                                    <li><a href="#"><span class="icon icon-info"></span>{{ App\Models\ServiceProviders::where(['id'=>$service->posted_by_id])->pluck('name')[0] }}</a></li>
                                                    <li><a href="javascript:;">
                                                            <span class="glyphicon glyphicon-envelope" style="font-size:15px">&nbsp</span>{{ App\Models\ServiceProviders::where(['id'=>$service->posted_by_id])->pluck('email')[0] }}</a></li>
                                                </ul>
                                            </div>
                                            <div class="button">
                                                <a href="{{ url('service-details',$service->id) }}" class="btn">Book Now</a>
                                                <a href="javascript:;" class="btn gray">View Details <span class="icon icon-arrow-down"></span></a>
                                            </div>
                                        </div>

                                        <div class="amenities-view">
                                            {!! $service->description !!}
                                        </div>
                                    </div>
                                @endforeach
                                {{ $servicesList->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
