@extends('master.layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Vessel
        <small>preview of Vessel </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup</a></li>
        <li class="active">Vessel</li>
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
              <h3 class="box-title">Vessel</h3>

              <div class="box-tools">
                <div class="input-group input-group-md hidden-xs col-md-offset-7" style="width: 150px;">

                  <div class="input-group-btn">
                    <a href="{{route('vessel.create')}}" class="btn btn-primary ">create</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th> S : no </th>
                  <th>Code</th>
                  <th>Description</th>
                  <th>Charger Type</th>
                  <th>Action</th>
                </tr>
                @foreach ($vessel as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->code}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->owner}}</td>
                  <td><a href="{{route('vessel.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a> </td>
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
