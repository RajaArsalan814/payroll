<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
        Attendance
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Attendance</li>
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

        <form action="{{route('default_attendance_check_in.update',['id'=>$attendance->id])}}" method="POST">



        <div class="col-md-12">
                <div class="form-group">
                    <label for="contact">Employee Name:</label>
                    <input type="text" required name="employee_id" class="form-control"  disabled="true" value="{{$attendance->employee->name}}" >
                    <span class="text-danger">{{$errors->first('employee_id') ?? null}}</span>
                </div>
            </div>

            @csrf

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Check In:</label>
    <input type="text" id="time" required name="check_in_time" class="form-control" value="{{ $attendance->check_in_time }}" >
                        <span class="text-danger">{{$errors->first('check_in') ?? null}}</span>
                    </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Check Out:</label>
                    <input type="text" id="time" required name="check_out" disabled="true" class="form-control" value="{{$attendance->check_in_time  }}" >
                    <span class="text-danger">{{$errors->first('check_out') ?? null}}</span>
                </div>
        </div>
        <div class="col-md-3 col-md-offset-5">
            <a href="{{route('default_attendance_by_date')}}" class="btn btn-primary">Back</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary ">
                    Update
            </button>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection
<script>
  
  
  var timepicker = new TimePicker('time', {
    lang: 'en',
    theme: 'dark'
  });
  timepicker.on('change', function(evt) {
    
    var value = (evt.hour || '00') + ':' + (evt.minute || '00');
    evt.element.value = value;
  
  });  

</script>