@section("breadcrumb")
    <li><a >{{$article->category['name']}}</a></li>
     <li><a >{{$article->title}}</a></li>
@endsection
@extends('layouts.user')
@section('container')
<div  id="item-acticle">
	<div class="single">
		<div class="single-top">
					{{-- <a href="#">
						{{Html::image($article->shortimg, $article->title, array('class' => 'img-responsive')) }}
					</a> --}}
					<div class=" single-grid">
						<h4>{{$article->title}}</h4>				
							<ul class="blog-ic">
								<li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>Admin</span> </a> </li>
		  						 <li><span><i class="glyphicon glyphicon-time"> </i>{{$article->created_at}}</span></li>		  						 	
		  						 <li><span><i class="glyphicon glyphicon-eye-open"> </i>View: {{$article->view}}</span></li>
		  					</ul>		  						
					<div class="content-article">
						{!!$article->content!!}
					</div>			
					</div>
    				
		</div>
		<hr>
		<div class="single-botton team " >

			<h4>Tin liên quan</h4>
			<input type="hidden" name="url_ajax_articel" id="url_ajax_articel" value="{{asset('api/v1/article-category')}}">
			<input type="hidden" name="url_basic" id="url_basic" value="{{asset('')}}">
			<input type="hidden" name="category" id="category" value="{{$article->category['id']}}">
			<div id="article-category" class="team-bottom">
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

@endsection
@section('jspage')
	<script >
		$(document).ready(function(){ 
			var url = $("#url_ajax_articel").val();
			var urlBasic = $("#url_basic").val()
			var categoryId = $("#category").val();
			var div = $("#article-category");
			var outputText = "";
			$.ajax({
			  type: "POST",
			  url: url,
			  data: {
			  	category: categoryId
			  }
			}).done(function(data) {
				var data = data.data;
				var count =1;
				
				for (var i = 0; i < data.length; i++) {
					if (count == 1){
						outputText += "<div class='row'>";
					}
					var divHtml  = "<div class='col-md-3 team-left'>"
								  +"<a href='"+urlBasic+""+data[i].category_name+"/"+data[i].link+"/"+data[i].id+"'>"
								  +"<img src="+data[i].shortimg+" alt="+data[i].title+"></a>"
								  +"<a href='"+urlBasic+""+data[i].category_name+"/"+data[i].link+"/"+data[i].id+"'>"
								  +"<h4>"+data[i].title+"</h4></a>"
								  +"<p>"+(data[i].shortcontent).slice(0, 100)+"..."+"</p>"	
								  +"</div>";

					outputText += divHtml;
					if (count == 4){
						outputText += "</div>";
						count = 1;
					}else{
						count ++;
					}
				}
				
			 	div.append(outputText);
			});
		});
	</script>
@endsection
