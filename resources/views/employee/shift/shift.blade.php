@extends('master.layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Shift
        <small>preview of shift </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup</a></li>
        <li class="active">Shift</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Shift</h3>

              <div class="box-tools">
                <div class="input-group input-group-md hidden-xs col-md-offset-7" style="width: 150px;">
                  {{--  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">  --}}

                  <div class="input-group-btn">
                    <a href="{{route('shift.create')}}" class="btn btn-primary ">Create</a>
                    {{--  <button type="submit" class="btn btn-primary">Create</button>  --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">


                    <table class="table table-hover">
                            <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Start Time</th>
                              <th>End Time </th>
                              <th>Action</th>
                            </tr>
                            @foreach ($shift as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                              <td>{{$item->shift_desc}}</td>
                              <td>{{ Carbon\Carbon::parse($item['start_time'])->format('H:i') }}</td>
                              <td>{{ Carbon\Carbon::parse($item['end_time'])->format('H:i') }}</td>
                              <td><a href="{{route('shift.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a> </td>
                            </tr>
                            @endforeach
                          </table>


            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
