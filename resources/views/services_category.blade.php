@extends('layouts.app')

@section('title', 'Services')

@section('content')
<section class="service-type">
    <div class="container">
        <div class="heading">
            <div class="text">
                <?php $category_id = $_GET['service_id']; ?>
                <h2>Find The {{ App\Models\Category::where(['id'=>$category_id])->pluck('name')[0] }} service as your Need</h2>
            </div>
        </div>
        <div class="service-catagari">
            <ul>
                @foreach(App\Models\Category::where(['parent_id'=>$category_id])->orderBy('id', 'asc')->get() as $category)
                    <li>
                        <a href="{{ url('organization',$category->id) }}">
                            <span><img src="images/categories/{{ $category->img }}" width="280" height="150" ></span>
                            <span class="text">{{ $category->name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</section>
@endsection
