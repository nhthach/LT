<head>
<title>{{$config->title}} | @yield('title')</title>

<link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64 96x96" href="{{asset($config->icon)}}">
{{-- <link rel="apple-touch-icon" sizes="57x57" href="{{asset($config->icon)}}" />
<link rel="apple-touch-icon" sizes="114x114" href="{{asset($config->icon)}}" /> --}}
{{-- <link rel="apple-touch-icon" sizes="72x72" href="/img/icons/gold/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="144x144" href="/img/icons/gold/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="60x60" href="/img/icons/gold/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon" sizes="120x120" href="/img/icons/gold/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="76x76" href="/img/icons/gold/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="152x152" href="/img/icons/gold/apple-touch-icon-152x152.png" /> --}}
<link rel="icon" type="image/png" href="{{asset($config->icon)}}" sizes="196x196" />
<link rel="icon" type="image/png" href="{{asset($config->icon)}}" sizes="96x96" />
<link rel="icon" type="image/png" href="{{asset($config->icon)}}" sizes="32x32" />
<link rel="icon" type="image/png" href="{{asset($config->icon)}}" sizes="16x16" />
<link rel="icon" type="image/png" href="{{asset($config->icon)}}" sizes="128x128" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta charset='utf-8'/>
<meta content='width=device-width,minimum-scale=1,initial-scale=1' name='viewport'/>
<meta content='IE=9; IE=8; IE=7; IE=EDGE; chrome=1' http-equiv='X-UA-Compatible'/>

<meta name="keywords" content="{{$config->metacontent}}" />
<meta name="keywords" content="{{$config->metacontent}}" />
<meta name="keywords" content="{{$config->description}}" />
<meta property="og:url"           content="{{route('license.type')}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$config->title}}" />
<meta property="og:description"   content="{{$config->description}}" />
<meta property="og:image"         content="{{asset($config->imgpage)}}" />
<link href='{{url("/")}}' hreflang='x-default' rel='alternate'/>

<script type="application/x-javascript"> 
	addEventListener("load", function() 
	{ setTimeout(hideURLbar, 0); }, false); 
   function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!-- Bootstrap 3.3.7 -->
  {{-- <link rel="stylesheet" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{ asset('css/page/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ asset('css/page/style.css')}}">
  <link rel="stylesheet" href="{{ asset('css/page/page.css')}}">
<!-- jQuery 3 -->
<script src="{{ asset('components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!---- start-smoth-scrolling---->

<script src="{{ asset('js/page/move-top.js')}}"></script>
<script src="{{ asset('js/page/easing.js')}}"></script>
<script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/monetization/monetization.js')}}"></script>
<script src="{{ asset('plugins/monetization/jquery.min.js')}}"></script>

@yield('cssuser')
 
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>