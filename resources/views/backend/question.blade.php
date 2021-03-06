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
             
              <a href="{{route('admin.question.create')}}" class="btn btn-primary  pull-right">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="questions" class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                      <th>ID.</th>
                      <th>L.Type</th>
                      <th>Q.Type</th>
                      <th>Name</th>
                      <th>Create At</th>
                      <th>Update At</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($questions as $item)
                    <tr class="odd gradeX">
                        <td>{{$item->id}}</td>
                        <td>{{$item->licenseType["name"]}}</td>
                        <td>{{$item->questionType["name"]}}</td>
                        <td class="">{{$item->name}}</td>
                        <td class="">{{$item->created_at}}</td>
                        <td class="">{{$item->updated_at}}</td>
                        <td class="">
                          <a href="{{ route('admin.question.edit', $item->id) }}">Edit</a> | 
                          <a href="#" onclick="deleteItem('{{ route('admin.question.delete', $item->id)}}','{{$item->id}}')">Del</a>
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
        $('#questions').DataTable({
          "pageLength": 100
          
        })
      })
</script>
@endsection