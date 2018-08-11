@extends('layouts.admin')

@section('cssadmin')

@endsection

@section('content')

 <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$breadcrumb}}</h3>
              <a href="{{route('admin.exam.create')}}" class="btn btn-primary  pull-right">Add</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="exams" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>ID.</th>                   
                      <th>Name</th>
                      <th>License Rank</th>
                      <th>License Type</th>    
                      <th>Nb.Question</th>
                      <th>Create At</th>
                      <th>Update At</th>
                      <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($exams as $item)
                    <tr class="odd gradeX">
                        <td>{{$item->id}}</td>
                        <td class="">{{$item->name}}</td>
                        <td>{{$item->licenseRank["name"]}}</td>
                        <td>{{$item->licenseRank->licenseType["name"]}}</td>
                        <td>
                           <span class="badge bg-green">{{$item->exDetailCount}}</span>
                        </td>
                        <td class="">{{$item->created_at}}</td>
                        <td class="">{{$item->updated_at}}</td>
                        <td class="">
                          <a href="{{ route('admin.exam.edit', $item->id) }}">Edit</a> | 
                          <a href="#" onclick="deleteItem('{{ route('admin.exam.delete', $item->id)}}','{{$item->id}}')">Del</a>
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

@section ('jsadmin')

<script>
      $(function () {
        $('#exams').DataTable({
          "pageLength": 100
        })
      })
</script>
@endsection