@extends("layout")
@section("title","Home Page")

<link href= "{{ asset('css/welcome.css') }}" rel="stylesheet">

@section("body")

    <div class= "container">
        <h1>About:</h1>

        <p>Welkom op de website van Eylenbosh Brouwerij.</p>
<p>Na het inloggen kunt u een keuze maken uit een uitgebreid assortiment bieren. Zodra u een keuze heeft gemaakt, klikt u erop en wordt u naar de bestelpagina geleid. Hier kunt u het gewenste aantal bieren selecteren. Vervolgens ziet u uw bestellingen en heeft u de optie om verder te winkelen of uw bestelling te plaatsen.</p>
<p>Na het plaatsen van uw bestelling ontvangt u een orderbevestiging met het totaalbedrag en de status van de order. In eerste instantie zal de status 'In behandeling' zijn en wordt de kader groen. Zodra de bestelling is verzonden, verandert de status in 'Verzonden'.</p>
<p>Bovendien kunt u dagelijks het laatste nieuws bekijken, met updates over ons nieuwe heerlijke bier en andere aangename zaken.</p>
<p>Neem gerust contact met ons op via het contactformulier voor eventuele problemen. Voor veelgestelde vragen kunt u eerst de FAQ raadplegen.</p>
<h4>Administrator</h4>
<p>Als een administrator inlogt op de site, belandt hij op de startpagina waar hij bieren kan updaten, verwijderen en toevoegen.</p>
<p>De administrator heeft ook de mogelijkheid om andere gebruikers te bevorderen tot administrator.</p>
<p>Alle orders van gebruikers worden door de administrator ontvangen, en hij kan de status van deze orders wijzigen zodra de bestelling onderweg is.</p>
<p>Daarnaast kan de administrator de FAQ beheren, inclusief het toevoegen, verwijderen en bijwerken van vragen.</p>
<p>De administrator kan ook berichten ontvangen van gebruikers die problemen hebben gehad met bepaalde bestellingen.</p>

        <h4>Bronnne</h4>

        Login user en admin:
        <p>https://www.youtube.com/watch?v=jmTJBGxn8vA </p>
        Forgot Password:
        <p>https://www.youtube.com/watch?v=xQr5PxbZGZI</p>

        Routing
        <p>https://laravel.com/docs/10.x/routing</p>
        <p>https://marketsplash.com/tutorials/laravel/how-to-create-laravel-routes/</p>

        Save images
        <p>https://laracasts.com/discuss/channels/general-discussion/how-to-save-image-to-folder-in-public</p>
        <p>https://stackoverflow.com/questions/38256539/how-and-where-can-store-images-with-laravel</p>



    </div>
@endsection
