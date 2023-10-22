<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

  <!--config verwijst naar config folder  en de app die daarin zit-->

    <a class="navbar-brand" href="#">
        @if(auth() -> check())
            {{auth()->user()->name}}
        @else
            <img src="{{asset('images/361861847_784529253676592_7399646423149979895_n.jpg') }}" alt="" style="width: 70px; height: auto;" >
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        @auth


            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
            </li>
            @if(auth()->user()->role == "admin")
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('showAddBier')}}">Add Beer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('adminifyShow')}}">Adminify</a>
                </li>
            @endif
                <li class="nav-item">
                <a class="nav-link" href="{{route('acountsettings')}}">Account</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Logout</a>
            </li>


        @else
            <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('registration')}}">Registration</a>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
