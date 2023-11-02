@extends("layout")

@section("title", "News creator")

@section("body")

    <div class="container mt-5">
        <h1 style="text-align: center">News</h1>

        @if($errors->any())
        <div class = "col-12">
            @foreach($errors->all() as $error)
                <div class = "alert alert-danger auto-dismiss fade-out">{{$error}}</div>
            @endforeach
        <div>
        @endif

        @if(session()->has("error"))
        <div class="alert alert-danger auto-dismiss fade-out">{{ session("error") }}</div>
        @endif

        @if($user->role == "admin")
        <div class="card">
            <div class="card-header">
                <h5>Example Card Form</h5>
            </div>
            <div class="card-body">
                <form action="{{route("NewsAddPost")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Title:</label>
                        <input type="text" class="form-control" id="Title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="message">Content:</label>
                        <textarea class="form-control" id="content" name="content" rows="4" placeholder="Enter your content"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="file" class="form-label">Select Image</label>
                        <input type="file" class="form-control" name="newsImage" >
                    </div>
                    <button style="margin-top: 3%" type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        @endif

        @if(!empty($news))
                @foreach($news as $item)
                    <div style="margin-top: 2%"  class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="{{ asset('images/' . $item->Cover_Image) }}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{$item->Title}}</h5>
                              <p class="card-text">{{$item->Content}}</p>
                              <p class="card-text"><small class="text-body-secondary">Publishing Date: {{$item->Publishing_date}}</small></p>

                              @if($user->role == "admin")
                              <a href="{{ route('DeleteNewsPost', ['id' => $item->id]) }}" class="btn btn-danger">Delete</a>
                              <a href="{{ route('UpdateNews', ['id' => $item->id]) }}" class="btn btn-primary">Update</a>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                @endforeach
            @else
        @endif
    </div>
@endsection
