
<div class="abt-1 sidebar-right">
<h3>NỔI BẬT</h3>	
	@foreach($topViewAds as $view)
		<div class="might-grid">
			<div class="grid-might">
				<a  href='{{asset('/')}}{{App\Library\Library::stripUnicode($view->category['url'])}}/{{App\Library\Library::stripUnicode($view->title)}}/{{$view->id}}'>
					{{Html::image($view->shortimg, $view->title, array('class' => 'img-responsive')) }}
				</a>
			</div>
			<div class="might-top">
				<h4>
				<a  href='{{asset('/')}}{{App\Library\Library::stripUnicode($view->category['url'])}}/{{App\Library\Library::stripUnicode($view->title)}}/{{$view->id}}' title='{{$view->title}}'>
					{!!$view->title!!}
				</a>
				</h4>
				<p>{!!substr($view->shortcontent,0,100)!!}....</p> 
			</div>
			<div class="clearfix"></div>
		</div>	
	@endforeach						
</div>