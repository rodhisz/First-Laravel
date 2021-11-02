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

    @if (Session::get('success'))
        <div class="row flash">
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>
    @endif

    <div class="row mt-4">
        <!-- Kiri -->
        <div class="col md-6">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{url('storage/'.$product->image)}}" class="img-fluid w-500" alt="...">
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

            <form action="{{route('landing.cart')}}" method="POST">
            @csrf

            <input type="hidden" value="{{$product->id}}" name="id">
            <input type="hidden" value="{{$product->name_product}}" name="name_product">
            <input type="hidden" value="{{$product->price}}" name="price">

            <table class="table">
                <tr>
                    <td>Category</td>
                    <td>:</td>
                    <td colspan="2">{{$product->category->name_category}}</td>
                </tr>
                <tr>
                    <td>waight</td>
                    <td>:</td>
                    <td colspan="2">: {{$product->weight}} kg</td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>:</td>
                    <td>
                        <input required class="form-control" name="quantity" style="width: 100%" type="number">
                    </td>
                </tr>
                <tr>
                    <td>Note</td>
                    <td>:</td>
                    <td>
                        <textarea class="form-control" placeholder="Opsional" name="note" rows="4"></textarea>
                    </td>
                </tr>
            </table>
            @guest
            <p class="text-center"><a href="{{route('login')}}">Login</a> untuk menambahkan produk ke keranjang</p>
            @else
            @if ($product->status == 'Available')
                <div class="row">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>&nbsp;Add to Cart</button>
                </div>
            @else
                <div class="row">
                    <button disabled type="submit" class="btn btn-dark"> <strong>{{$product->name_product}}</strong> Out of Stock</button>
                </div>
            @endif
            @endguest
            </form>
        </div>
    </div>
</div>


@endsection
