@extends('layout')
@section("title" , "Admin")

@section("body")

<div class="container">
    <h1>Account stettings</h1>
    <form class="row g-3" action= "{{route('acountsettings.post')}}" method = "POST" >
        @csrf
        <div class="col-md-4">
            <label for="name" class="form-label">First Name</label>
            <input type="text" class="form-control" name = "name" value="{{$user->name}}">
        </div>
        <div class="col-md-4">
            <label for="name" class="form-label">Last Name</label>
            <input type="text" class="form-control" name = "lastname" value="{{$user->lastname}}">
        </div>
        <div class="col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email Address</label>
            <input type="email" class="form-control" name = "email" value = "{{$user ->email}}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Country</label>
            <input type="text" class="form-control" name = "country" value = "{{$user->country}}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">City</label>
            <input type="text" class="form-control" name = "city" value = "{{$user->city}}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Street</label>
            <input type="text" class="form-control" name = "street" value = "{{$user->street}}">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">House Number</label>
            <input type="number" class="form-control" name = "houseNr" value = "{{$user->houseNr}}">
        </div>

        <div class="col-12">
            <button  type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-danger" onclick="window.location.reload();"  >Cancel</button>
        </div>
    </form>
</div>

@endsection
