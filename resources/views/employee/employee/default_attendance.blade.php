@extends('master.layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Attendance Correction Report
        <small>preview of Attendance Correction Report </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup</a></li>
        <li class="active"> Attendance Correction Report</li>
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
              <h3 class="box-title">Date </h3>

              <div class="box-tools">
                <div class="input-group input-group-md hidden-xs col-md-offset-7" style="width: 150px;">
                  {{--  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">  --}}

                  <div class="input-group-btn">
                    {{--  <a href="{{route('employee.create')}}" class="btn btn-primary ">Create</a>  --}}
                    {{--  <button type="submit" class="btn btn-primary">Create</button>  --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

                    <form action="{{route('default_attendance_by_date')}}" method="get">
                            <div class="col-md-3" >
                                <input type="date" class="form-control" name="date"  placeholder="Search">
                            </div>
                            @csrf
                            <button class="btn btn-primary">Search</button>
                        </form>

                    <table class="table table-hover">
                            <tr>
                              <th>Employee Id</th>
                              <th>Employee Name</th>
                              <th>Date</th>
                              <th>Shift</th>
                              <th>Check In </th>
                              <th>Check Out</th>
                              <th>Update In </th>
                              <th>Update Out</th>
                            </tr>
                            @foreach ($default_attendance as $item)
                            <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->employee->name}}</td>
                              <td>{{ Carbon\Carbon::parse($item['date'])->format('d-m-Y') }}</td>
                              <td>{{$item->shift->shift_desc}}</td>
                              <td>{{ Carbon\Carbon::parse($item['check_in'])->format('H:i') }}</td>
                              <td>{{ Carbon\Carbon::parse($item['check_out'])->format('H:i') }}</td>
                {{--  <td><a href="{{route('default_attendance_check_in.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a></td>  --}}
                <td><a href="{{route('default_attendance_check_in.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a></td>
                <td><a href="{{route('default_attendance_check_out.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a></td>
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
