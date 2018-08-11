@section('title')
	Thi thử
@endsection

@section("breadcrumb")
    <li><a href="{{route('license.type')}}">Thi thử</a></li>
@endsection
@section('cssuser')
	
@endsection

@extends('layouts.user')
@section('container')
    
    <div class="exam">
   
    <div class="exam-header">
            <h1 class="exam-heading-h1">
              Thi thử bằng lái xe máy chuẩn nhất
            </h1>
        </div>
        <div class="exam-container">
             <examIndex></examIndex>
            
    </div>

    </div>
@endsection