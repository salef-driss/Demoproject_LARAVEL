@extends('layout')
@section("title" , "Add Beer")

@section("body")

 <div class="container">
    <h1>Add Beer</h1>

    @if($errors->any())
    <div class = "col-12">
        @foreach($errors->all() as $error)
            <div class = "alert alert-danger auto-dismiss fade-out">{{$error}}</div>
        @endforeach
    <div>
    @endif

    @if(session('success'))
    <div class="alert alert-success auto-dismiss fade-out">
        {{ session('success') }}
    </div>
    @endif


    <form class="row g-3" action="{{route("AddBier.POST")}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="naam">
        </div>
        <div class="col-md-4">
            <label for="name" class="form-label">Price</label>
            <input type="text" class="form-control" name="prijs" >
        </div>
        <div class="col-md-4">
            <label for="" class="form-label">Voorraad</label>
            <input type="number" class="form-control" name="stok" >
        </div>
        <div class="col-md-6">
            <label for="file" class="form-label">Select Image</label>
            <input type="file" class="form-control" name="bierimage" >
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
 </div>

@endsection

