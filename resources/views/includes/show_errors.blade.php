@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <p class="bg bg-warning">{{$error}}</p>
    @endforeach
@endif
