@extends("layout")

@section("title", "Winkelkar")

@section("body")
    <div class="container">
        <h1>Winkelkar</h1>

        @if(count($Bieren) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Aantal</th>
                        <th>Prijs per stuk</th>
                        <th>Totaalprijs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Bieren as $Bier)
                        <tr>
                            <td>{{ $Bier->naam }}</td>
                            <td>{{ $Bier->pivot->quantity }}</td>
                            <td>{{ $Bier->prijs }}</td>
                            <td>{{ $Bier->prijs * $Bier->pivot->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Je winkelkar is leeg.</p>
        @endif
    </div>
@endsection
