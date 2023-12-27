@extends("layout")
@section("title", "FAQCategorie")
@section("body")

<div class="container">

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

    <h1 style="text-align:center; margin-bottom: 5%">FAQ</h1>
    <h2>Update the name of the FAQ category </h2>
    <form action="{{route("FAQUpdatePost" , ["id" => $FAQUpdate->id])}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title FAQ Categorie</label>
          <input type="text"  class="form-control" name="TitleFAQ_Update" value="{{$FAQUpdate->CategorieName}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('FAQUpdateGET', ['id' => $FAQUpdate->id]) }}" class="btn btn-light">Cancel</a>
        <a href="{{ route('FAQCategorie')}}" class="btn btn-dark" >Go Back</a>
    </form>

</div>

@endsection
