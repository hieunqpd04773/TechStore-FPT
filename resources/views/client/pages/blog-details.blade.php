@extends('client.master')
@section('title','TechStore')
@section('content')
<div class="box" style="margin:0 160px">
	<div class="blog-post-area">
		<div class="single-blog-post">
			<h1 style="font-size: 35px;text-align: center;">{{$blogs->title}}</h1>
			<div class="post-meta" id="{{$blogs->id}}" style='display:inline-block'>
					<span style="float:left"><img width="250px" style="padding-bottom: 400px;" src="{{ asset('public/uploads/blog') }}/{{$blogs->picture}}" alt=""></span>
					
					<p style="font-size:15px;margin-left:280px">{{$blogs->content}}</p>				
			</div>
		</div>
	</div>
</div>


@endsection