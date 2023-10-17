@extends("layout")
@section("title","Home Page")
@section("body")
    <div class= "container">
    @auth
    <h1>Home page</h1>
        {{auth()->user()->name}}
    @endauth
    </div>
@endsection
