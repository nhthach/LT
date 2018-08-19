
<div class="abt-3 sidebar-right">
		<h3>MẸO LÀM BÀI THI</h3>
		<ul>
			@foreach($topTips as $view)
			<li>
				<a  href='{{asset('/')}}{{App\Library\Library::stripUnicode($view->category['url'])}}/{{App\Library\Library::stripUnicode($view->title)}}/{{$view->id}}'  title='{{$view->title}}'>
				   {!!$view->title!!}
				</a>
			</li>
			@endforeach
		</ul>	
	</div>