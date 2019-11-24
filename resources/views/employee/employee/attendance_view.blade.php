<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset(url(''))}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset(url(''))}}/bower_components/font-awesome/css/font-awesome.min.css">

</head>
<body>
    @foreach ($attendance_view as $item)
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Attendance Sheet</h4>
            </div>
            <div class="col-md-6">

                <h6>Name  : <span>{{$item->employee->name}}</span></h6>
            </div>
            <div class="col-md-6">
                    <h6>Shift : <span>{{$item->employee->shifts->shift_desc}}</span></h6>
            </div>
            <div class="col-md-6">
                    <h6>Department  : <span>{{$item->employee->departments->name}}</span></h6>
                </div>
                <div class="col-md-6">
                    <h6>Designation  : <span>{{$item->employee->designations->name}}</span></h6>
                </div>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <tr>
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
                            <td  style="display:none">
                            {{$item->employee->shifts->end_time}}
                            {{$item->check_out_time}}
                            {{-- Working Hours --}}
                            {{$check_start_time=Carbon\Carbon::parse($item->check_in_time)}}
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
                        <td>{{$item->attendance_date}}</td>
                        <td>{{$item->check_in_time}}</td>
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
                        @else
                        <td>Absent</td>
                        @endif
                    </tr>

                </table>
            </div>
            </div>
        </div>
        @endforeach
    </body>
    </html>

