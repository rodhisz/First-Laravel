@extends('landing.template')

@section('content')

<!-- Corousel -->
@include('landing.includes.corousel')
<!-- End Corousel -->

<section class="pilih-liga mt-4">
    <h3><strong>Category</strong></h3>
    <div class="row mt-4">
    @foreach($category as $cat)
    <div class="col">
        <a style="text-decoration:none; color:#5a5a5a;" href="{{route('landing.category', $cat->slug)}}">
            <div class="card shadow">
            <div class="card-body text-center">
                {{$cat->name_category}}
            </div>
            </div>
        </a>
    </div>
    @endforeach
    </div>
</section>

<section class="container mt-5 mb-5">
    <h3 class="d-flex justify-content-between">
        <strong>Product Terbaru</strong>
        <a class="btn btn-dark" href="#">View All</a>
    </h3>

    <div class="row">
    @foreach ($product as $p)
        <div class="col md-3">
            <div class="card" style="width: 18rem !important;">
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



