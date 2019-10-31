@extends('master.layout')
@section('content')

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Container  Detail
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">Container</li>
          </ol>
        </section>

<!-- Main content -->
<section class="content">

  {{--  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Select2</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Minimal</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Disabled</label>
            <select class="form-control select2" disabled="disabled" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Multiple</label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                    style="width: 100%;">
              <option>Alabama</option>
              <option>Alaska</option>
              <option>California</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Disabled Result</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">Alabama</option>
              <option>Alaska</option>
              <option disabled="disabled">California (disabled)</option>
              <option>Delaware</option>
              <option>Tennessee</option>
              <option>Texas</option>
              <option>Washington</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
      the plugin.
    </div>
  </div>
  <!-- /.box -->  --}}

  <div class="row">
    <div class="col-md-12">

      <div class="box box-danger">
        <div class="box-header">
          {{--  <h3 class="box-title">Input masks</h3>  --}}
        </div>
        <div class="box-body">

        <form action="
        @if($isEdit==true)
        {{route('container.update',['id'=>$container->id])}}
        @else
        {{route('container.store')}}
        @endif
        " method="POST">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Code:</label>
                    @if($isEdit==true)
                    <input type="text" name="code" class="form-control" value="{{$container->code}}" >
                    @else
                    <input type="text" name="code" class="form-control" >
                    @endif
                    <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Description:</label>
                    <textarea name="description" id="" class="form-control" cols="30" rows="5"></textarea>
                </div>
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Container Type:</label>
                        <select name="container_type_id" id="" class="form-control">
                            <option disabled="true" selected>Select Container Type</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
            </div>
            @csrf
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Cost:</label>
                        @if($isEdit==true)
                        <input type="text" name="cost" class="form-control" value="{{$container->cost}}" >
                        @else
                        <input type="text" name="cost" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('cost') ?? null}}</span>
                    </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                            <label for="code">OwnerShip:</label>
                            <select name="company_id" id="" class="form-control">
                                <option disabled="true" selected>Select Container Type</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                            <label for="code">Purchase From:</label>
                            <select name="pur_port_id" id="" class="form-control">
                                <option disabled="true" selected>Purchase From</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="url">Supplier:</label>
                        @if($isEdit==true)
                        <input type="text" name="supplier" class="form-control" value="{{$container->supplier}}" >
                        @else
                        <input type="text" name="supplier" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('supplier') ?? null}}</span>

                </div>
            </div>
            <div class="col-md-3 col-md-offset-5">
                    <a href="{{route('container')}}" class="btn btn-primary">Back</a>
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

      {{--  <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Color & Time Picker</h3>
        </div>
        <div class="box-body">
          <!-- Color Picker -->
          <div class="form-group">
            <label>Color picker:</label>
            <input type="text" class="form-control my-colorpicker1">
          </div>
          <!-- /.form group -->

          <!-- Color Picker -->
          <div class="form-group">
            <label>Color picker with addon:</label>

            <div class="input-group my-colorpicker2">
              <input type="text" class="form-control">

              <div class="input-group-addon">
                <i></i>
              </div>
            </div>
            <!-- /.input group -->
          </div>
          <!-- /.form group -->

          <!-- time Picker -->
          <div class="bootstrap-timepicker">
            <div class="form-group">
              <label>Time picker:</label>

              <div class="input-group">
                <input type="text" class="form-control timepicker">

                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          </div>
        </div>
        <!-- /.box-body -->
      </div>  --}}
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
