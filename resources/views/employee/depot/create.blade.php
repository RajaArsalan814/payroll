@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Depot Detail
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">Depot</li>
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
        {{route('depot.update',['id'=>$depot->id])}}
        @else
        {{route('depot.store')}}
        @endif
        " method="POST">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Name:</label>
                    @if($isEdit==true)
                    <textarea name="name" id="" class="form-control" cols="30" rows="5">{{$depot->name}}</textarea>
                    @else
                    <textarea name="name" id="" class="form-control" cols="30" rows="5"></textarea>
                    @endif
                    <span class="text-danger">{{$errors->first('name') ?? null}}</span>
                </div>
            </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Address:</label>
                        @if($isEdit==true)
                        <textarea name="address" id="" class="form-control" cols="30" rows="5">{{$depot->address}}</textarea>
                        @else
                        <textarea name="address" id="" class="form-control" cols="30" rows="5"></textarea>
                        @endif
                        <span class="text-danger">{{$errors->first('address') ?? null}}</span>
                    </div>
            </div>
            @csrf
            <div class="col-md-6">
                    <div class="form-group">
                            <label for="Code">Code No:</label>
                            @if($isEdit==true)
                            <input type="text" name="code" class="form-control" value="{{$depot->code}}" >
                            @else
                            <input type="text" name="code" class="form-control" >
                            @endif
                            <span class="text-danger">{{$errors->first('code') ?? null}}</span>
                    </div>
                </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact No:</label>
                        @if($isEdit==true)
                        <input type="text" name="contact_no" class="form-control" value="{{$depot->contact_no}}" >
                        @else
                        <input type="text" name="contact_no" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('contact_no') ?? null}}</span>
                    </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="contact">Contact Person:</label>
                        @if($isEdit==true)
                        <input type="text" name="contact_person" class="form-control" id="contact_person" value="{{$depot->contact_person}}">
                        @else
                        <input type="text" name="contact_person" class="form-control" id="contact_person">
                        @endif
                        <span class="text-danger">{{$errors->first('contact_person') ?? null}}</span>
                </div>
            </div>

        <div class="col-md-3 col-md-offset-5">
            <a href="{{route('depot')}}" class="btn btn-primary">Back</a>
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
