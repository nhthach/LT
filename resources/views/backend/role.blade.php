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
             
              {{-- <a href="{{route('admin.role.create')}}" class="btn btn-primary  pull-right">Add</a> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="roles" class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                      <th>ID.</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Nb.Admin</th>
                      <th>Create At</th>
                      <th>Update At</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($roles as $item)
                    <tr class="odd gradeX">
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td class="center"><span class="badge bg-green">{{$item->adminCount}}</span></td>
                        <td class="">{{$item->created_at}}</td>
                        <td class="">{{$item->updated_at}}</td>
                        <td class="">
                          <a href="{{ route('admin.role.edit', $item->id) }}">Edit</a> | 
                          <a href="#" onclick="deleteItem('{{ route('admin.role.delete', $item->id)}}','{{$item->id}}')">Del</a>
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
        $('#roles').DataTable({
          "pageLength": 100
        })
      })
</script>
@endsection