
<!DOCTYPE html>
<html>
@include('frontend.partials.header')

<body>
	<!--header-top-starts-->
	<div class="header-top">
		<div class="container">
			<div class="head-main">
				 <h1 class='title-header' itemprop='headline'>
                                        {{$config->title}}
                  </h1>
				{{-- <a href="index.html"><img src="{{ asset('img/page/logo-1.png')}}" alt="" /></a> --}}
			</div>
		</div>
	</div>
	<!--header-top-end-->
	<!--start-header-->
	{{-- start-menu --}}
	 @include('frontend.partials.menu')
	<!--banner-starts-->
	 {{-- @include('frontend.partials.banner') --}}
	<!--banner-end-->
	<!--about-starts-->
	<div class="about">
		<div class="container">
			<div class="about-main">
				<ol class="breadcrumb">
				  <li><a href="{{route('home')}}">Trang chủ</a></li>
				  @yield("breadcrumb")
				  {{-- <li class="active">Data</li> --}}
				</ol>
		    </div>
				<div class="div" id="left">
					<div class="col-md-8 about-left" id="main" >
						@yield('container')
   					 </div>
					
				</div>
				<div class="div" id="right">
					@include('frontend.partials.sidebar_right')
				</div>
				<div class="clearfix"></div>			
		</div>		
	</div>
	<!--about-end-->
	<!--slide-starts-->
	{{-- @include('frontend.partials.slide_footer') --}}
		
	<!--slide-end-->
	<!--footer-starts-->
	@include('frontend.partials.footer')
	<!--footer-end-->
	<div class="scroll-top">
		<a href="#" id="scroll" style="display: none;"><span></span></a>
	</div>
	<style type="text/css">
		#scroll {
		    position:fixed;
		    right:10px;
		    bottom:10px;
		    cursor:pointer;
		    width:50px;
		    height:50px;
		    background-color:#3498db;
		    text-indent:-9999px;
		    display:none;
		    -webkit-border-radius:60px;
		    -moz-border-radius:60px;
		    border-radius:60px
		}
		#scroll span {
		    position:absolute;
		    top:50%;
		    left:50%;
		    margin-left:-8px;
		    margin-top:-12px;
		    height:0;
		    width:0;
		    border:8px solid transparent;
		    border-bottom-color:#ffffff;
		}
		#scroll:hover {
		    background-color:#e74c3c;
		    opacity:1;filter:"alpha(opacity=100)";
		    -ms-filter:"alpha(opacity=100)";
		}
	</style>
	<script type="text/javascript">

		$(document).ready(function(){ 
		    $(window).scroll(function(){ 

		    	var progress = $('.ex_question_header_progress');
		        if ($(this).scrollTop() > 100){ 
		            $('#scroll').fadeIn(); 
		        } else { 
		            $('#scroll').fadeOut(); 
		        } 
		    }); 
		    $('#scroll').click(function(){ 
		        $("html, body").animate({ scrollTop: 0 }, 600); 
		        return false; 
		    }); 


		});
	</script>
	@yield('jspage')
	 <script src="{{asset('js/app.js') }}"></script>
	 <script src="{{ asset('js/page/jquery.flexisel.js')}}"></script>
</body>
</html>