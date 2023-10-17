@extends('layout')
@section("title" , "Login")

@section("body")

<div class="container">

    <h1>Login</h1>

    <div class="mt-5">
        @if($errors->any())
            <div class = "col-12">
                @foreach($errors->all() as $error)
                    <div class = "alert alert-danger auto-dismiss fade-out">{{$error}}</div>
                @endforeach
            <div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger auto-dismiss fade-out">
            {{ session('error') }}
        </div>
         @endif

    <form action="{{route('login.post')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
