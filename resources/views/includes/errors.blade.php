@if(count($errors))
    @foreach($errors->all() as $error)
        <p class="alter alter-danger">{{$error}}</p>
    @endforeach
@endif
@if (session()->has('message'))
    <p class="alter alter-success">{{session('message')}}</p>
   @endif