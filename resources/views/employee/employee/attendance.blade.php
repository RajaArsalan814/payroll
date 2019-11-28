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


            </div>
            <div class="box-body table-responsive no-padding">
                <form action="{{route('attendance_by_date')}}" method="get">
                    <div class="col-md-3" >
                        {{-- <input type="date" class="form-control" name="date"  placeholder="Search"> --}}
                        <select name="designation_id" class="form-control" id="">
                            <option disabled="true" selected>Select Designation</option>
                            @foreach ($designation as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @csrf
                    <div class="col-md-3" >
                            <select name="department_id" class="form-control" id="">
                                    <option disabled="true" selected>Select Department</option>
                                    @foreach ($department as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="col-md-3" >
                        <input type="month"  class="form-control" name="month">
                    </div>
                    <button class="btn btn-primary">Search</button>
                </form>

                    <table class="table table-hover">
                            <tr>
                              <th>S:No</th>
                              <th>Employee Name</th>
                              <th> Date</th>
                              <th>Clock In  </th>
                              <th>Clock Out </th>
                              <th>O.T</th>
                              <th>Work Hrs</th>
                              <th>Late In Min</th>
                              <th>Early In Min</th>
                              <th>Remarks</th>
                            </tr>

                            <tr>
                                    @foreach ($attendance as $item)
                                    <td  style="display:none">
                                    {{$item->employee->shifts->end_time}}
                                    {{$item->check_out_time}}
                                    {{-- Working Hours --}}
                                    {{$my_check_out_time=Carbon\Carbon::parse($item->check_out_time)->format('H:i')}}
                                    {{$check_start_time=Carbon\Carbon::parse($item->check_in_time)->format('H:i')}}
                                    {{$check_end_time=Carbon\Carbon::parse($item->check_out_time)}}
                                    {{$working_hours=$check_end_time->diffInHours($check_start_time)}}
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
                                <td>{{$item->attendance_date}}</td>
                                <td>{{$check_start_time}}</td>
                                <td>{{$my_check_out_time}}</td>
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
                                @else
                                <td>Absent</td>
                                @endif
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
