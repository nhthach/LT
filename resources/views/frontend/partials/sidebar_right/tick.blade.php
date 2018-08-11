
<div class="abt-2">
		<h3>MẸO LÀM BÀI THI</h3>
		<ul>
			@foreach($topTips as $view)
			<li>
				{{-- <a href='{{route("article.category",[App\Library\Library::stripUnicode($view->category['url']),
												App\Library\Library::stripUnicode($view->title),$view->id])}}'  --}}
				<a  href='{{asset('/')}}{{App\Library\Library::stripUnicode($view->category['url'])}}/{{App\Library\Library::stripUnicode($view->title)}}/{{$view->id}}'  title='{{$view->title}}'>
				   {{$view->title}}
				</a>
			</li>

			{{-- <li><a href="single.html">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</a></li>
			<li><a href="single.html">When an unknown printer took a galley of type and scrambled it to make a type specimen book. </a> </li>
			<li><a href="single.html">It has survived not only five centuries, but also the leap into electronic typesetting</a> </li>
			<li><a href="single.html">Remaining essentially unchanged. It was popularised in the 1960s with the release of </a> </li>
			<li><a href="single.html">Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing </a> </li>
			<li><a href="single.html">Software like Aldus PageMaker including versionsof Lorem Ipsum.</a> </li> --}}
			@endforeach
		</ul>	
	</div>