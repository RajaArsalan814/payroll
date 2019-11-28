{{--  !DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  --}}
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    
    {{--  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset(url(''))}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset(url(''))}}/bower_components/font-awesome/css/font-awesome.min.css">  --}}

</head>
<body>
     @foreach ($attendance_view as $item)
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-right">
                <h4>Attendance Sheet</h4>

            </div>
            <br>
            <div class="col-md-3"></div>
            <div class="col-md-3">
                    @foreach ($item->attendance as $check)
                    {{--  <td  >{{$check->attendance_date}}</td>  --}}
                    @endforeach

            </div>
            <div class="col-md-6">

                <h6>Name  : <span>{{$item->name}}</span></h6>
            </div>
            <div class="col-md-6">
                    <h6>Shift : <span>{{$item->shifts->shift_desc}}</span></h6>
            </div>
            <div class="col-md-6">
                    <h6>Department  : <span>{{$item->departments->name}}</span></h6>
                </div>
                <div class="col-md-6">
                    <h6>Designation  : <span>{{$item->designations->name}}</span></h6>
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
                            {{--  @foreach ($attendance_view as $item)  --}}
                            {{--  @foreach ($attendance_view_table as $item)  --}}
                    <tr>

                            @foreach ($item->attendance as $check)
                            <tr>
                                <td  style="display:none">
                                {{$item->shifts->end_time}}
                                {{$item->check_out_time}}
                                {{-- Working Hours --}}
                                {{$my_check_out_time=Carbon\Carbon::parse($check->check_out_time)->format('H:i')}}
                                {{$check_start_time=Carbon\Carbon::parse($check->check_in_time)->format('H:i')}}
                                {{$check_end_time=Carbon\Carbon::parse($check->check_out_time)}}
                                {{$working_hours=$check_end_time->diffInHours($check_start_time)}}
                                {{-- Over Time --}}
                                {{$shift_end_time=Carbon\Carbon::parse($item->shifts->end_time)}}
                                {{$check_out_time=Carbon\Carbon::parse($check->check_out_time)}}
                                {{$over_time=$shift_end_time->diffInHours($check_out_time)}}
                                    {{-- Late in Time  --}}
                                {{$start_time=Carbon\Carbon::parse($item->shifts->start_time)}}
                                {{$check_in_time=Carbon\Carbon::parse($check->check_in_time)}}
                                {{$late_in_minutes=$check_in_time->diffInMinutes($start_time)}}
                                {{--  Early In Time --}}
                                {{$shift_start_time=Carbon\Carbon::parse($item->shifts->start_time)}}
                                {{$check_in_time=Carbon\Carbon::parse($check->check_in_time)}}
                                {{$early_in_minutes=$check_in_time->diffInMinutes($shift_start_time)}}
                                </td>
                            <td>{{$check->attendance_date}}</td>
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
                            @if($check_in_time  AND $check_out_time >= $item->shifts->end_time)
                            <td>Present</td>
                            @elseif($check_in_time)
                            <td>Half Day</td>
                            @else
                            <td>Absent</td>
                            @endif
                            </tr>
                            @endforeach

                    </tr>
                </table>


            </div>
        </div>
    </div>
    <div class="container">
            <div class="row">
                <br>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="form-group align-right ">
                        {{ $attendance_view->links() }}
                    </div>
                </div>
            </div>
        </div>

    @endforeach
    </body>
    </html>