@extends('master.layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Daily O.T Report
        <small>Preview of Daily O.T Report</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup</a></li>
        <li class="active">Daily O.T Report</li>
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
              <h3 class="box-title">Employee</h3>

              {{--  <div class="box-tools">
                <div class="input-group input-group-md hidden-xs " >
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                      <input type="text" class="form-control" placeholder="search">
                      <button type="submit" class="btn btn-primary">Search</button>
                      <a href="{{route('employee.create')}}" class="btn btn-primary ">Create</a>
                  </div>
                </div>
              </div>  --}}
            </div>
            <div class="box-body table-responsive no-padding">
                <form action="{{route('attendance_by_date')}}" method="get">
                    <div class="col-md-3" >
                        <input type="date" class="form-control" name="date"  placeholder="Search">
                    </div>
                    @csrf
                    <button class="btn btn-primary">Search</button>
                </form>

                    <table class="table table-hover">
                            <tr>
                              <th>S:No</th>
                              <th>Employee Name</th>
                              <th>Date</th>
                              <th>Check In </th>
                              <th>Check Out</th>
                              <th>Our Time</th>
                            </tr>
                            @foreach ($attendance as $item)
                            <tr>
                                <td  style="display:none">
                                {{$check_out=Carbon\Carbon::parse($item->check_out)}}
                                {{$shift_end_time=Carbon\Carbon::parse($item->shift->end_time)}}
                                {{$over_time=$shift_end_time->diffInHours($check_out)}}
                                </td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->employee->name}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$check_in = Carbon\Carbon::parse($item->check_in)->format('H:s')}}</td>
                            <td>{{$check_out = Carbon\Carbon::parse($item->check_out)->format('H:s')}}</td>
                            <td>{{ $over_time }}</td>
                            </tr>
                            @endforeach
                          </table>



              {{--  <table class="table table-hover">
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Shift</th>
                  <th>Gender</th>
                  <th>Department</th>
                  <th>Designation</th>
                  <th>Contact No</th>
                  <th>Employee Type</th>
                  <th>Action</th>
                </tr>
                @foreach ($employee as $item)
                <tr>

                  <td>{{$item->code}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->roles->name}}</td>
                  <td>{{$item->shifts->name}}</td>
                  <td>{{$item->gender}}</td>
                  <td>{{$item->departments->name}}</td>
                  <td>{{$item->designations->name}}</td>
                  <td>{{$item->contact_no}}</td>
                  <td>{{$item->employee_type}}</td>
                  <td><a href="{{route('employee.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a>/<a href="{{route('employee.print',['id'=>$item->id])}}"> <i class="fa fa-print edit"> </i> </a> </td>
                </tr>
                @endforeach
              </table>  --}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
