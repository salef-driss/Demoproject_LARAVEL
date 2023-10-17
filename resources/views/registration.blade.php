@extends('layout')
@section("title" , "Registration")

@section("body")

<div class="container">

    <h1>Registrationnnnnnndcdnn</h1>

    <div class="mt-5">
        @if($errors->any())
            <div class = "col-12">
                @foreach($errors->all() as $error)
                    <div class = "alert alert-danger auto-dismiss fade-out">{{$error}}</div>
                @endforeach
            <div>
        @endif

        @if(session() -> has("error"))
            <div class = "alert alert-danger auto-dismiss fade-out">{{$session("error")}}</div>

        @endif

        @if(session() -> has("success"))
            <div class = "alert alert-success auto-dismiss fade-out">{{$session("success")}}</div>

        @endif
    </div>

    <form action= "{{route('registration.post')}}" method = "POST" >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name = "name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name = "email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
             <label for="exampleInputPassword1" class="form-label">Password</label>
             <input type="password" class="form-control" name = "password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
