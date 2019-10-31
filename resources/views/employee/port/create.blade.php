@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Port Detail
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">Port</li>
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
        {{route('port.update',['id'=>$port->id])}}
        @else
        {{route('port.store')}}
        @endif
        " method="POST">
        {{--  <div class="field_wrapper">
                <div>
                    <input type="text" name="field_name[]" value=""/>
    <a href="javascript:void(0);" class="add_button"  title="Add field"><img style="height:20px" src="{{url('')}}/uploads/plus.png"/></a>
                </div>
            </div>  --}}

        <div class="field_wrapper">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="code">Code:</label>
                    @if($isEdit==true)
                    <input type="text" name="code" class="form-control" value="{{$port->code}}" >
                    @else
                    <input type="text" name="code" class="form-control"  >
                    @endif
                    <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                </div>
            </div>

            <div class="col-md-3">
                    <div class="form-group">
                        <label for="code">Name:</label>
                        @if($isEdit==true)
                        <input type="text" name="name" class="form-control" value="{{$port->name}}" >
                        @else
                        <input type="text" name="name" class="form-control"  >
                        @endif
                        <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                    </div>
            </div>

            @csrf
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact">Address</label>
                        @if($isEdit==true)
                        <input type="text" name="address" class="form-control" value="{{$port->address}}" >
                        @else
                        <input type="text" name="address" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('address') ?? null}}</span>
                    </div>
            </div>

            <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact">Charges</label>
                        @if($isEdit==true)
                        <select name="charges_id" id="" class="form-control">
                                <option disabled="true" selected>Select Charge Type</option>
                                @foreach ($charges as $item)
                                <option
                                @if($item->id==$port_charges->charges_id)
                                selected
                                @endif
                                value="{{$item->id}}">{{$item->charge_type}}</option>
                                @endforeach
                            </select>
                        @else
                        <select name="charges_id" id="" class="form-control">
                            <option disabled="true" selected>Select Charge Type</option>
                            @foreach ($charges as $item)
                            <option value="{{$item->id}}">{{$item->charge_type}}</option>
                            @endforeach
                        </select>
                        @endif
                        <span class="text-danger">{{$errors->first('charges_id') ?? null}}</span>
                    </div>
            </div>

            <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact">Amount</label>
                        @if($isEdit==true)
                        <input type="text" name="amount" class="form-control" value="{{$port->amount}}" >
                        @else
                        <input type="text" name="amount" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('amount') ?? null}}</span>
                    </div>
            </div>
                {{--  <div class="col-md-3">
                    <br>
                        <div class="form-group">
                                <label for="contact">Add more:</label>
                <a href="javascript:void(0);" class="add_button"   title="Add field"><img style="height:20px" src="{{url('')}}/uploads/plus.png"/></a>
                        </div>
                </div>  --}}
            </div>

        <div class="col-md-3 col-md-offset-3">
            <a href="{{route('port')}}" class="btn btn-primary">Back</a>
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
{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div ><div class="col-md-4" "><label for="code">Code:</label><input type="text" name="code[]" class="form-control"></div><div class="col-md-4" "><label for="description">Description:</label><input type="text" name="description[]" class="form-control"></div><div class="col-md-4" "><label for="charge">Charge Type:</label><input type="text" name="charge_type[]" class="form-control"></div><a href="javascript:void(0);" class="remove_button"><img style="height:20px;margin-top:20px;margin-left:20px;" src="{{url('')}}/uploads/crose.png"/></a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>  --}}
