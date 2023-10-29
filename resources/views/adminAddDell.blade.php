@extends('layout')
@section("title" , "Login")
@section("body")
<link rel="stylesheet" href="../../public/css/adminify.css">


  <div class="container">
    <h1 style="text-align: center; margin-bottom:3%;" >All the users</h1>

    @if(session('success'))
    <div class="alert alert-success auto-dismiss fade-out">
        {{ session('success') }}
    </div>
    @endif

    @foreach($users as $user)
    @if($user->status == 1)
    <div style="margin-bottom: 3%" class="card">
        <div  class="card-header">User Information</div>
        <div class="card-body">
            <form action="{{ route('adminify.post', ['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                    <div class="col-md-6">
                        <p>{{$user->name}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                    <div class="col-md-6">
                        <p>{{$user->email}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="admin_status" class="col-md-4 col-form-label text-md-right">Admin Status:</label>
                    <div class="col-md-6">
                        <select name="admin_status" id="admin_status" class="form-control">
                            <option value="admin" @if($user->role == "admin") selected @endif >Admin</option>
                            <option value="not_admin" @if($user->role != "admin") selected @endif>Not an Admin</option>
                        </select>
                    </div>
                </div>

                <div style="margin-top:3%" class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="d-flex">
                            <button  type="submit" class="btn btn-primary">Update</button>
                            <a style="margin-left: 2%" href="javascript:window.location.reload()" class="btn btn-dark">Cancel</a>
                            <a style="margin-left: 2%" href="{{ route('adminify.delete', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endif
    @endforeach
    </div>
</div>
@endsection
