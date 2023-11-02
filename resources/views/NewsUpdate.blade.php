@extends("layout")
@section("title","Home Page")

<link href= "{{ asset('css/welcome.css') }}" rel="stylesheet">

@section("body")

<div class="container">
    <h1 style="text-align: center;">Update </h1>

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

    <div class="row">
        <div class="col-md-3"> <!-- Allocate 30% width to the image -->
            <img src="{{ asset('images/' . $news->Cover_Image) }}" style="max-width: 100%;" alt="">
        </div>
        <div class="col-md-9"> <!-- Allocate 70% width to the form -->
            <form class="row g-3" action="{{ route('Update_News_Post', ['id' => $news->id]) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" class="form-control" name="Title" value="{{$news->Title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleTextarea" class="form-label">Content</label>
                    <textarea class="form-control" id="exampleTextarea" name="Content" rows="4">{{$news->Content}}</textarea>
                </div>

                <div class="col-md-6">
                    <label for="file" class="form-label">Select Image</label>
                    <input type="file" class="form-control" name="Cover_Image" >
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a style="margin-left: 2%" href="{{route("showNews")}}" class="btn btn-secondary">Go Back</a>
                    <a style="margin-left: 2%" href="javascript:window.location.reload()" class="btn btn-dark">Cancel</a>

                </div>
            </form>
        </div>
    </div>
      </form>
</div>

@endsection
