@extends('layout')
@section("title", "Admin")
<link href="{{ asset('css/updateBeer.css') }}" rel="stylesheet">

@section("body")
<div class="container">
    <h1 id="updateBeer_title">Update this beer</h1>

    @if($errors->any())
            <div class = "col-12">
                @foreach($errors->all() as $error)
                    <div class = "alert alert-danger auto-dismiss fade-out">{{$error}}</div>
                @endforeach
            <div>
     @endif
    <div class="row">
        <div class="col-md-3"> <!-- Allocate 30% width to the image -->
            <img src="{{ asset('images/' . $bier->bierimage) }}" style="max-width: 100%;" alt="">
        </div>
        <div class="col-md-9"> <!-- Allocate 70% width to the form -->
            <form class="row g-3" action="{{ route('beer.update' , ['id' => $bier->id]) }}" method="POST">
                @csrf
                <div class="col-md-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="naam" value="{{$bier->naam}}">
                </div>
                <div class="col-md-4">
                    <label for="name" class="form-label">Price</label>
                    <input type="text" class="form-control" name="prijs" value="{{$bier->prijs}}">
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Voorraad</label>
                    <input type="number" class="form-control" name="stok" value="{{$bier->stok}}">
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
    </div>
</div>
@endsection
