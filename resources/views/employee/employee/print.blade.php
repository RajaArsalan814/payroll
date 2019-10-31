<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>

  .myinput {
  outline: 1;
  border-width: 0 0 1px;
  border-color: gray
}
/* body
{
    background: skyblue;
} */
/* .myinput:focus {
  border-color: green
} */
@media print {
    #printbtn {
        display :  none;
    }
}
    </style>
</head>
<body>
<br>
    <div class="container">
   


       <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7">
                    <h2 class="text-center">ANIS APPAREL</h2>
                    <h6 class="text-center">Plot # 165-166 , Sector 23 , Korangi Industrial Area , Karachi , Pakistan</h6>
                    <h6 class="text-center">ملازمت کا فارم</h6>
                </div>
                <div class="col-md-3    text-center">
                        <div class="form-group ">
                                <img src="{{asset('/storage').'/'.$employee->image}}" style="height:120px;" alt="Image Error occur">                        
                        </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                            <label for="exampleInputEmail1">کارڈ نمبر</label>
                            <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->code}}">
                </div>
                </div>

                <div class="col-md-8"></div>
             
                <div class="col-md-2">
                        <div class="form-group">
                                <label for="exampleInputEmail1">محترم /محترمہ </label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->name}}">
                        </div>
                </div>

                <div class="col-md-2">
                        <div class="form-group">
                                <label for="exampleInputEmail1">تاریخ</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->hiring_date}}">
                    </div>
                    </div>
    
                    <div class="col-md-8"></div>
                 
                    <div class="col-md-2">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">عہدہ</label>
                                    <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->designations->name}}">
                            </div>
                    </div>

                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->name}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Father Name</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->father_name}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Department Name</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->departments->name}}">
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Designation Name</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->designations->name}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">NIC</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->nic}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Marital Status</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->marital_status}}">
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->address}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Contact No</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->contact_no}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Employee Type</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->employee_type}}">
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->mobile}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Bank Name</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->bank_name}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Bank Branch</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->bank_branch}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Role</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->roles->name}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Shift</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->shifts->name}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Data Of Birth</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->date_of_birth}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Account No</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->account_no}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Confirmation Date</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->confirmation_date}}">
                        </div>
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Gender</label>
                                <input type="text" class="form-control myinput"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$employee->gender}}">
                        </div>
                </div>
        </div> 
            <button  onclick="record_print()" id="printbtn" class="btn btn-primary ">Print</button>

    </div>
</body>

<script>

function record_print() {
  window.print();
}
</script>
</html>