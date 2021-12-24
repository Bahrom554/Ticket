@if(count($errors))
    @foreach($errors->all() as $error)
        <p class="alert alert-danger alert-dismissible ">{{$error}}


    @endforeach
@endif
@if (session()->has('message'))
    <p class="alert alert-success alert-dismissible ">{{session('message')}}

   @endif
