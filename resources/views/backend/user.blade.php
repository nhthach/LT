@extends('layouts.admin')

@section('cssadmin')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')

 <section class="content">
      <div class="row">
        <div class="col-xs-12">           
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$breadcrumb}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="questions" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>ID.</th>
                      <th>L.Type</th>
                      <th>Q.Type</th>
                      <th>Short Content</th>
                      <th>Create At</th>
                      <th>Update At</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($questions as $item)
                    <tr class="odd gradeX">
                        <td>{{$item->id}}</td>
                        <td>{{$item->linceseType["name"]}}</td>
                        <td>{{$item->questionType["name"]}}</td>
                        <td class="">{{$item->content}}</td>
                        <td class="">{{$item->created_at}}</td>
                        <td class="">{{$item->updated_at}}</td>
                        <td class="">
                          <a href="{{ route('admin.question.edit', $item->id) }}">Edit</a> | <a href="">Del</a>
                        </td>
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
        $('#questions').DataTable()
      })
</script>
@endsection