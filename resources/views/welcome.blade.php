@extends("layout")
@section("title","Home Page")

<link href= "{{ asset('css/welcome.css') }}" rel="stylesheet">

@section("body")

    <div class= "container">
    @auth
    <h1 class= "Titel_page" id ="homePage_title">Assortment</h1>

    <div class="row mx-auto" >
        @foreach($bieren as $bier)
        <div class="col mb-3">
            <div class="card" style="width: 18rem;" style="margin-left:10%">
                <img src="{{ asset('images/' . $bier->bierimage) }}" class="card-img-top" alt="{{$bier->naam }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $bier->naam }}</h5>
                    <p class="card-text">Prijs: €{{ $bier->prijs }}</p>
                    <p class="card-text">Voorraad: {{ $bier->stok }}</p>

                    @if(Auth::user()->role == "admin")
                        <a href="{{ route('showUpdate', ['id' => $bier->id]) }}" class="btn btn-primary">Update</a>
                        <a href="{{ route('deleteBier', ['id' => $bier->id]) }}" class="btn btn-danger">Delete</a>
                        @else
                        <a href="#" class="btn btn-primary">Bestellen</a>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endauth
    </div>
@endsection
