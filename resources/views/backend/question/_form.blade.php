

@section('cssadmin')
    <link rel="stylesheet" href="{{ asset('components/summernote/summernote.css')}}">
@endsection

{!!Form::hidden('exam[host]', route('admin.exam.question') ,['id' => 'question-url', 'class'=>'form-control','readonly'])!!}
{!!Form::hidden('exam[question_id]', $question->id ,['id' => 'question-id', 'class'=>'form-control','readonly'])!!}
{!!Form::hidden('licensetype_id', $question->licensetype_id ,['id' => 'question-licensetype-id', 'class'=>'form-control','readonly'])!!}
{!!Form::hidden('questiontype_id', $question->questiontype_id ,['id' => 'question-type-id', 'class'=>'form-control','readonly'])!!}
{!!Form::hidden('exam_id', $question->getExamId() ,['id' => 'exam_id', 'class'=>'form-control','readonly'])!!}
{!!Form::hidden('license_rank_id', $question->getLicenseRankId() ,['id' => 'license_rank_id', 'class'=>'form-control','readonly'])!!}
 <div class="box-body">
    <div class="row justify-content-center align-items-center">
      <div class="col-sm-6">
        <div class="form-group">
          {!! Form::label('question[linceseType]', 'License Type', [  'class' => 'col-sm-4 control-label' ]) !!}
          <div class="col-sm-8">
            {!! Form::select('question[licenseType]', $licenseType, $question->licensetype_id,['id' => 'license_type', 'class' => 'form-control' ])!!}
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('question[questionType]', 'Question Type', [ 'class' => 'col-sm-4 control-label' ]) !!}
          <div class="col-sm-8">
            {!!Form::select('question[questionType]', $questiontypes, $question->questiontype_id,['class' => 'form-control' ])!!}
          </div>
        </div>
      </div>
      {{-- end-tab-left --}}
      <div class="col-sm-6 align-items-left">
        <div class="form-group">
          {!! Form::label('question[rank]', 'Class', [ 'class' => 'col-sm-2 control-label' ]) !!}
          <div class="col-sm-8">
            {!! Form::select('question[rank]',$licenseRanks, $question->getLicenseRankId(),[ 'id' => 'license_rank','class' => 'form-control' ])!!}
          </div>
        </div>
        <div class="form-group">
          {!! Form::label('question[exam]', 'Exams', [ 'class' => 'col-sm-2 control-label' ]) !!}
          <div class="col-sm-8">
            {!!Form::select('question[exam]',['--Select option--'],null,['id' => 'license_exam','class' => 'form-control' ])!!}
          </div>
        </div>
      </div>
      {{-- end-tab-right --}}

    </div>
    <hr>
     <div class="form-group">
      {!! Form::label('question[name]', 'Name', [ 'class' => 'col-sm-2 control-label' ]) !!}
      <div class="col-sm-10">
        {!!
          Form::text('question[name]', $question->name,['required','id' => 'name', 'class'=>'form-control'])
          
        !!}
        <span class="help-block">This field is required</span>
      </div>
    </div>
      <div class="form-group">
      {!! Form::label('question[content]', 'Content', [ 'class' => 'col-sm-2 control-label' ]) !!}
      <div class="col-sm-10">
        {!!
          Form::textarea('question[content]', $question->content,['required','id' => 'content'])
          
        !!}
        <span class="help-block">This field is required</span>
      </div>
    </div>
      <div class="form-group">
       {!! Form::label('question[answers]', 'Answers', [ 'class' => 'col-sm-2 control-label' ]) !!}
       {!!Form::hidden('countAnswers',count($question->answers)>0?count($question->answers):1,['id'=>'countAnswers','required'])!!}
        <div class="col-sm-10" id="answers">
          @if(count($question->answers)>0)
              @foreach($question->answers as $ans)
                  <div class="form-group answers_child" id="answer_{{$ans->id}}" >
                    <div class="col-sm-1"> 
                        {{ Form::checkbox('question[answers]['.$ans->id.'][correct]', $ans->correct,$ans->correct)}}
                    </div>
                    <div class="col-sm-6"> 
                           {!!
                             Form::text('question[answers]['.$ans->id.'][content]',  $ans->content,
                             ['required','id' => 'content','class'=>'form-control'])
                          !!}
                           <span class="help-block">This field is required</span>
                    </div>
                    <div class="col-sm-1"> 
                       {{Form::button('Del',[ 'class' => 'btn btn-danger btn-xs','onclick'=>'delAnswer('.$ans->id.')' ])}}
                    </div>
                  </div>
              @endforeach 
          @else
             <div class="form-group answers_child" id="answer_1" >
                    <div class="col-sm-1"> 
                        {{ Form::checkbox('question[answers][1][correct]', '')}}
                    </div>
                    <div class="col-sm-6"> 
                           {!!
                             Form::text('question[answers][1][content]','',['required','id' => 'content','class'=>'form-control','placeholder'=>'Enter answer....'])
                          !!}
                           <span class="help-block">This field is required</span>
                    </div>
                    <div class="col-sm-1"> 
                       {{Form::button('Del',[ 'class' => 'btn btn-danger btn-xs','onclick'=>'delAnswer(1)' ])}}
                    </div>
                  </div>
          @endif
              <h6 >
                <button id="add-question"  type="button" class="btn btn-primary btn-xs">Add</button>
              </h6>
        </div>

      </div>

        <div class="form-group">
        {!! Form::label('question[suggestions]', 'Suggestions', [ 'class' => 'col-sm-2 control-label' ]) !!}
        <div class="col-sm-10">
          {!!
            Form::textarea('question[suggestions]', $question->suggestions,['required' => 'required','id' => 'suggestions'])
          !!}
          <span class="help-block">This field is required</span>
        </div>
      </div>
      <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>
                 {!!Form::checkbox('question[isactive]', $question->isactive,$question->isactive?$question->isactive:'checked',
                                    [!$question->isactive?'disabled':'']) !!} Active
              </label>
            </div>
          </div>
        </div>
