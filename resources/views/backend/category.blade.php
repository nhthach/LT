@extends('layouts.admin')

@section('cssadmin')

@endsection

@section('content')

 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{$breadcrumb}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="categories" class="table table-bordered table-hover dataTable">
                <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Parent</th>
                      <th>Nb.Acticle</th>
                      <th>Active</th>
                      <th >Created</th>
                      <th >Update</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                @foreach($categories  as $item)
                    <tr>
                      <td>{{$item->id}}.</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->parent['name']}}</td>
                        <td>
                          <span class="badge bg-green">{{$item->articleCount}}</span>
                        </td>
                      <td>
                        <span class="badge bg-green">ON</span>
                      </td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->updated_at}}</td>
                      <td>No  </td>
                    </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
  </section>
@endsection

@section ('jsadmin')

@section('jsadmin')

<script>
      $(function () {
        $('#categories').DataTable({
          "pageLength": 100
        })
      })
</script>
@endsection