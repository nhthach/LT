

<div class="col-md-6 abt-left">
{{-- 	<a href='{{route("article.category",[App\Library\Library::stripUnicode($item->category['url']),
									 App\Library\Library::stripUnicode($item->title),$item->id])}}' >
 --}}
	<a  href='{{asset('/')}}{{App\Library\Library::stripUnicode($item->category['url'])}}/{{App\Library\Library::stripUnicode($item->title)}}/{{$item->id}}'>

	{{Html::image($item->shortimg, $item->title, array('class' => 'img-responsive')) }}
	{{-- <img src="{{asset('plugins/monetization/jquery.min.js')}}" alt="{{$item->title}}" /> --}}
	</a>
	<h6>{{$item->category['name']}}</h6>
	<h3>
		<a  href='{{asset('/')}}{{App\Library\Library::stripUnicode($item->category['url'])}}/{{App\Library\Library::stripUnicode($item->title)}}/{{$item->id}}'>
			{{$item->title}}
		</a>
	</h3>
	<p>{{$item->shortcontent}}</p>
	<label>{{$item->created_at}}</label>
</div>