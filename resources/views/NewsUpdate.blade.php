@extends("layout")
@section("title","Home Page")

<link href= "{{ asset('css/welcome.css') }}" rel="stylesheet">

@section("body")

<div class="container">
    <h1 style="text-align: center ; margine-bottom:2%">Update </h1>

    <div class="row">
        <div class="col-md-3"> <!-- Allocate 30% width to the image -->
            <img src="{{ asset('images/' . $news->Cover_Image) }}" style="max-width: 100%;" alt="">
        </div>
        <div class="col-md-9"> <!-- Allocate 70% width to the form -->
            <form class="row g-3" action=""  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$news->Title}}">
                </div>
                <div class="mb-3">
                    <label for="exampleTextarea" class="form-label">Content</label>
                    <textarea class="form-control" id="exampleTextarea" name="content" rows="4">{{$news->Content}}</textarea>
                </div>

                <div class="col-md-6">
                    <label for="file" class="form-label">Select Image</label>
                    <input type="file" class="form-control" name="bierimage" >
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
      </form>
</div>

@endsection
