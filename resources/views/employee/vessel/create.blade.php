@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Vessel Detail
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">vessel</li>
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
        {{route('vessel.update',['id'=>$vessel->id])}}
        @else
        {{route('vessel.store')}}
        @endif
        " method="POST">

        <div class="field_wrapper">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="code">Code:</label>
                    @if($isEdit==true)
                    <input type="text" name="code" class="form-control" value="{{$vessel->code}}" >
                    @else
                    <input type="text" name="code" class="form-control"  >
                    @endif
                    <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                </div>
            </div>

            <div class="col-md-3">
                    <div class="form-group">
                        <label for="code">name:</label>
                        @if($isEdit==true)
                        <input type="text" name="name" class="form-control" value="{{$vessel->name}}" >
                        @else
                        <input type="text" name="name" class="form-control"  >
                        @endif
                        <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                    </div>
            </div>

            @csrf
            <div class="col-md-3">
                    <div class="form-group">
                        <label for="contact">Owner:</label>
                        @if($isEdit==true)
                        <input type="text" name="owner" class="form-control" value="{{$vessel->owner}}" >
                        @else
                        <input type="text" name="owner" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('owner') ?? null}}</span>
                    </div>
                </div>

            </div>
        <div class="col-md-3 col-md-offset-5">
            <a href="{{route('vessel')}}" class="btn btn-primary">Back</a>
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
