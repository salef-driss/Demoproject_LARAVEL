@extends('layout')
@section("title", "Bestellen")

@section("body")

<div class="container">

    @if(session('error'))
    <div class="col-12">
        <div class="alert alert-danger auto-dismiss fade-out">{{ session('error') }}</div>
    </div>
    @endif



    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/' . $bier->bierimage) }}" class="card-img-top" alt="{{$bier->naam }}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('addToCart', ['bier_id' => $bier->id]) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>
                            <div class="col-md-8">
                                <p>{{$bier->naam}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Price:</label>
                            <div class="col-md-8">
                                <p>{{$bier->prijs}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Stok:</label>
                            <div class="col-md-8">
                                <p>{{$bier->stok}}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity:</label>
                            <div class="col-md-8">
                                <input type="number" name="quantity" class="form-control" required min="1">
                            </div>
                        </div>



                        <div style="margin-top:3%" class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <div class="d-flex">
                                    <a  href="{{route("home")}}" class="btn btn-dark">Continue shopping </a>
                                    <button style="margin-left: 2%" type="submit" class="btn btn-primary">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
