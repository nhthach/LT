

@section('cssadmin')
   
@endsection
{!!Form::hidden('exam[id]', $exam->id,['required','id' => 'exam_id', 'class'=>'form-control'])!!}
{!!Form::hidden('rank', $exam->getRank(),['required','id' => 'obj_rank', 'class'=>'form-control'])!!}
{!!Form::hidden('exam[host]', route('admin.exam.question') ,['required','id' => 'question-url', 'class'=>'form-control','readonly'])!!}
{!!Form::hidden('exam[url-datatale]', route('admin.exam.datatable') ,['required','id' => 'url-datatale', 'class'=>'form-control','readonly'])!!}
{!!Form::hidden('exam[action]', strtolower($button_name) ,['required','id' => 'action', 'class'=>'form-control','readonly'])!!}

 <div class="box-body">
    <div class="row">
       <div class="col-sm-6">
           <div class="form-group">
            {!! Form::label('exam[licenserank]', 'License Type*', [ 'class' => 'col-sm-4 control-label' ]) !!}
            <div class="col-sm-8">
              {!!   
                Form::select('exam[licenseType]', $licenseTypes, $exam->licenserank['licensetype_id'], [ 'class' => 'form-control', $exam->id?'readonly':'','id'=>'licenseType'])

              !!}
              
                
            </div>
          </div>
        <div class="form-group">
            {!! Form::label('exam[licenserank]', 'Rank (Class)*', [ 'class' => 'col-sm-4 control-label' ]) !!}
            <div class="col-sm-8">
              {!!   
                Form::select('exam[licenserank]',$exam->id?$objRank->licenseType->licenseranks->pluck('name', 'id'): $licenseRanks, $exam->licenserank_id, [ 'class' => 'form-control','id'=>'licenserank' ])
              !!}

            </div>
          </div>
          <div class="form-group">
            {!! Form::label('exam[name]', 'Name* ', [ 'class' => 'col-sm-4 control-label' ]) !!}
            <div class="col-sm-8">
              {!!
                Form::text('exam[name]', $exam->name,['required','id' => 'name ', 'class'=>'form-control'])
                
              !!}
              <span class="help-block">This field is required</span>
            </div>
         </div>
          <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8">
              <div class="checkbox">
                    <label>
                       {!!Form::checkbox('exam[isactive]', $exam->isactive,$exam->isactive?$exam->isactive:'checked',
                                          [!$exam->isactive?'disabled':'disabled']) !!} Active *
                    </label>
                  </div>
                </div>
        </div>
        <hr>
        <div class="form-group">
            {!! Form::label('exam[name]', 'License Type* ', [ 'class' => 'col-sm-4 control-label' ]) !!}
            <div class="col-sm-8">
              {!!   
                Form::select('exam[questiontype]', $questionTypes,'', [ 'class' => 'form-control', 'id'=>'questiontype' ])
              !!}
            </div>
         </div>
          <div class="form-group">
            {!! Form::label('exam[name]', 'ID Question Choosen* ', [ 'class' => 'col-sm-4 control-label' ]) !!}
            <div class="col-sm-8">
              {!!Form::text('exam[question_selected_ids]',implode(',',$exam->examsDetail->pluck('question_id')->toArray()),['required','id' => 'question_selected_ids', 'class'=>'form-control','readonly'])!!}
            </div>
         </div>
        <hr>
       </div>
        <div class="col-sm-6">
          <span class="help-block">Tổng số câu hỏi: <a class="help-block-total">{{$exam->exDetailCount}}</a> câu</span>
          <hr>
          <table id="examTable" data-source=route('admin.exam.datatable')   class="table table-bordered table-hover">
            <thead>
            <tr>
              <th class="sorting_disabled">
                <input disabled="disabled" class="chk_all"  id="chk_all"  name="exam[chk_all]" type="checkbox">
              </th>
              <th>No.</th>
              <th>Qu.Name</th>
              <th>Qu.Type</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
       </div>
    </div>
 </div>
 <div class="box-footer">
     <a href="{{route('admin.exam.index')}}" class="btn btn-danger pull-left">Cancel</a>
      {{Form::submit($button_name,[ 'class' => 'btn btn-info pull-right' ])}}
</div>

@section ('jsadmin')
 <script>
  
