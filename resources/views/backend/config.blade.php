@extends('layouts.admin')

@section('cssadmin')
 
@endsection

@section('content')

   <section class="content">
      <div class="row">
    <div class="col-md-12 ">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit question</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('admin.config.update', $configs->id) }}"  method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">        
              <div class="box-body">
               <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Title Website</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="Title" name="config[title]" value="{{$configs->title}}" placeholder="Email">
                  </div>
                </div>

         
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Icon</label>

                  <div class="col-sm-10">
                       
                        <div class="form-group">
                          <div class="col-sm-10">
                                <img src="{{asset($configs->icon)}}" style="height: 50px;" class="img-circle" alt="User Image">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-10">
                                <input type="file" id="config[icon]" name="icon">
                              <span class="help-block">This field is required</span>
                          </div>
                        </div>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Picture</label>

                  <div class="col-sm-10">
                       
                        <div class="form-group">
                          <div class="col-sm-10">
                                <img src="{{asset($configs->imgpage)}}" style="height:200px; width:300px;" class="img-fluid img-thumbnail" alt="User Image">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-10">
                                <input type="file" id="icon" name="imgpage" id="config[imgpage]">
                              <span class="help-block">This field is required</span>
                          </div>
                        </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Meta Content</label>

                  <div class="col-sm-10">
                      <textarea name="config[metacontent]" class="form-control" rows="5" id="metacontent" required>{{$configs->metacontent}}</textarea>
                      <span class="help-block">This field is required</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Description </label>

                  <div class="col-sm-10">
                     <textarea class="form-control" rows="5" name="config[description]"  id="description" required>{{$configs->description}}</textarea>
                      <span class="help-block">This field is required</span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                         {!!Form::checkbox('config[isactive]', $configs->isactive,$configs->isactive?'checked':'',['id' => 'config_chk_isactive']) !!}
                          Active
                      </label>
                       {!!Form::hidden('config[is_active]', $configs->isactive,['id' => 'config_ip_isactive']) !!} 
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
   
          <!-- /.box -->
        </div>
      </div>

  </section>
@endsection


@section ('jsadmin')
  <script type="text/javascript">
    $('#config_chk_isactive').click(function() {
        if ($(this).is(':checked')) {
          $('#config_ip_isactive').val(1);
        }else $('#config_ip_isactive').val(0)
      });
  </script>
@endsection