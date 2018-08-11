

@section('cssadmin')
    <link rel="stylesheet" href="{{ asset('components/summernote/summernote.css')}}">
@endsection

 <div class="box-body">
    <div class="form-group">
      {!! Form::label('article[category]', 'Category*', [ 'class' => 'col-sm-2 control-label' ]) !!}
      <div class="col-sm-10">
        {!!
          
          Form::select('article[category]', $categories, $article->category_id,
                         [ 'class' => 'form-control' ])
        !!}

      </div>
    </div>
    <hr>
     <div class="form-group">
        {!! Form::label('article[name]', 'Title* ', [ 'class' => 'col-sm-2 control-label' ]) !!}
        <div class="col-sm-10">
          {!!
            Form::text('article[title]', $article->title ,['required','id' => 'title ', 'class'=>'form-control'])
            
          !!}
          <span class="help-block">This field is required</span>
        </div>
     </div>

     <div class="form-group">
      {!! Form::label('article[shortcontent]', 'Short Content*', [ 'class' => 'col-sm-2 control-label' ]) !!}
      <div class="col-sm-10">
        {!!
          Form::textarea('article[shortcontent]', $article->shortcontent ,['class'=>'form-control','rows'=>'5','required','id' => 'shortcontent '])
          
        !!} 
        <span class="help-block">This field is required</span>
      </div>
    </div>
     <div class="form-group">
      {!! Form::label('shortimg', 'Image ', [ 'class' => 'col-sm-2 control-label' ]) !!}
      <div class="col-sm-10">
       @if($article->id)
        <div class="form-group">
            <div class="col-sm-10 ">
                  {{Html::image($article->shortimg, 'shortimg', array('class' => 'rounded float-left','style'=>'width: 50%;height: 50%;')) }}
            </div>
          </div>
       @endif
        <div class="form-group">
          <div class="col-sm-10">
                {!!Form::file('shortimg')!!} 
              <span class="help-block">This field is required</span>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('article[content]', 'Content*', [ 'class' => 'col-sm-2 control-label' ]) !!}
      <div class="col-sm-10">
        {!!
          Form::textarea('article[content]', $article->content,['required','id' => 'content'])
          
        !!}
        <span class="help-block">This field is required</span>
      </div>
    </div>  
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
               {!!Form::checkbox('article[isactive]', $article->isactive,$article->isactive?$article->isactive:'checked',
                                  [!$article->isactive?'disabled':'']) !!} Active *
            </label>
          </div>
        </div>
      </div>
 </div>
 <div class="box-footer">
     <a href="{{route('admin.article.index')}}" class="btn btn-danger pull-left">Cancel</a>
      {{Form::submit($button_name,[ 'class' => 'btn btn-info pull-right' ])}}
</div>

@section ('jsadmin')
 <script src="{{ asset('components/summernote/summernote.js')}}"></script>
  <script>
          $('#content').summernote({
              height: 400,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: false                  // set focus to editable area after initializing summernote
            });

    </script>
@endsection
