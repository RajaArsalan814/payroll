@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Forwarder Detail
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Setup</a></li>
            <li class="active">Forwarder</li>
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
        {{route('forwarder.update',['id'=>$forwarder->id])}}
        @else
        {{route('forwarder.store')}}
        @endif
        " method="POST">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="code">Name:</label>
                    @if($isEdit==true)
                    <textarea name="name" id="" class="form-control" cols="30" rows="5">{{$forwarder->name}}</textarea>
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
                        <textarea name="address" id="" class="form-control" cols="30" rows="5">{{$forwarder->address}}</textarea>
                        @else
                        <textarea name="address" id="" class="form-control" cols="30" rows="5"></textarea>
                        @endif
                        <span class="text-danger">{{$errors->first('address') ?? null}}</span>
                    </div>
            </div>
            @csrf
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contact No:</label>
                        @if($isEdit==true)
                        <input type="text" name="contact_no" class="form-control" value="{{$forwarder->contact_no}}" >
                        @else
                        <input type="text" name="contact_no" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('contact_no') ?? null}}</span>
                    </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="fax">Fax No:</label>
                        @if($isEdit==true)
                        <input type="text" name="fax_no" class="form-control" value="{{$forwarder->fax_no}}" >
                        @else
                        <input type="text" name="fax_no" class="form-control" >
                        @endif
                        <span class="text-danger">{{$errors->first('fax_no') ?? null}}</span>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Email Id:</label>
                        @if($isEdit==true)
                        <input type="email" name="email" class="form-control" id="email" value="{{$forwarder->email}}">
                        @else
                        <input type="email" name="email" class="form-control" id="email">
                        @endif
                        <span class="text-danger">{{$errors->first('email') ?? null}}</span>
                    </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="contact">Contact Person:</label>
                        @if($isEdit==true)
                        <input type="text" name="contact_person" class="form-control" id="contact_person" value="{{$forwarder->contact_person}}">
                        @else
                        <input type="text" name="contact_person" class="form-control" id="contact_person">
                        @endif
                        <span class="text-danger">{{$errors->first('contact_person') ?? null}}</span>
                </div>
            </div>

        <div class="col-md-3 col-md-offset-5">
            <a href="{{route('forwarder')}}" class="btn btn-primary">Back</a>
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
