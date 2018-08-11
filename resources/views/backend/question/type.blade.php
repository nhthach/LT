@extends('layouts.admin')

@section('cssadmin')

@endsection

@section('content')

 <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->

          <hr>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$breadcrumb}}</h3>
             
              <a href="{{route('admin.role.create')}}" class="btn btn-primary  pull-right">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="questiontypes" class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Nb.Question</th>
                    <th>Active</th>
                    <th >Created</th>
                    <th >Update</th>
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($questiontypes  as $item)
                    <tr  class="odd gradeX" >
                      <td>{{$item->id}}.</td>
                      <td>{{$item->name}}</td>
                        <td>
                          <span class="badge bg-green">{{$item->questionCount}}</span>
                        </td>
                      <td>
                        <span class="badge bg-green">ON</span>
                      </td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->updated_at}}</td>
                      <td>Not Allow</td>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
  </section>
@endsection

@section('jsadmin')

<script>
      $(function () {
        $('#questiontypes').DataTable({
          "pageLength": 100
        })
      })
</script>
@endsection