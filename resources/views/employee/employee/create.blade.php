@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Employee
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Employee</li>
          </ol>
        </section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">

      <div class="box box-danger">
        <div class="box-header">
        </div>
        <div class="box-body">

        <form action="
        @if($isEdit==true)
        {{route('employee.update',['id'=>$employee->id])}}
        @else
        {{route('employee.store')}}
        @endif
        " method="POST" enctype="multipart/form-data">

        <div class="col-md-6">
            <div class="form-group">
              @if($isEdit==true)
              {{-- <input type="file"   name="file"  class="form-control" value="{{$employee->image}}">
              <img src="{{asset('/storage').'/'.$employee->image}}" style="height:50px;" alt="Image Error occur"> --}}
              {{-- <input type="text" name="age" class="form-control" value="{{$employee->age}}" > --}}
              @else
              {{-- <img src="{{asset(url(''))}}/uploads/profile.jpg" style="height:150px;width:150px;"  alt="..." class="img-thumbnail form-control"> --}}
              <label for="image">Image</label>
              <input type="file"   name="file"  required class="form-control">
                {{-- <input type="text" name="age" class="form-control"> --}}
                @endif
                <span class="text-danger">{{$errors->first('file') ?? null}}</span>
            </div>
        </div>


        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="age">Age:</label>
                    @if($isEdit==true)
                    <input type="text" name="age" required class="form-control" value="{{$employee->age}}" >
                    @else
                    <input type="text" name="age" required class="form-control">
                    @endif
                    <span class="text-danger">{{$errors->first('age') ?? null}}</span>
                </div>
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Hiring Date:</label>
                        @if($isEdit==true)
                        <input type="date" required name="hiring_date" class="form-control" value="{{$employee->hiring_date}}" >
                        @else
                        <input type="date" required name="hiring_date" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('hiring_date') ?? null}}</span>
                    </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Date Of Birth:</label>
                    @if($isEdit==true)
                    <input type="date" required name="date_of_birth" class="form-control" value="{{$employee->date_of_birth}}" >
                    @else
                    <input type="date" required name="date_of_birth" class="form-control" >
                    @endif
                    <span class="text-danger">{{$errors->first('date_of_birth') ?? null}}</span>
                </div>
        </div>


            @csrf
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Name:</label>
                        @if($isEdit==true)
                        <input type="text" required name="name" class="form-control" value="{{$employee->name}}" >
                        @else
                        <input type="text" required name="name" class="form-control"  >
                        @endif
                        <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                    </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="father">Father Name:</label>
                        @if($isEdit==true)
                        <input type="text" required name="father_name" class="form-control" value="{{$employee->father_name}}" >
                        @else
                        <input type="text" required name="father_name" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('father_name') ?? null}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Select Department:</label>
                    @if($isEdit==true)
                    <select name="department_id" required id="" class="form-control">
                        @foreach ($department as $item)
                        <option
                      @if($item->id==$employee->departments->id)
                      selected
                      @endif
                        value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <select name="department_id" id="" required class="form-control">
                      <option value="">Select Department</option>
                        @foreach ($designation as $item)
                        <option
                        value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @endif

                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Select Designation:</label>
                        @if($isEdit==true)
                        <select name="designation_id" id="" required class="form-control">
                            @foreach ($designation as $item)
                            <option   
                             @if($item->id==$employee->designations->id)
                                selected
                              @endif 
                                value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <select name="designation_id" id="" required class="form-control">
                            <option disabled="true" selected>Select Designation </option>
                            @foreach ($designation as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @endif

                    </div>
                </div>




                <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Select Role:</label>
                        @if($isEdit==true)
                        <select name="role_id" id="" required class="form-control">
                            @foreach ($role as $item)
                            <option

                            @if($item->id==$employee->roles->id)
                            selected
                            @endif
                            value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <select name="role_id" id="" required class="form-control">
                          <option value="">Select Role</option>  
                          @foreach ($role as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @endif
    
                    </div>
                </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Select Shift:</label>
                            @if($isEdit==true)
                            <select name="shift_id" required id="" class="form-control">
                                @foreach ($shift as $item)
                                <option
                                @if($item->id==$employee->shifts->id)
                                selected
                                @endif
                                value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @else
                            <select name="shift_id" id="" required class="form-control">
                                <option disabled="true" selected>Select Shift</option>
                                @foreach ($shift as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @endif
    
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code">Select Employee Type:</label>
                            @if($isEdit==true)
                            <select name="employee_type" required id="" class="form-control">                          
                                <option
                                @if($employee->employee_type=='Permanent')
                                selected
                                @endif
                                value="Permanent">Permanent</option>
                                <option
                                @if($employee->employee_type=='Temporary')
                                selected
                                @endif
                                value="Temporary">Temporary</option>
                            </select>
                            @else
                            <select name="employee_type" id="" required class="form-control">
                                <option selected disabled="true">Select Employee Type</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Temporary">Temporary</option>
                            </select>
                            @endif
    
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                                <label for="father">Confirmation_date:</label>
                                @if($isEdit==true)
                                <input type="date" name="confirmation_date" required class="form-control" value="{{$employee->confirmation_date}}" >
                                @else
                                <input type="date" name="confirmation_date" required class="form-control" >
                                @endif
                                <span class="text-danger">{{$errors->first('confirmation_date') ?? null}}</span>
                        </div>
                    </div>
 
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="father">NIC:</label>
                            @if($isEdit==true)
                            <input type="text" name="nic" class="form-control" required value="{{$employee->nic}}" >
                            @else
                            <input type="text" name="nic" required class="form-control" >
                            @endif
                            <span class="text-danger">{{$errors->first('nic') ?? null}}</span>
                    </div>
                </div>

                
 
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="father">Account Number:</label>
                            @if($isEdit==true)
                            <input type="text" name="account_no" required class="form-control" value="{{$employee->account_no}}" >
                            @else
                            <input type="text" name="account_no" required class="form-control" >
                            @endif
                            <span class="text-danger">{{$errors->first('account_no') ?? null}}</span>
                    </div>
                </div>


           


                
 
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="father">Gender:</label>
                            @if($isEdit==true)
                            <input type="radio" required name="gender"  
                            @if($employee->gender=='male')
                            checked="true"
                            @endif
                            value="male"
                              >Male
                            <input type="radio" required name="gender"
                            @if($employee->gender=='female')
                            checked="true"
                            @endif
                            value="female"  >Female
                            @else

                            <input type="radio" name="gender" required  value="male"  >Male
                            <input type="radio" name="gender" required  value="female"  >Female
                            @endif
                            <span class="text-danger">{{$errors->first('gender') ?? null}}</span>
                    </div>
                </div>





                <div class="col-md-6">
                    <div class="form-group">
                            <label for="marital_status">Marital Status</label>
                            @if($isEdit==true)
                            <input type="radio" required name="marital_status" 
                            @if($employee->marital_status=='single')
                            checked="true"
                            @endif
                            value="single"  >Single
                            <input type="radio" required name="marital_status"
                            @if($employee->marital_status=='married')
                            checked="true"
                            @endif
                            value="married"  >Married
                            @else
                            <input type="radio" required name="marital_status"  value="single"  >Single
                            <input type="radio" required name="marital_status"  value="married"  >Married
                            @endif
                            <span class="text-danger">{{$errors->first('marital_status') ?? null}}</span>
                    </div>
                </div>
    


            <div class="col-md-6">
                <div class="form-group">
                        <label for="url">Contact No:</label>
                        @if($isEdit==true)
                        <input type="text" required name="contact_no" class="form-control" id="email" value="{{$employee->contact_no}}">
                        @else
                        <input type="text" required name="contact_no" class="form-control" id="email">
                        @endif
                        <span class="text-danger">{{$errors->first('contact_no') ?? null}}</span>
                </div>
            </div>



            <div class="col-md-6">
                <div class="form-group">
                        <label for="url">Code:</label>
                        @if($isEdit==true)
                        <input type="text" name="code" required class="form-control" id="email" value="{{$employee->code}}">
                        @else
                        <input type="text" name="code" required class="form-control" id="email">
                        @endif
                        <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                </div>
            </div>


            
            <div class="col-md-6">
                <div class="form-group">
                        <label for="url">mobile:</label>
                        @if($isEdit==true)
                        <input type="text" name="mobile" required class="form-control" id="email" value="{{$employee->mobile}}">
                        @else
                        <input type="text" name="mobile" required class="form-control" id="email">
                        @endif
                        <span class="text-danger">{{$errors->first('mobile') ?? null}}</span>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                        <label for="url">Bank Name:</label>
                        @if($isEdit==true)
                        <input type="text" name="bank_name" required class="form-control" id="email" value="{{$employee->bank_name}}">
                        @else
                        <input type="text" name="bank_name" required class="form-control" id="email">
                        @endif
                        <span class="text-danger">{{$errors->first('bank_name') ?? null}}</span>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                        <label for="url">Bank Branch:</label>
                        @if($isEdit==true)
                        <input type="text" name="bank_branch" required class="form-control" id="email" value="{{$employee->bank_branch}}">
                        @else
                        <input type="text" name="bank_branch" required class="form-control" id="email">
                        @endif
                        <span class="text-danger">{{$errors->first('bank_branch') ?? null}}</span>
                </div>
            </div>





        <div class="col-md-3 col-md-offset-5">
            <a href="{{route('employees')}}" class="btn btn-primary">Back</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary ">
                    @if($isEdit==true)
                    Update
                    @else
                    Create
                    @endif
            </button>
        </div>
        </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- /.box -->

    </div>
    <!-- /.col (left) -->

    <!-- /.col (right) -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
</div>
@endsection
