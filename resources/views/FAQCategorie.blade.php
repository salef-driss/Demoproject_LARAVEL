@extends("layout")
@section("title", "FAQCategorie")
@section("body")

<div class="container">
    <h1 style="text-align:center; margin-bottom: 5%">FAQ</h1>

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
        <form action="{{ route('FAQCreate')}}" method="POST">
            @csrf
            <h3>Create a new category</h3>
            <div class="mb-3">
              <label for="categorie" class="form-label">Category Tittel</label>
              <input name = "CategorieName" type="text" class="form-control" id="categorie" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endif



    <div style="margin-top: 7%" class="row">
        @foreach ($faqCategories as $category)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">{{ $category->CategorieName }}</h5>

                        @if(Auth::user()->role == "admin")
                            <div class="btn-group" role="group">
                                <a style="margin-right: 2%" href="{{route("FAQUpdateGET", ["id" => $category->id])}}" class="btn btn-primary">Update</a>
                                <a style="margin-right: 2%"  href="{{ route('FAQDelete', ['id' => $category->id]) }}" class="btn btn-danger">Delete</a>
                            </div>
                        @endif

                        @if(Auth::user()->role == "admin" || Auth::user()->role == "not_admin")
                            <a style="margin-right: 2%"  href="{{route("FAQQuestionsGet" , ["id" => $category->id])}}" class="btn btn-dark">Look</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
