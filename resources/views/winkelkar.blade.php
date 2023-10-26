@extends("layout")

@section("title", "Winkelkar")

@section("body")
    <div class="container">
        <h1>Winkelkar</h1>

        @if(count($Bieren) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quentity</th>
                        <th>Price per unit</th>
                        <th>Total price per unit</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                         $totaalBedrag = 0;
                     @endphp
                    @foreach($Bieren as $Bier)
                     @php
                        $totaalBedragBier = $Bier->prijs * $Bier->pivot->quantity; // Bereken het totaalbedrag per bier
                        $totaalBedrag += $totaalBedragBier; // Voeg het totaalbedrag van dit bier toe aan het totaalbedrag
                     @endphp
                        <tr>
                            <td>{{ $Bier->naam }}</td>
                            <td>{{ $Bier->pivot->quantity }}</td>
                            <td>{{ $Bier->prijs }}</td>
                            <td>{{ $totaalBedragBier}}</td>
                            <td><a type="button"  href="{{ route('deleteFromCart', ['id' => $Bier->pivot->id]) }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="text-align: center" class="alert alert-primary" role="alert">
                Totaalbedrag van alle bieren: €{{$totaalBedrag }}
            </div>

            <a type="button" href="{{route("home")}}"  class="btn btn-primary">Continue shopping</a>
            <button type="button" class="btn btn-success">Order</button>


            @else
            <div style="text-align: center" class="alert alert-primary" role="alert">
                Shopping cart is empty
            </div>

        @endif
    </div>
@endsection
