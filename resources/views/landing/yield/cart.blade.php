@extends('landing.template')

@section('content')
<main class="container" style="margin-top: 30px">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>

    <div style="margin-top: -10px;">
        <div class="alert alert-danger" role="alert">
            Produk telah dihapus!
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table text-center" style="border: 0px;">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Name</td>
                        <td>Image</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($detail as $d )
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$d->product->name_product}}</td>
                        <td><img src="{{url('storage/'.$d->product->image)}}" class="img-fluid rounded" width="100px" alt=""></td>
                        <td>{{$d->total_order}}</td>
                        <td>Rp. {{number_format($d->product->price)}}</td>
                        <td><strong>Rp. {{number_format($d->price)}}</strong></td>
                        <td><i class="fas fa-trash text-danger" style="cursor: pointer;"></i></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Keranjang masih kosong</td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                        <td align="right">Rp 400.000</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">Kode Unik :</td>
                        <td align="right">Rp 563</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right"><strong>Total yang Harus Dibayarkan :</strong></td>
                        <td align="right">Rp 400.563</td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right"><a href="checkout.html" class="btn btn-primary">Check Out</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
