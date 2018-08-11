@extends('layouts.admin')

@section('content')

	 <section class="content">
      <div class="row">
		<div class="col-md-12 ">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit question</h3>
            </div>
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

            {!!Form::model($question,[
                'route' => [ 'admin.question.update', $question->id ],
                'method' => 'PUT',
                'class' => 'form-horizontal'
                ])
             !!}
             @include('backend.question._form', [ 'button_name' => 'Update' ])

             {!!Form::close()!!}

           
        </div>
      </div>

  </section>
@endsection
