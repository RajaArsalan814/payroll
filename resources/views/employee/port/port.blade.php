@extends('master.layout')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Port
        <small>preview of port </small>
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

      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">port</h3>

              <div class="box-tools">
                <div class="input-group input-group-md hidden-xs col-md-offset-7" style="width: 150px;">

                  <div class="input-group-btn">
                    <a href="{{route('port.create')}}" class="btn btn-primary ">Create</a>
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
                  <th>Charges</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                @foreach ($port as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->code}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->address}}</td>
                  <td>{{$item->port_charges->charges->charge_type}}</td>
                  <td>{{$item->port_charges->amount}}</td>
                  <td><a href="{{route('port.edit',['id'=>$item->id])}}"> <i class="fa fa-edit edit"> </i> </a> </td>
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
