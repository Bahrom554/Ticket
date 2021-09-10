@extends('app')

@section('main_content')

    <div class="content-wrapper">
        <section class="content-header">
            <center> <h1>
                    Hudud Qo'shish
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
                        <form role="form" action="{{route('region.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-lg-offset-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Hudud</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Region name" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="abbr">Qisqartma</label>
                                        <input type="text" class="form-control" id="abbr" name="abbreviation" placeholder="Region abbreviation" value="{{old('abbreviation')}}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Yuborish</button>
                                        <a href="{{route('region.index')}}" class="btn btn-warning">Orqaga</a>
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
