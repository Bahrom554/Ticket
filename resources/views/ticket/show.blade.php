@extends('app')
@section('Resection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main_content')
    @include('includes.errors')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <center><h1>Chiptalar Ro'yxati</h1></center>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                    <a class='col-lg-offset-5 btn btn-success' style="display: block; width: 200px; margin: 0 auto; " href="{{route('ticket.create')}}">Yangi chipta qo'shish</a>



                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
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
                                <th>O'zgartirish</th>
                                <th>O'chirish</th>
                            </tr>
                            </thead>
                            <body>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{$ticket->id}}</td>
                                    <td>{{$ticket->region->name}}</td>
                                    <td>{{$ticket->reg->name}}</td>
                                    <td>{{$ticket->price}}</td>
                                    <td>{{$ticket->date}}</td>
                                    <td>{{$ticket->time_go}}</td>
                                    <td>{{$ticket->time_arrive}}</td>
                                    <td>{{$ticket->status ? 'activ' : 'activemas'}}</td>
                                    <td><a href="{{route('ticket.edit',$ticket  ->id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                                    </td>
                                    <td>
                                        <form id="delete-form-{{$ticket->id}}" action="{{route('ticket.destroy',$ticket->id)}}" method="post"  style="display: none">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                            if(confirm('Are sure,You want delete this?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$ticket->id}}').submit();}
                                            else{
                                            event.preventDefault();}" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                            </body>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Qayerdan</th>
                                <th>Qayerga</th>
                                <th>Narxi</th>
                                <th>Uchish kuni</th>
                                <th>Uchish vaqti</th>
                                <th>Qo'nish vaqti</th>
                                <th>chipta xolati</th>
                                <th>O'zgartirish</th>
                                <th>O'chirish</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>



                </div>
            </div></section>
        <!-- /.content -->
    </div>
@endsection
@section('footsteps')
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })


    </script>


@endsection
