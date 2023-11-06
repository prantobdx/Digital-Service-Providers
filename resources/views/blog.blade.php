@extends('layouts.app')

@section('title', 'Blog')

@section('content')

<section class="page-header">
    <div class="container text-center">
        <h1 style="color:#0A14DBFF">Our Blogs</h1>
    </div>
</section>


<section class="content">
	<div class="container">
       <div class="blog-page">
           <div class="row">
               <div class="col-sm-8 col-md-9 col-lg-9">
                  @foreach($blogs as $blog)
                  <div class="blog-slide">
                   <div class="date-view">
                       <div class="date">{{date('d', strtotime($blog->created_at))}}</div>
                       <div class="year">{{date('F,y', strtotime($blog->created_at))}}</div>
                   </div>
                   <div class="blog-info">
                       <h2>{{$blog->title}}</h2>
                       <div class="sub-title">{{$blog->sub_title}}</div>
                       <div class="img"><img src="{{asset('/')}}/images/blog/{{$blog->image}}" alt="" width="550px" height="320px"></div>

                       <div class="outher-link" style="width:550px">
                           <ul>
                               <li class="text-center"style="width:180px"><a href="#"><span class="icon icon-calander-check"></span>{{date('F,Y', strtotime($blog->created_at))}}</a></li>
                               <li class="text-center"style="width:180px"><a href="#"><span class="icon icon-user"></span>{{ App\Models\ServiceProviders::where(['id'=>$blog->posted_by_id])->pluck('name')[0] }}</a></li>

                               <li class="text-center"style="width:180px"> <a href="{{URL::to( '/blog-details/' . $blog->id)}}"><span class="icon icon-comment"></span>{{App\Models\Review::where(['post_id'=>$blog->id])->count() }}  Comment</a></li>
                           </ul>
                       </div>
                       <p>{!!$blog->description!!}</p>
                       <a href="{{ URL::to( '/blog-details/' .$blog->id)  }}" class="btn">Read More</a>
                   </div>
               </div>
               @endforeach
               <div class="blog-slide">
                {{ $blogs->links() }}
            </div>
        </div>

        <div class="col-sm-4 col-md-3 col-lg-3">
           <div class="right-blog">
            <div class="popular-post">
                <h3>Our Services Categories</h3>
                @foreach(App\Models\Category::where('parent_id','!=',0)->orderBy('id', 'desc')->limit(8)->get() as $category)
                <div class="post-slide">
                    <div class="img"><img src="{{asset('/')}}images/categories/{{$category->img}}" alt=""></div>
                    <div class="post-name"><a href="organization/<?php print $category->id; ?>">{{ $category->name }}</a></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="blog-slide">
<div class="blog-readInfo">
        <h2>People also read</h2>
        <div class="row">
            @foreach(App\Models\Blog::where(['status'=>1])->orderBy('id', 'asc')->limit(3)->get() as $blog)
            <div class="col-sm-4 col-xs-4">
                <div class="user-block">
                    <div class="img"><a href="{{ URL::to( '/blog-details/' .$blog->id)  }}"> <img src="{{asset('/')}}/images/blog/{{$blog->image}}" alt="" width="400px" height="220px"></a></div>
                    <div class="name">{{$blog->title}}</div>
                    <div class="date">{{date('d F,Y', strtotime($blog->created_at))}}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>

</div>
</div>
</section>
@endsection
