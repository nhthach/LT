@extends('layouts.admin')



@section('content')

	 <section class="content">
      <div class="row">
		<div class="col-md-12 ">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">{{$breadcrumb}}</h3>
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
               @endif
            </div>
             

            {!! Form::open([
                    'route' => [ 'admin.exam.update', $exam->id ],
                    'method' => 'PUT',
                    'class' => 'form-horizontal',
                    'enctype'=> 'multipart/form-data'
                ])
            !!}
                @include('backend.exam._form', [ 'button_name' => 'Update' ])

            {!! Form::close() !!}


           
        </div>
      </div>

  </section>
@endsection


