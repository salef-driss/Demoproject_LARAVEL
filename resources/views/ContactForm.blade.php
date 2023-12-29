@extends('layout')
@section("title" , "Registration")

@section("body")

<div class="container">

    <h1 class = "Titel_page">Contact Admin</h1>

    @if($errors->any())
    <div class = "col-12">
        @foreach($errors->all() as $error)
            <div class = "alert alert-danger auto-dismiss fade-out">{{$error}}</div>
        @endforeach
    <div>
    @endif

    @if(session('success'))
    <div class="alert alert-success auto-dismiss fade-out">
        {{ session('success') }}
    </div>
    @endif

    @if(Auth::user()->role == "admin")
        @foreach($contactForms as $contact)

        <div style="margin-bottom: 2%" class="card" style="width: 18rem;">
            <div class="card-body">

                <h5 class="card-title">{{$contact->Titel}}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Email: {{$contact->email}}</h6>
                <h6 class="card-subtitle mb-2 text-body-secondary">Name: {{$contact->name}}</h6>
                <p class="card-text">{{$contact->message}}</p>
                <a href="{{ route('ContactFormDelete', ['id' => $contact->id]) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
        @endforeach
    @endif

    @if(Auth::user()->role == "not_admin")
    <form action="{{route("ContactFormCreaet")}}">
        <div class="mb-3">
          <label for="Title" class="form-label">Title of your question</label>
          <input name="title" type="text" class="form-control" id="title">
        </div>

        <div class="form-floating">
            <textarea name="question" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Question</label>
        </div>

        <button style="margin-top: 3%" type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endif
</div>

@endsection
