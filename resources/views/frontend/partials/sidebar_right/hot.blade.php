
		<div class="abt-2">
			<h3>NỔI BẬT</h3>	
				@foreach($topViewAds as $view)
				<div class="might-grid">
					<div class="grid-might">
						{{-- <a href='{{route("article.category",[App\Library\Library::stripUnicode($view->category['url']),
														 App\Library\Library::stripUnicode($view->title),$view->id])}}'> --}}
						<a  href='{{asset('/')}}{{App\Library\Library::stripUnicode($view->category['url'])}}/{{App\Library\Library::stripUnicode($view->title)}}/{{$view->id}}'>
							{{-- <img src='{{asset($view->shortimg)}}' class="img-responsive" alt="{{$view->title}}">  --}}
							{{Html::image($view->shortimg, $view->title, array('class' => 'img-responsive')) }}
						</a>
						{{-- {{$view->shortimg}} --}}
					</div>
					<div class="might-top">
						<h4>
						<a  href='{{asset('/')}}{{App\Library\Library::stripUnicode($view->category['url'])}}/{{App\Library\Library::stripUnicode($view->title)}}/{{$view->id}}' title='{{$view->title}}'>
							{{$view->title}}
						</a>
						</h4>
						<p>{{$view->shortcontent}}</p> 
					</div>
					<div class="clearfix"></div>
				</div>	
			@endforeach						
			</div>