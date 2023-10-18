@extends('layout')
@section("title" , "Registration")

@section("body")

<div class="container">

    <h1>Registration</h1>

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

    <form class="row g-3" action= "{{route('registration.post')}}" method = "POST" >
        @csrf
        <div class="col-md-4">
            <label for="name" class="form-label">First Name</label>
            <input type="text" class="form-control" name = "name">
        </div>
        <div class="col-md-4">
            <label for="name" class="form-label">Last Name</label>
            <input type="text" class="form-control" name = "lastname">
        </div>
        <div class="col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email Address</label>
            <input type="email" class="form-control" name = "email">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Country</label>
            <input type="text" class="form-control" name = "country">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">City</label>
            <input type="text" class="form-control" name = "city">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Street</label>
            <input type="text" class="form-control" name = "street">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">House Number</label>
            <input type="number" class="form-control" name = "houseNr">
        </div>

        <div class="col-md-6">
             <label for="exampleInputPassword1" class="form-label">Password</label>
             <input type="password" class="form-control" name = "password">
        </div>

        <div class="col-md-6">
            <label for="passwordrepeat" class="form-label">Repeat Password</label>
            <input type="password" class="form-control" name="passwordrepeat" id="passwordrepeat">
        </div>
        <br>

        <div class="col-12">
            <button  type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection
