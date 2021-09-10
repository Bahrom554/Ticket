@extends('app')
@section('Resection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection
@section('main_content')
    @include('includes.errors')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <center> <h1 class="box-title">Hudud</h1> </center>
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


                    <div class="box-header with-border">

                        <a class='col-lg-offset-5 btn btn-success' style="display: block; margin: 0 auto; width: 15%;" href="{{ route('region.create') }}">Hudud qo'shish</a>
                        <div class="box-tools pull-right">

                        </div>
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
<th>Hudud</th>
<th>Qisqartma</th>
<th>O'zgartirish</th>
<th>O'chirish</th>
</tr>
</thead>
<tbody>
@foreach ($regions as $region)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $region->name }}</td>
        <td>{{ $region->abbreviation }}</td>
        <td><a href="{{ route('region.edit',$region->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
        <td>
            <form id="delete-form-{{ $region->id }}" method="post" action="{{ route('region.destroy',$region->id) }}" style="display: none">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <a href="" onclick="
                if(confirm('Are you sure, You Want to delete this?'))
                {
                event.preventDefault();
                document.getElementById('delete-form-{{ $region->id }}').submit();
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
    <th>Hudud</th>
    <th>Qisqartma</th>
    <th>O'zgartirish</th>
    <th>O'chirish</th>
</tr>
</tfoot>
                        </table>
                    </div>
                        </div>
                    </div>
                    <!-- /.box-body -->


                <div class="box-footer">

                </div>

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

