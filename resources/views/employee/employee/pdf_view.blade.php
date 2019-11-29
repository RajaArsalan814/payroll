<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset(url(''))}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <title>Attendance</title>
    <style>
        .class
        {
            margin-left:40%;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
          }
          
          td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 1px;
          }
          .record{
              background:red;

          }

        div.left, div.right {
            height:20px;
            float: left;
            padding: 10px;    
        }
        div.left {
        }
        div.right {
            margin-left: 10%;
        }
       

        div.a_left, div.a_right, div.aa_right {
            height:20px;
            float: left;
        display: block;
            padding: 10px;    
        }
        div.a_left {

            margin-top: -20px;
        }
        div.a_right {
            margin-left: 10%;
        }
        div.aa_right {
            margin-left: 9%;
        }

        .summary
        {
            margin-top:10px;
        }
     
      
    </style>                                                                                                                                                          
</head>
<body>
        @foreach ($attendance_view as $item)
       
    <div class="class">
        <h3 class="align-center">Attendance</h3>
    </div>

        <div class="left">
                <p>Name :   <span>{{$item->name}}</span></p> 
                <p>Department : <span>{{$item->departments->name}}</span></p>
        </div>
        <div class="right">      
            <p>Shift :   <span>{{$item->shifts->shift_desc}}</span></p> 
            <p>Designation : <span>{{$item->designations->name}}</span></p>
        </div>
<br><br><br><br>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Clock In</th>
                <th>Clock Out</th>
                <th>O.T</th>
                <th>Work Hrs</th>
                <th>Late In Min</th>
                <th>Early In Min</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
          

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

           
        </tbody>
    </table>
    {{--  <br><br><br><br>
    <br><br><br><br>  --}}

    <div class="summary">
        <h5>Summary </h5>
    </div>
    <div class="a_left" style="font-size:13px;">
            <p>No Of Presents :   <span>{{$item->attendance_count}}</span></p> 
            <p>No Of Late Arrivals :   <span>0</span></p> 
            <p>No Of Hours(OT) :   <span>0</span></p> 
    </div>
    <div class="a_right" style="font-size:13px;">      
            <p>No Of Absents :   <span>0</span></p> 
            <p>No Of Half Days :   <span>0</span></p> 
            <p>No Of Holidays :   <span>0</span></p> 
    </div>
    <div class="aa_right" style="font-size:13px;">      
            <p>No Of Leaves :   <span>0</span></p> 
            <p>No Of Early Departure :   <span>0</span></p> 
            <p>No Of Holidays Half Day :   <span>0</span></p> 
    </div>
<br><br><br><br><br><br><br><br>
    @endforeach

  
</body>
</html>