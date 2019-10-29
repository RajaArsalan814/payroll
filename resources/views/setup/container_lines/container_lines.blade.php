@extends('master.layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Container Lines
        <small>preview of Container Lines </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup</a></li>
        <li class="active">Container</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Container Lines</h3>

              <div class="box-tools">
                <div class="input-group input-group-md hidden-xs col-md-offset-7" style="width: 150px;">
                  {{--  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">  --}}

                  <div class="input-group-btn">
                    <a href="{{route('container_line.create')}}" class="btn btn-primary ">Create</a>
                    {{--  <button type="submit" class="btn btn-primary">Create</button>  --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th> S : No </th>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Contact No</th>
                  <th>Fax No</th>
                  <th>Email</th>
                  <th>Url</th>
                  <th>Action</th>
                </tr>
                @foreach ($container_line as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->code}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->address}}</td>
                  <td>{{$item->contact_no}}</td>
                  <td>{{$item->fax_no}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->url}}</td>
                  <td><a href="{{route('container_line.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a> </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
