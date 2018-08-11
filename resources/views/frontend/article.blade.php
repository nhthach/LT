@section('title')
	Tin tức
@endsection
@section("breadcrumb")
    <li><a >{{$breadcrumb}}</a></li>
@endsection
@extends('layouts.user')
@section('container')
<div class="article">
		<div class="about-one">
						<p>Thông tin</p>
					<h3>Các bài viết nổi bât</h3>
				</div>
		<div class="about-tre">
				 <?php $count =1; ?>	 
				@foreach ($articles as $item )
					 @if($count==1)
					 	<div class="a-1">
					 @endif
					 		@include('frontend.article.item',['item' => $item])
					 		 
					@if($count==2)
						</div>
						<div class="clearfix"></div>
					 	 <?php $count=0;?>	 
					 @endif			
					 <?php $count++;?>	 					
				@endforeach
		</div>	
		<div id="Pagination" class="Pagination" style="text-align: center;">
				{{$articles->render()}}
	    </div>
		
	</div>
@endsection