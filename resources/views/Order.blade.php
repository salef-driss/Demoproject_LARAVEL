@extends("layout")

@section("title", "Orders")

@section("body")
<div class="container">
    <h1 style="text-align: center ; margin-bottom:2%;">Order</h1>

    @if($user->role == "not_admin")
        <div style="margin-bottom: 20px" class="card">
            <div class="card-header">
                <h5 class="card-title">Order Status</h5>
            </div>
            <div class="card-body">
                <p class="card-text">
                    Your order will be dispatched once the status is marked as <span class="text-success">green</span>.
                    If it appears <span class="text-warning">yellow</span>, it means we are diligently processing and preparing your order for shipment.
                    Payment will be collected in person upon delivery to your specified address. Should any issues or questions arise,
                    please feel free to <a href="contact-us.html">contact us</a>.
                </p>
            </div>
        </div>
    @endif

    @foreach($winkelkaren as $winkelkar)
    @if($winkelkar->status == 2 || $winkelkar->status == 3)

    <div class="card mb-4
    @if($winkelkar->status == 2) border border-warning border-3
    @elseif($winkelkar->status == 3) border border-success border-3
    @endif">
        <div class="card-body">
            @if($winkelkar->status == 2)
                <h5 class="card-title" style="color: darkgoldenrod; text-align:center">Order details in progress</h5>
            @elseif($winkelkar->status == 3)
                <h5 class="card-title" style="color: green; text-align:center">Order has been created and sent.</h5>
            @endif
            <p><strong>Name:</strong> {{ $winkelkar->user->name}} {{ $user->lastname }}</p>
            <p><strong>Email:</strong> {{ $winkelkar->user->email}}</p>
            <p><strong>Address:</strong> {{ $winkelkar->user->street }} {{ $winkelkar->user->houseNr }}, {{ $winkelkar->user->city }}, {{ $winkelkar->user->country }}</p>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <strong>Order number:</strong> {{ $winkelkar->id }}
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
                                    <td>€ {{ $beerTotal }}</td>
                                </tr>
                                <?php $totalPrice += $beerTotal; ?>
                                @endforeach
                                <tr>
                                    <td>
                                    <td></td>
                                    <td>Tottal Price: </td>
                                    <td>€ {{$totalPrice}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </ul>
                </div>
            </li>
        </ul>

        <div class="card-body">
            @if($user->role =="admin")
                <form action="{{ route('OrderUpdate', ['id' => $winkelkar->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Order is ready and sent</button>
                </form>
            @endif

        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection
