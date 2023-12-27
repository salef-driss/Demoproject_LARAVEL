@extends("layout")
@section("title", "FAQCategorie")
@section("body")

<div class="container">

    <h1 style="text-align:center; margin-bottom: 5%">FAQ Update</h1>

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

    <form action="{{route("FAQQuestion_Update_Post" , ["id" => $UpdatedFAQ->id])}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="" class="form-label">Title</label>
          <input type="text" class="form-control" value="{{$UpdatedFAQ->question_Title}}" name="FAQTitle">
        </div>
        <label for="" class="form-label">Context</label>

        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" name="contextFAQ" style="height: 100px">{{$UpdatedFAQ->question_content}}</textarea>
        </div>
        <button  style="margin-top: 2%" type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
