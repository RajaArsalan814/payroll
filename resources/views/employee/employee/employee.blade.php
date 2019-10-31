@extends('master.layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Employee
        <small>preview of Employee </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup</a></li>
        <li class="active">Employee</li>
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

              <div class="box-tools">
                <div class="input-group input-group-md hidden-xs col-md-offset-7" style="width: 150px;">
                  {{--  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">  --}}

                  <div class="input-group-btn">
                    <a href="{{route('employee.create')}}" class="btn btn-primary ">Create</a>
                    {{--  <button type="submit" class="btn btn-primary">Create</button>  --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Role</th>
                  <th>Shift</th>
                  <th>Father Name</th>
                  <th>Age</th>
                  <th>Gender</th>
                  <th>Hiring Date</th>
                  <th>Department</th>
                  <th>Designation</th>
                  <th>NIC</th>
                  <th>Contact No</th>
                  <th>Employee Type</th>
                  <th>Bank Name</th>
                  <th>Bank Branch</th>
                  <th>Account No</th>
                  <th>Action</th>
                </tr>
                @foreach ($employee as $item)
                <tr>

                  <td>{{$item->code}}</td>
                  <td>{{$item->name}}</td>
                <td><img src="{{asset('/storage').'/'.$item->image}}" style="height:50px;" alt="Image Error occur"></td>
                  <td>{{$item->roles->name}}</td>
                  <td>{{$item->shifts->name}}</td>
                  <td>{{$item->father_name}}</td>
                  <td>{{$item->age}}</td>
                  <td>{{$item->gender}}</td>
                  <td>{{$item->hiring_date}}</td>
                  <td>{{$item->departments->name}}</td>
                  <td>{{$item->designations->name}}</td>
                  <td>{{$item->nic}}</td>
                  <td>{{$item->contact_no}}</td>
                  <td>{{$item->employee_type}}</td>
                  <td>{{$item->bank_name}}</td>
                  <td>{{$item->bank_branch}}</td>
                  <td>{{$item->account_no}}</td>
                  <td><a href="{{route('employee.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a>/<a href="{{route('employee.print',['id'=>$item->id])}}"> <i class="fa fa-print edit"> </i> </a> </td>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
