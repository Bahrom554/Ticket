@extends('app')

@section('main_content')


    <div class="content-wrapper">
        <section class="content-header">
            <center> <h1>
                    Buyurtma qilingan Chipta
                </h1></center>

        </section>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Qayerdan</th>
                                    <th>Qayerga</th>
                                    <th>Narxi</th>
                                    <th>Uchish kuni</th>
                                    <th>Uchish vaqti</th>
                                    <th>Qo'nish vaqti</th>
                                    <th>chipta xolati</th>

                                </tr>
                                </thead>
                                <body>

                                <tr>
                                    <td>{{$ticket->id}}</td>
                                    <td>{{$ticket->region->name}}</td>
                                    <td>{{$ticket->reg->name}}</td>
                                    <td>{{$ticket->price}}</td>
                                    <td>{{$ticket->date}}</td>
                                    <td>{{$ticket->time_go}}</td>
                                    <td>{{$ticket->time_arrive}}</td>
                                    <td>{{$ticket->status ? 'activ' : 'activemas'}}</td>


                                </tr>


                                </body>

                            </table>
                        </div>
                    </div>
                    <section class="content-header">
                        <center> <h1>
                                Buyurtma qiluvchi
                            </h1></center>

                    </section>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('includes.errors')
                        <form role="form" action="{{route('order.update',$order->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-offset-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Ismi</label>
                                        <input type="text" class="form-control" id="name" value="{{$order->name}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">No'meri</label>
                                        <input type="text" class="form-control" id="phone"  value="{{$order->phone}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Zakaz Holati</label>
                                        <select name="status" id="status" class="form-control">
                                            <option {{$order->status=='active' ? 'selected' : ''}} value="active">active</option>
                                            <option  {{$order->status=='taken' ? 'selected' : ''}}  value="taken">taken</option>
                                            <option {{$order->status=='cancel' ? 'selected' : ''}}  value="cancel">cancel</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Yuborish</button>
                                        <a href="{{route('order.index')}}" class="btn btn-warning">Orqaga</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
