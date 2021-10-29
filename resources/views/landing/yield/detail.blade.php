@extends('landing.template')

@section('content')

<div class="container" style="margin-top: 30px">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>

    <div style="margin-top: -10px;">
        <div class="alert alert-success" role="alert">
            A simple success alert—check it out!
        </div>
    </div>

    <div class="row mt-4">
        <!-- Kiri -->
        <div class="col md-6">
            <div class="card" style="width: 18rem !important;">
                <div class="card-body text-center">
                    <img src="{{url('storage/'.$product->image)}}" class="img-fluid w-75" alt="...">
                </div>
            </div>
        </div>
        <!-- Kanan -->
        <div class="col md-6">
            <h2>
                <Strong>{{$product->name_product}}</Strong>
            </h2>
            <h4>Rp. {{number_format($product->price)}}
                @if ($product->status == 'Available')
                    <span class="badge bg-success"><i class="fas fa-check"></i>Available</span>
                @else
                    <span class="badge bg-danger"><i class="fas fa-times"></i>Unavailable</span>
                @endif
            </h4>

            <table class="table">
                <tbody>
                <tr>
                    <td>Category</td>
                    <td colspan="2">: {{$product->category->name_category}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>waight</td>
                    <td colspan="2">: {{$product->weight}} kg</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td colspan="2">: {{$product->quantity}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td colspan="2">: {{$product->status}}</td>
                    <td></td>
                </tbody>
            </table>
            <div class="row">
                <a href="cart.html" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>
</div>


@endsection
