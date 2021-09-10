@extends('app')
@section('Resection')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endsection

@section('main_content')

    <div class="content-wrapper">
        <section class="content-header">
            <center> <h1>
                    O'zgartirish
                </h1></center>

        </section>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @include('includes.errors')
                        <form role="form" action="{{route('ticket.update',$ticket->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-body">
                                <div class="col-lg-offset-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="select-state">Qayerdan</label>
                                        <select name="from_id" id="select-state" class="form-control" placeholder="Pick a state...">
                                            <option value="">Select a state...</option>
                                            @foreach( $regions as $region)
                                                <option value="{{$region->id}}" {{$ticket->from_id==$region->id ? 'selected' : ''}}>{{$region->name}}({{$region->abbreviation}})</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="select-state">Qayerga</label>
                                        <select name="to_id" id="select-state" class="form-control" placeholder="Pick a state...">
                                            <option value="">Select a state...</option>
                                            @foreach( $regions as $region)
                                                <option value="{{$region->id}}"  {{$ticket->to_id==$region->id ? 'selected' : ''}}>{{$region->name}}({{$region->abbreviation}})</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Narxi</label>
                                        <input type="text" class="form-control" id="price" name="price" value="@if (old('price')){{old('price')}} @else {{$ticket->price}}@endif" >
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Uchish kuni</label>
                                        <input type="date" class="form-control" id="date" name="date" value="@if (old('date')){{old('date')}} @else {{$ticket->date}}@endif" >
                                    </div>
                                    <div style="display: flex; ">
                                        <div class="form-group" style="flex-grow: 1;">
                                            <label for="time">Uchish vaqti</label>
                                            <input type="time" class="form-control" id="time" name="time_go" value="@if (old('time_go')){{old('time_go')}} @else {{$ticket->time_go}}@endif " >
                                        </div>
                                        <div class="form-group" style="flex-grow: 1; margin-left: 1rem;">
                                            <label for="time">Qo'nish vaqti</label>
                                            <input type="time" class="form-control" id="time" name="time_arrive" value="@if (old('time_arrive')){{old('time_arrive')}} @else {{$ticket->time_arrive}}@endif " >
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <label><input type="checkbox" id="status" name="status" @if(old('status')==1||$ticket->status==1)  checked @endif  value="1">Holati</label>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Yuborish</button>
                                        <a href="{{route('ticket.index')}}" class="btn btn-warning">Orqaga</a>
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

@section('footsteps')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('select').selectize({
                sortField: 'text'
            });
        });
    </script>

@endsection
