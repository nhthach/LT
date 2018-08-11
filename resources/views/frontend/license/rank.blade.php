@section('title')
	Thi thử
@endsection

@section("breadcrumb")
     <li><a href="{{route('license.type')}}">Thi thử</a></li>
    @if($licenseType->id)
        <li>  
            <a href='{{route("license.rank",[App\Library\Library::stripUnicode($licenseType->name),$licenseType->id])}}'>
            {{$licenseType->name}}
            </a>
        </li>
    @endif
@endsection
@section('cssuser')
	
@endsection

@extends('layouts.user')
@section('container')
    
    <div class="exam">
   
    <div class="exam-header">
            <h1 class="exam-heading-h1">
              Thi thử bằng lái xe {{$licenseType->name}} chuẩn nhất 
            </h1>
        </div>
        <div class="exam-container">
            <div class="ex ex_option_license">
                    <div class=" ex ex_option_exam licenseRank" id="licensetype">
                        <div class="row">
                            <div class="col-xs-6 col-md-10">
                                <div class="list-group">
                                    @foreach($licenseType->licenseranks as $rank)
                                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">
                                     {{$rank->name}}                         
                                    </a>
                                     @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
    </div>
    <style type="text/css">
        .ex_ProQuiz_content {
                width: 100%;
            }
        .ex_ProQuiz_content h2 {
                font-size: 16px !important;
                margin-bottom: -14px !important;
                padding-left: 10px;
                text-align: center;
            }
    </style>
@endsection
