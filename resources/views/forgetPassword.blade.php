@extends('layout')
@section("title" , "Login")

@section("body")

<div class="container">

   <h1>ForgetPassword</h1>

   @if($errors->any())
        <div class = "col-12">
            @foreach($errors->all() as $error)
                <div class = "alert alert-danger auto-dismiss fade-out">{{$error}}</div>
            @endforeach
        <div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger auto-dismiss fade-out">
    {{ session('error') }}
    </div>
    @endif

    @if(session()->has("success"))
    <div class="alert alert-danger auto-dismiss fade-out">
    {{ session('success') }}
    </div>
    @endif

    <p>We will send a link to your email, use that link to reset password.</p>
    <form action="{{route("forgot.password.Post")}}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
