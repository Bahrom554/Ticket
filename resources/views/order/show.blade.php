@extends('app')
@section('Resection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('main_content')
    @include('includes.errors')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <center> <h1 class="box-title">Buyurtmalar</h1> </center>
        </section>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
    @endif

    <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">


                <div class="box-header with-border " style="display: flex; justify-content: center; align-items: center;">

                    <a class='col-lg-offset-5 btn btn-success'  style="display: block; @if($a) background-color:#009fff; @endif margin-left: 10px; width: 15%;" href="{{ route('order.index') }}">Yangi Buyurtmalar</a>
                    <a class='col-lg-offset-5 btn btn-success'  style="display: block; @if(!$a) background-color:#009fff; @endif  margin-left: 10px; width: 15%;" href="{{ route('order.create') }}">Bog'lanilgan Buyurtmalar</a>

                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            {{--                                <h3 class="box-title">Data Table With Full Features</h3>--}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>S.No</th>
                                    <th>Ismi</th>
                                    <th>No'meri</th>
                                    <th>Buyurtma holati</th>
                                    <th>CHipta</th>
                                    <th>O'chirish</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{$order->status}}</td>
                                        <td><a href="{{ route('order.edit',$order->id) }}">Chipta</a></td>
                                        <td>
                                            <form id="delete-form-{{ $order->id }}" method="post" action="{{ route('order.destroy',$order->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href="" onclick="
                                                if(confirm('Are you sure, You Want to delete this?'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $order->id }}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                                }" ><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>Ismi</th>
                                    <th>No'meri</th>
                                    <th>Buyurtma holati</th>
                                    <th>CHipta</th>
                                    <th>O'chirish</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->




            </div>
        </section>
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

