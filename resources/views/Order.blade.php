@extends("layout")

@section("title", "Bestelling")

@section("body")
<div class="container">
    <h1>Order</h1>

    @foreach($winkelkaren as $winkelkar)
    @if($winkelkar->status == 2)
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Order Details</h5>
            <p><strong>Name:</strong> {{ $user->name }} {{ $user->lastname }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Address:</strong> {{ $user->street }} {{ $user->houseNr }}, {{ $user->city }}, {{ $user->country }}</p>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <strong>Winkelkar ID:</strong> {{ $winkelkar->id }}
            </li>
            <li class="list-group-item">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $totalPrice = 0; ?>
                                @foreach($winkelkar->winkelkar_bieren as $bier)
                                <?php $beerTotal = $bier->prijs * $bier->pivot->quantity; ?>

                                <tr>
                                    <td>{{ $bier->naam }}</td>
                                    <td>{{ $bier->prijs }}</td>
                                    <td>{{ $bier->pivot->quantity }}</td>
                                    <td>{{ $beerTotal }}</td>
                                </tr>
                                <?php $totalPrice += $beerTotal; ?>
                                @endforeach
                                <tr>
                                    <td>
                                    <td></td>
                                    <td>Tottal Price: </td>
                                    <td>{{$totalPrice}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </ul>
                </div>
            </li>
        </ul>

        <div class="card-body">

        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection
