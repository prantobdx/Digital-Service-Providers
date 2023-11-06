@extends('layouts.app')

@section('title', 'Blog details')

@section('content')
<section class="page-header">
    <div class="container text-center">
        <h1>Blog Details</h1>
    </div>
</section>

 <section>
 <div class="col-md-8">
            @if(Session::has('add_review_flash_error'))
            <div class="alert alert-danger alert-block alert-dismissible fade in"  id="myAlert">
              <button type="button" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
              <strong>{!! session('add_review_flash_error') !!} !</strong>
          </div>
          @endif
          @if(Session::has('add_review_flash_success'))
          <div class="alert alert-success alert-dismissible fade in"  id="myAlert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>{!! session('add_review_flash_success') !!} !</strong>
          </div>
          @endif
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible" id="myAlert">
              <a href="" class="close">&times;</a>
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>
                    <strong>Oh sanp!</strong> {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
 </section>

<section class="content">
	<div class="container">
    	<div class="blog-page">
        	<div class="row">
            	<div class="col-sm-8 col-md-9 col-lg-9">
                	<div class="blog-slide">
                    	<div class="date-view">
                        	<div class="date">{{date('d', strtotime($blog->created_at))}}</div>
                            <div class="year">{{date('F,y', strtotime($blog->created_at))}}</div>
                        </div>
                        <div class="blog-info">
                        	<h2>{{$blog->title}}</h2>
                            <div class="sub-title">{{$blog->sub_title}}
                            </div>
                            <div class="img"><img src="../images/blog/{{$blog->image}}" alt="" width="450px" height="250px"></div>
                            <div class="outher-link">
                            <ul>
                        	<li><a href="#"><span class="icon icon-calander-check"></span>{{date('F,Y', strtotime($blog->created_at))}}</a></li>
                     <li><a href="#"><span class="icon icon-user"></span>
                        {{ App\Models\ServiceProviders::where(['id'=>$blog->posted_by_id])->pluck('name')[0] }}</a></li>
                        <li><a href="{{ URL::to( '/blog-details/' . $blog->id)}}"><span class="icon icon-comment"></span> {{App\Models\Review::where(['post_id'=>$blog->id])->count()}}Comment</a></li>
                            </ul>
                            </div>
                            <p>{!!$blog->description!!}</p>
                        </div>
                        <div class="comment-view">
                        	<h2>{{App\Models\Review::where(['post_id'=>$blog->id])->count()}} Comments</h2>

                        	@foreach($reviews as $review)
                            <div class="comment-box">
                            <div class="user-img"><img src="{{asset('/')}}/frontend/images/user icon -4.png" width="20%" height="15%" > </div>
                                <div class="comment">
                                	<div class="name">{{ App\Models\User::where(['id'=>$review->user_id])->pluck('name')[0] }} <span>on {{ date('d F,Y', strtotime($review->created_at))}}</span> <span> {{$review->created_at->diffForHumans()}}</span></div>
                                  <div class="sub-title">{{ $review->summery }}</div>
                                    <p>{{ $review->review }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    <div class="add-comment">
                    <h2>Leave a comment <span class="icon icon-comment">
                    </span></h2>
                            <div class="jumbotron">
                        <form action="{{ url('/blog-review') }}" method="post">
		                        <div class="review-form">
		                        	{{csrf_field()}}
		                            <div class="single-form">
		                                <input type="hidden" name="post_id" value="{{$blog->id}}" />
		                            </div>
		                            <div class="form-group">
		                                <label>Review <sup>*</sup></label>
		                                <textarea name="massage" cols="10" rows="4"  class="form-control" placeholder="Write your review....."></textarea>
		                            </div>
		                        </div>
		                        <div class="review-form-button">
		                            <button type="submit" class="btn btn-success btn-flat" name="submit_review">Post Comment</button>
		                        </div>
		                	</form>
                        </div>
                        </div>

                        <div class="blog-readInfo">
                                <h2>People also read</h2>
                                <div class="row">
                                    @foreach(App\Models\Blog::where(['status'=>1])->orderBy('id', 'asc')->limit(3)->get() as $blog)
                                    <div class="col-sm-4 col-xs-4">
                                        <div class="user-block">
                                    <div class="img"><a href="{{ URL::to( '/blog-details/' .$blog->id)  }}">
                                     <img src="../images/blog/{{$blog->image}}" alt="" width="380px" height="180px"></a>
                                   </div>
                                            <div class="name">{{$blog->title}}</div>
                                            <div class="date">{{date('d F,Y', strtotime($blog->created_at))}}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-3 col-lg-3">
                	<div class="right-blog">
                        <div class="categories-box">
                            <h3>Categories</h3>
                            <ul>
                    @foreach(App\Models\Category::where('parent_id','!=',0)->orderBy('id', 'asc')->limit(7)->get() as $category)
            <li><a href="{{ url('organization',$category->id) }}">
              <span class="icon icon-arrow-right"></span> <span style="font-size:14px; color:#DB25A8FF;">{{ $category->name }}</span></a></li>
                            @endforeach
                            </ul>
                        </div>
                     <div class="popular-post">
                        <h3>Our Services</h3>
                         @foreach(App\Models\ServicesPost::orderBy('id', 'desc')->limit(7)->get() as $service)
                        <div class="post-slide">
                            <div class="img"><img src="../images/services-post/{{$service->image}}" alt=""></div>
                            <div class="post-name"><a href="{{ url('service-details',$service->id) }}">{{ $service->title }}</a></div>
                        </div>
                        @endforeach
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
