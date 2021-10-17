@extends('landing.template')

@section('content')

<!-- Corousel -->
@include('landing.includes.corousel')
<!-- End Corousel -->

<section class="container mt-5 mb-5">
    <h3 class="d-flex justify-content-between">
        <strong>Best Seller</strong>
        <a class="btn btn-dark" href="#">View All</a>
    </h3>

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

@endsection



