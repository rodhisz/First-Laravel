<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">NBA Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('allproduct')}}">All Product</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ( $category as $cat )
                    <li><a href="{{route('landing.category',$cat->slug)}}" class="dropdown-item">{{$cat->name_category}}</a></li>
                @endforeach
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
            </li>
        </ul>
        <form class="d-flex">
            @guest
                <a class="nav-link anchor" aria-current="page" href="{{route('allproduct')}}"><i class="fas fa-search"></i>Search</a>
                <a href="{{route('login')}}" class="btn btn-outline-dark me-2" type="button">Login</a>
                <a href="{{route('register')}}" class="btn btn-dark me-2" type="button">Register</a>
            @else
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <a class="nav-link anchor" aria-current="page" href="{{route('search.product')}}"><i class="fas fa-search"></i>Search</a>
                <a class="nav-link anchor ms-3" aria-current="page" href="{{route('allproduct')}}"><i class="fas fa-shopping-cart"></i>Cart</a>
                <a class="nav-link anchor ms-3" aria-current="page" href="{{route('allproduct')}}"><i class="fas fa-history"></i>History</a>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('profile.index')}}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endguest
        </form>
        </div>
    </div>
</nav>
