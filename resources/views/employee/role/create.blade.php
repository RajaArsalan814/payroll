@extends('master.layout')
@section('content')
{{--  @if ($errors->any())  --}}
{{--  {{$errors->first()}}  --}}
{{--  @endif  --}}
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Role
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Role</li>
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
        {{route('role.update',['id'=>$role->id])}}
        @else
        {{route('role.store')}}
        @endif
        " method="POST">



        <div class="col-md-6">
                <div class="form-group">
                    <label for="contact">Role Description:</label>
                    @if($isEdit==true)
                    <input type="text" required name="role_desc" class="form-control" value="{{$role->role_desc}}" >
                    @else
                    <input type="text" required name="role_desc" class="form-control"  >
                    @endif
                    <span class="text-danger">{{$errors->first('role_desc') ?? null}}</span>
                </div>
            </div>

            @csrf


        <div class="col-md-3 col-md-offset-5">
            <a href="{{route('roles')}}" class="btn btn-primary">Back</a>
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
