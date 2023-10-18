@extends('layout')
@section("title" , "Admin")

@section("body")

<div class="container">
    <h1>Admin Page</h1>
    @if(isset($error))
        <div class="alert alert-danger" role="alert">
             {{ $error }}
        </div>
    @else
        <h1>Welcome</h1>
    @endif
</div>

@endsection
