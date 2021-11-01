@extends('landing.template')

@section('content')

<div class="container" style="margin-top: 30px">

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item active"aria-current="page"><a href="{{asset('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
        </nav>
    </div>

    <section class="container mt-5 d-flex justify-content-center">
        <form class="form" action="{{route('search.product')}}" method="GET">
            <div class="input-group mb-3" style="width: 500px">
                <input value="{{$keyword}}" type="text" name="search" class="form-control" placeholder="Search.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="basic-addon2">Search</button>
            </div>
        </form>
    </section>

    <section class="container mt-5 mb-5">

        <div class="row">
        @foreach ($product as $p)
            <div class="col md-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{url('storage/'.$p->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$p->name_product}}</h5>
                    <p class="card-text">Rp. {{number_format($p->price)}}</p>
                    <div class="row">
                        <a href="#" class="btn btn-primary">Buy Now</a>
                        <a href="{{route('product.detail',$p->slug)}}" class="btn btn-primary mt-1">Detail</a>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    </section>
</div>
@endsection
