@extends("layout")
@section("title","Home Page")

<link href= "{{ asset('css/welcome.css') }}" rel="stylesheet">

@section("body")

    <div class= "container">
        <h1>About:</h1>
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
