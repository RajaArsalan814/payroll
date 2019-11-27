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
                              <th>View</th>
                            </tr>
                            @if($attendance->count()>0)
                            <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                <td><p>Record Found Click To get Record</p></td>
                                 {{-- <td><a href="{{route('attendance_view',['designation_id',$designation_id,'department_id',$department_id])}}" class="fa fa-file"></a></td> --}}
                            </tr>
                            @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><p>No Record Found</p></td>
                            </tr>
                            @endif
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
