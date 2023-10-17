<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title' , "Custom auth Laravel")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href= "../css/app.css">
  </head>

  <style>
   .auto-dismiss.fade-out {
    opacity: 1;
    transition: opacity 2s;
}

    .auto-dismiss.fade-out.hidden {
        opacity: 0;
        display: none;
    }
  </style>

<script>
    setTimeout(function() {
        document.querySelectorAll('.auto-dismiss').forEach(function(element) {
            element.classList.add('fade-out-hidden'); // Voeg de klasse 'fade-out-hidden' toe voor de animatie
        });

        // Verwijder de elementen na het voltooien van de animatie
        setTimeout(function() {
            document.querySelectorAll('.auto-dismiss').forEach(function(element) {
                element.remove();
            });
        }, 2000); // Verwijder na 0,5 seconden (gelijk aan de duur van de animatie)
    }, 2000); // Start na 2 seconden
</script>


  <body>
    @include("include/header")
    @yield('body')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/app.js"></script>
  </body>
</html>