$(function() {

  var examId = $("#examId").val();
  var host  = $("#question-url").val();
  var QUESTION_SELECTED_IDS = $("#question_selected_ids").val().split(',');
  var LICENSE_TYPE_ID = $("#licenseType");
  var ACTION = $('#action').val();
  var resourceURL = "{{route('admin.exam.datatable',['LICENSE_TYPE_ID'=>':LICENSE_TYPE_ID'])}}";
  var RANK = JSON.parse($("#obj_rank").val());
  var EXAM_ID = parseInt($('#exam_id').val());
  function aoColumnDefs (){
    return [
        {
          'bSearchable': false,
          'aTargets': [0]
        }, {
          'bSortable': false,
          'aTargets': [0]
        }, {
          'sClass': 'string',
          'aTargets': ['4']
        },
        {
          'sClass': 'int',
          'aTargets': ['1']
        }
      ];
  }

  function columns(){
    return [
            {
              'sWidth': 'null'
            }, {
              'sWidth': 'null',
              'sClass': 'word-wrap'
            }, {
              'sWidth': 'null'
            }, {
              'sWidth': 'null'
            }
          ];
  }

  function drawCallback(){
    
    if (QUESTION_SELECTED_IDS == ""){
       QUESTION_SELECTED_IDS =new Array();
    }
       
     $("#chk_all").on('change', function() {
      if ($(this).prop('checked')) {
         $("#examTable input[type='checkbox'].chk_child").prop('checked', true);
      }else{
         $("#examTable input[type='checkbox'].chk_child").prop('checked', false);
      }
    });

    $('.chk_child').each(function(){
        if (QUESTION_SELECTED_IDS.includes($(this).val())) {
          $(this).prop('checked', true);
        }
    });
   
    $("#examTable input[type='checkbox'].chk_child").on('click', function(){
      console.log('is checked:' + $(this).prop('checked') );
      if (RANK.nbquestion <= QUESTION_SELECTED_IDS.length && $(this).prop('checked')) 
       {
         console.log('Over load...');
         return false
       }

      var seft = $(this);
      if ($.inArray($(this).val(), QUESTION_SELECTED_IDS) == -1)
      {
         QUESTION_SELECTED_IDS.push(seft.val());
      }else{
        QUESTION_SELECTED_IDS = $.grep(QUESTION_SELECTED_IDS, function(v){
            return v !== seft.val();
          });
      }
      $('#question_selected_ids').val(QUESTION_SELECTED_IDS);
      $('.help-block-total').text(QUESTION_SELECTED_IDS.length);

   });

    // $("#examTable_filter input[type='search']").unbind();

    // $("#examTable_filter input[type='search']").on('keydown', function(e){
    //   var str = this.value;
    //   if (e.keyCode == 13) {
    //     $("#examTable").DataTable().search(this.value);
    //   }
    // });
  }  
   
  var CALL_PAGE_LOAD = {

    loadTale: function(val = 1) {
      var URL_DATATABLE_QUESTON = resourceURL.replace("%3ALICENSE_TYPE_ID", LICENSE_TYPE_ID.val()); // Build the route
      
      var DATA_TABLE = $("#examTable").DataTable({
        'sPaginationType': 'full_numbers',
        'bProcessing': true,
        'bServerSide': true,
        'sPageButton': 'paginate_button',
        'bDestroy': true,
        'iDisplayLength': 100,
        "bLengthChange": false,
        'aoColumnDefs': aoColumnDefs(),
        'bAutoWidth': false,
        'aaSorting': [[1, 'asc']],
        'aoColumns': columns(),
        'ajax': {
            url: URL_DATATABLE_QUESTON,
            type : "GET",
            dataType: 'json',
            data: { 
              EXAM_ID: EXAM_ID != NaN || EXAM_ID !=null ? EXAM_ID : 0 ,
              ACTION: ACTION
             },
            error: function(data)
              {
                 console.log(data);
              }
        },
        'fnDrawCallback': function (oSetting) {
           drawCallback();
           return  
        },
        'oLanguage': {
          'sSearch': '',
          'sSearchPlaceholder': 'SEARCH',
          'oPaginate': {
            'sFirst': '',
            'sLast': '',
            'sPrevious': '',
            'sNext': ''
          }
        }
      });
    }
     
  }



  $('#licenseType').on('change', function(){
      loadDataExamAdmin($(this).val());
  });
  
  function loadDataExamAdmin(val){ 
          $.ajax({
            type: "post",
            url: host,
            data: { licenseType: val } ,
            success: function( data ) {
              appendSelect('licenserank',data.rank)
              appendSelect('questiontype',data.questionTypes)
              CALL_PAGE_LOAD.loadTale(val);     
            }
        });
  }

  function appendSelect(IdEl,data){
    $('#'+IdEl+'').children().remove();
    // $('select').children('option:not(:first)').remove();   
    $.each(data, function(key, value) {
         $('#'+IdEl+'')
             .append($("<option></option>")
             .attr("value",key)
             .text(value));
   });
  };
  CALL_PAGE_LOAD.loadTale(LICENSE_TYPE_ID.val);
});



</script>
@endsection
