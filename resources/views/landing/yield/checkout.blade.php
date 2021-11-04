@extends('landing.template')

@section('content')

<?php $user = Illuminate\Support\Facades\Auth::user(); ?>

<main class="container" style="margin-top: 30px">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('cart')}}">Cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>

    <div style="margin-top: -10px;">
        <div class="alert alert-success" role="alert">
            Produk berhasil ditambahkan
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{route('cart')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col md-6">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p> Total Tagihan Anda
                <br>
                <h4><strong>Rp. {{number_format($order->total_price + $order->unique_code)}}</strong></h4>
                <br>
                Pilih Rekening Pembayaran dibawah ini :
            </p>
            <div>
                <table width="100%">
                        <tr>
                            <td>
                                <div class="mt-4">
                                    <img src="https://1.bp.blogspot.com/-whCKrPGUY80/YCK2KdGONrI/AAAAAAAAD34/FD0JXqUg5Fk8fAqgQcqLrTFwTRdSnmDUgCLcBGAsYHQ/s1600/Logo%2BBSI%2B%2528Bank%2BSyariah%2BIndonesia%2529.png" alt="Bank BSI" width="80">
                                </div>
                            </td>
                            <td>
                                <div class="mt-4">
                                    <h5>Bank BSI</h5>
                                    No. Rekening <strong>345655677</strong> a.n <strong>BAMBANG SUBARJO</strong>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="mt-4">
                                    <img src="https://1.bp.blogspot.com/-r636Aob_z_A/XicFI0zvA-I/AAAAAAAABe8/dIi1moSFZpMO7TFwhXAIEeaIpQhMCK9yACLcBGAsYHQ/s1600/Logo%2Bbank%2BBNI.png" alt="Bank BSI" width="80">
                                </div>
                            </td>
                            <td>
                                <div class="mt-4">
                                    <h5>Bank BNI</h5>
                                    No. Rekening <strong>456789876898</strong> a.n <strong>BAMBANG SUBARJO</strong>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="mt-4">
                                    <img src="https://rekreartive.com/wp-content/uploads/2019/04/Logo-BRI-Bank-Rakyat-Indonesia-PNG-Terbaru-1140x973.png" alt="Bank BSI" width="80">
                                </div>
                            </td>
                            <td>
                                <div class="mt-4">
                                    <h5>Bank BRI</h5>
                                    No. Rekening <strong>78909878987</strong> a.n <strong>BAMBANG SUBARJO</strong>
                                </div>
                            </td>
                        </tr>
                </table>
            </div>
        </div>

        <div class="col md-6">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form action="{{route('landing.update-address')}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group mb-3">
                <label for="">No. HP</label>
                <input readonly value="{{$user->number_phone}}" type="text" class="form-control mt-2">
            </div>
            <div class="form-group mb-3">
                <label for="">Alamat</label>
                <textarea name="address" type="text" class="form-control mt-2" style="height: 190px;">{{$user->address}}</textarea>
            </div>
            <div class="form-group mb-3">
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-arrow-right me-2"></i>Confirmation
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Payment Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Anda Telah Transfer dan Mengisi Nomor HP dan Alamat dengan Benar
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirmation</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

</main>

@endsection
