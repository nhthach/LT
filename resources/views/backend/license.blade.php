@extends('layouts.admin')

@section('cssadmin')

@endsection

@section('content')

 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage License Type</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Nb.Ranks</th>
                  <th>Nb.Question</th>
                  <th>Active</th>
                  <th >Created</th>
                  <th >Update</th>
                  <th >Action</th>
                </tr>
                @foreach($licenseTypes  as $item)
                    <tr>
                      <td>{{$item->id}}.</td>
                      <td>{{$item->name}}</td>
                        <td>
                          <span class="badge bg-green">{{$item->licenseRankCount}}</span>
                        </td>
                        <td>
                          <span class="badge bg-green">{{$item->questionCount}}</span>
                        </td>
                      <td>
                        <span class="badge bg-green">{{$item->isactive?"ON":"OFF"}}</span>
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
      <div class="row">
          <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage License Rank ( Class )</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>License Type</th>
                  <th>Nb.Exam</th>
                  <th>Nb.Ques</th>
                  <th>Nb.Correct</th>
                  <th>Nb.Text</th>
                  <th>Nb.Icon</th>
                  <th>Nb.Pic</th>
                  <th>Time</th>
                  <th>Active</th>
                  <th >Created</th>
                  <th >Update</th>
                  <th >Action</th>
                </tr>
                @foreach($licenseRanks  as $item)
                      <tr>
                        <td>{{$item->id}}.</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->licenseType['name']}}</td>
                        <td>
                          <span class="badge bg-green">{{$item->examCount}}</span>
                        </td>
                        <td>
                          <span class="badge bg-green">{{$item->nbquestion}}</span>
                        </td>
                         <td>
                          <span class="badge bg-green">{{$item->nbcorrect}}</span>
                        </td>
                        <td>
                          <span class="badge bg-blue">{{$item->qt_type_text}}</span>
                        </td>
                         <td>
                          <span class="badge bg-blue">{{$item->qt_type_icon }}</span>
                        </td>
                         <td>
                          <span class="badge bg-blue">{{$item->qt_type_pic}}</span>
                        </td>
                         <td>
                          <span class="badge bg-yellow">{{$item->timework}}</span>
                        </td>
                         <td>
                          <span class="badge bg-green">{{$item->isactive?"ON":"OFF"}} </span>
                        </td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td> 
                          No
                          {{-- <a href="{{ route('admin.question.edit', $item->id) }}">Edit</a> | <a href="">Del</a> --}}
                        </td>
                      </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
  </section>
@endsection

@section ('jsadmin')

@endsection