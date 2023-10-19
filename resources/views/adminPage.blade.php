@extends('layout')
@section("title" , "Admin")

@section("body")
<div class="container">
    <h1 class="Titel_page">Admin Page</h1>
    @if(isset($error))
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @else
        <div class="container">
            @auth
                <div class="row mx-auto">
                    @foreach($bieren as $bier)
                        <div class="col mb-3">
                            <div class="card" style="width: 18rem; margin-left: 10%">
                                <img src="{{ asset('images/' . $bier->bierimage) }}" class="card-img-top" alt="{{ $bier->naam }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $bier->naam }}</h5>
                                    <p class="card-text">Prijs: €{{ $bier->prijs }}</p>
                                    <p class="card-text">Voorraad: {{ $bier->stok }}</p>
                                    <a href="{{ route('showUpdate', ['id' => $bier->id]) }}" class="btn btn-primary">Update</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endauth
        </div>
    @endif
</div>
@endsection
