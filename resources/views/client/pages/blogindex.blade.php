@extends('client.master')
@section('title','TechStore')
@section('content')
<section class="cat_product_area section_gap">
    <div class="container">
    <h2 style=" font-size:30px;" class="title text-center">Các tin tức nổi bật</h2>
        <div class="product_top_bar">
            <div clas='left_dorp'>
                @foreach($blogs as $value)
                <div class="single-blog-post">
                    <h3 style="font-size: 20px;">{{$value->title}}</h3>
                    <a href="">
                        <img src="{{ URL::to('public/uploads/blog/'.$value->picture) }}" style="width:400px" alt="">
                    </a>
                    <p>{{$value->summary}}</p>
                    <a style="color: blue;"  href="{{url('blogs/details')}}/{{$value->id}}">Đọc tiếp...</a><br></br>
                </div>
                @endforeach
            </div>

        </div>
        {{ $blogs->links('pagination::bootstrap-4') }}
    </div>
</section>
@endsection