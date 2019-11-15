@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Shift
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">shift</li>
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
        {{route('shift.update',['id'=>$shift->id])}}
        @else
        {{route('shift.store')}}
        @endif
        " method="POST">



        <div class="col-md-6">
                <div class="form-group">
                    <label for="contact">Shift Description:</label>
                    @if($isEdit==true)
                    <input type="text" required name="shift_desc" class="form-control" value="{{$shift->shift_desc}}" >
                    @else
                    <input type="text" required name="shift_desc" class="form-control"  >
                    @endif
                    <span class="text-danger">{{$errors->first('shift_desc') ?? null}}</span>
                </div>
            </div>

            @csrf

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Start Time:</label>
                        @if($isEdit==true)
                        <input type="time" required name="start_time" class="form-control" value="{{ Carbon\Carbon::parse($shift['start_time'])->format('H:i') }}" >
                        @else
                        <input type="time" required name="start_time" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('start_time') ?? null}}</span>
                    </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">End Time:</label>
                    @if($isEdit==true)
                    <input type="time" required name="end_time" class="form-control" value="{{ Carbon\Carbon::parse($shift['end_time'])->format('H:i') }}" >
                    @else
                    <input type="time" required name="end_time" class="form-control" >
                    @endif
                    <span class="text-danger">{{$errors->first('end_time') ?? null}}</span>
                </div>
        </div>
        <div class="col-md-3 col-md-offset-5">
            <a href="{{route('shifts')}}" class="btn btn-primary">Back</a>
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
      </div>
    </div>
  </div>
</section>
</div>
@endsection
