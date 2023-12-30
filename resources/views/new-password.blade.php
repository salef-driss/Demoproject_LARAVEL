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

    <form action="{{route('reste.password.post')}}" method="POST">
        @csrf
        <input type="text" name="token" hidden value="{{$token}}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label  class="form-label">Enter new password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label  class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