</div>

 <div class="box-footer">
     <a href="{{route('admin.question.index')}}" class="btn btn-danger pull-left">Cancel</a>
      {{Form::submit($button_name,[ 'class' => 'btn btn-info pull-right' ])}}
</div>

@section ('jsadmin')
 <script src="{{ asset('components/summernote/summernote.js')}}"></script>
  <script>
    $(function() {

      var S_E_LICENSE_TYPE = $('#license_type')
      var S_E_LICENSE_RANK = $('#license_rank')
      var URL_GET_RANK_EXAM  = $("#question-url").val();
      var QUESTION_IDS  = $("#question-id").val();
      var EXAM_ID = $("#exam_id").val();

      $('#content').summernote({
              height: 400,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: false                  // set focus to editable area after initializing summernote
            });
     $('#suggestions').summernote({
          height: 200,                 // set editor height
          minHeight: null,             // set minimum height of editor
          maxHeight: null,             // set maximum height of editor
          focus: false                  // set focus to editable area after initializing summernote
        });
     $("#add-question").click(function(){
            var count = parseInt($("#countAnswers").val());
               $("#answers").prepend(
                        ' <div class="form-group answers_child" id="answer_'+(count+1)+'" ><div class="col-sm-1">'+
                        ' <input class="form-check-input" type="checkbox" value="" id="defaultCheck1 name=question[answers]['+(count+1)+'][correct]">'+  
                        ' </div>'+
                        '<div class="col-sm-6">'+
                        '<input type="text" required name="question[answers]['+(count+1)+'][content]"class="form-control" id="question[answers]['+(count+1)+'][content]" placeholder="Enter answer....">'+
                         '<span class="help-block">This field is required</span> </div>'+    
                         ' <div class="col-sm-1"> '+
                         ' <button id="del-answer" onclick="delAnswer('+(count+1)+')" type="button"  class="btn btn-danger btn-xs">Del</button>'+ 
                         '</div></div>'
                      );
            $("#countAnswers").val(count+1);
      });

  
      S_E_LICENSE_TYPE.on('change', function(){
         console.log('load class');
          PAGE_LOAD_CONTROLLER.load_data_elm('license_rank', $(this).val(), ['ranks']); 
          PAGE_LOAD_CONTROLLER.binding_elm_select('license_exam',null);
      });

      S_E_LICENSE_RANK.on('change', function(){
        console.log('load exams');
        PAGE_LOAD_CONTROLLER.load_data_elm('license_exam', $(this).val(), ['exams'], EXAM_ID);
      });

      PAGE_LOAD_CONTROLLER = {
        // var $ref = $(this) ;
        load_data_elm: function(id_elem, val, type, selected = null ){
              $.ajax({
              type: "post",
              url: URL_GET_RANK_EXAM,
              data: { object: val , TYPE: type } ,
              success: function( data ) {
                PAGE_LOAD_CONTROLLER.binding_elm_select(id_elem,data[type], selected);
              }
          });
        },
        binding_elm_select: function(id_elem,data, selected_val = null){
          $('#'+id_elem+'').children().remove(); 

          if (selected_val == null )
            $('#'+id_elem+'') .append($("<option></option>").attr("value",'').text('--Select option--'));
          if( data != null)
          {
             $.each(data, function(key, value) {
              var selected = selected_val !=null && selected_val == key ? true : false ; 
               $('#'+id_elem+'').append($("<option></option>").prop('selected', selected).attr("value",key).text(value));
            });   
          }
        }
      }
      if (QUESTION_IDS == ''){
        S_E_LICENSE_TYPE.trigger('change');
      }else{
        S_E_LICENSE_RANK.trigger('change');
      }

      
    });
          
    function delAnswer(val){
          var count = parseInt($("#countAnswers").val());
          
          if(count>1){
            $("#answer_"+val).remove();
            var lenghList = $(".answers_child").length;
            $("#countAnswers").val(lenghList);
            // updateElement(lenghList);
          }
    }
         

         

    </script>
@endsection
