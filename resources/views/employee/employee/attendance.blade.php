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
              <h3 class="box-title">Date</h3>

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
                              <th> Date</th>
                              <th>Clock In  </th>
                              {{-- <th>Check In Time </th> --}}
                              <th>Clock Out </th>
                              {{-- <th>Check Out Time</th> --}}
                              <th>O.T</th>
                              <th>Work Hrs</th>
                              <th>Late In Min</th>
                              <th>Early In Min</th>
                              <th>Remarks</th>
                            </tr>
                            @foreach ($attendance as $item)
                            <tr>
                                <td  style="display:none">
                                    {{$item->employee->shifts->end_time}}
                                    {{$item->check_out_time}}
                                {{-- {{$check_in=Carbon\Carbon::parse($item->check_in)}} --}}
                                {{--  {{$check_in_time = date("h:i:s ",strtotime($check_in))}}  --}}
                                {{--  {{$check_out_time = date("h:i:s ",strtotime($check_out))}}  --}}

                                {{-- Working Hours --}}
                                {{$check_start_time=Carbon\Carbon::parse($item->check_in_time)}}
                                {{$check_end_time=Carbon\Carbon::parse($item->check_out_time)}}
                                {{$working_hours=$check_end_time->diffInHours($check_start_time)}}
                                {{-- $totalDuration = $finishTime->diffInHours($startTime); --}}

                                {{-- $diff = $t1->diff($t2); --}}
                                {{-- Over Time --}}
                                 {{$shift_end_time=Carbon\Carbon::parse($item->employee->shifts->end_time)}}
                                {{$check_out_time=Carbon\Carbon::parse($item->check_out_time)}}
                                {{$over_time=$shift_end_time->diffInHours($check_out_time)}}
                                    {{-- Late in Time  --}}
                                {{$start_time=Carbon\Carbon::parse($item->employee->shifts->start_time)}}
                                {{$check_in_time=Carbon\Carbon::parse($item->check_in_time)}}
                                {{$late_in_minutes=$check_in_time->diffInMinutes($start_time)}}
                                {{--  Early In Time --}}
                                {{$shift_start_time=Carbon\Carbon::parse($item->employee->shifts->start_time)}}
                                {{$check_in_time=Carbon\Carbon::parse($item->check_in_time)}}
                                {{$early_in_minutes=$check_in_time->diffInMinutes($shift_start_time)}}
                                </td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->employee->name}}</td>
                            {{-- <td>{{$item->employee->shifts->shift_desc}}</td> --}}
                            <td>{{$item->attendance_date}}</td>
                            {{-- <td>{{$item->check_in_date}}</td> --}}
                            <td>{{$item->check_in_time}}</td>
                            {{-- <td>{{$item->check_out_date}}</td> --}}
                            <td>{{$item->check_out_time}}</td>
                            <td>{{$over_time}}</td>
                            <td>{{$working_hours}}</td>
                            @if($check_in_time > $start_time)
                            <td>{{$late_in_minutes}}</td>
                            @else
                            <td>0</td>
                            @endif
                            @if($shift_start_time > $check_in_time )
                            <td>{{$early_in_minutes}}</td>
                            @else
                            <td>0</td>
                            @endif
                            @if($check_in_time )
                            <td>Present</td>
                            {{-- @if($item->check_out_time = '17:00')
                            <td>Half Day</td>
                            @else
                            <td>Full  Day</td>
                            @endif --}}
                            @else
                            <td>Absent</td>
                            @endif
                             {{-- if($check_out_time <= '17:00')
                            <td>Half Day</td>
                            @else
                            <td>Absent</td>
                            @endif --}}
                            {{-- <td>{{$check_in->toTimeString()}}</td>
                            <td>{{$check_out->toTimeString()}}</td>
                            <td>{{ $over_time }}</td> --}}
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
