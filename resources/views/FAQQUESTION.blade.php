@extends("layout")
@section("title", "FAQCategorie")
@section("body")


<div class="container">
    <h1 style="text-align:center; margin-bottom: 2%">FAQ : {{$category->CategorieName}} </h1>

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
        <div id="container">
            <form action="{{route("FAQQuestionCreate" , ["id" => $category->id])}}" method="POST">
                @csrf
                <h2>Create a new FAQ</h2>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Title</label>
                  <input type="text" class="form-control" name="TitleFAQQuestion" aria-describedby="emailHelp">
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="contextFAQ" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Contect</label>
                </div>

                <button style="margin-top: 2%" type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    @endif

    @forEach($questions as $question)

    <div style="margin-top: 2%" class="card text-center">

        <div class="card-body">
          <h5 class="card-title">{{$question->question_Title}}  </h5>
          <p class="card-text">{{$question->question_content}}</p>

          @if(Auth::user()->role == "admin")
          <a href="{{route("FAQQuestion_Update_show" , ["id" => $question->id])}}" class="btn btn-primary">Update</a>
          <a style="margin-left: 2% ; margin-right:2%" href="{{route("FAQQuestionDelete" , ["id" => $question->id])}}" class="btn btn-danger">Delete</a>
          @endif
          <a href="{{ route('FAQCategorie')}}" class="btn btn-dark">Go Back</a>
        </div>
      </div>
    @endforeach

</div>

@endsection
