@extends('landing.template')

@section('content')
<main class="container" style="margin-top: 30px">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>

    @if (Session::get('success'))
        <div class="row flash">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <table class="table text-center" style="border 100px;">
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
                        <form action="{{route('cart.delete', $d->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td>
                                <button class="btn" type="submit"><i class="fas fa-trash text-danger" style="cursor: pointer;"></i></button>
                            </td>
                        </form>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Keranjang masih kosong</td>
                    </tr>
                    @endforelse

                    @if (!empty($order))
                    <tr>
                        <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                        <td align="right">Rp. {{number_format($order->total_price)}}</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">Kode Unik :</td>
                        <td align="right">Rp. {{number_format($order->unique_code)}}</td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right"><strong>Total yang Harus Dibayarkan :</strong></td>
                        <td align="right">Rp. {{number_format($order->total_price + $order->unique_code)}}</td>
                    </tr>
                    <tr>
                        <td colspan="7" align="right"><a href="{{route('checkout')}}" class="btn btn-primary">Check Out</a></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
