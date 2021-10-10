@extends('user.template')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="card-title">{{$title}}</div>
    </div>
    <div class="card-body">
        <div class="card-sub">
            {{$title}}
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Image</th>
                </tr>

            </thead>
            <tbody>
                @foreach($product as $product)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name_product}}</td>
                    <td>{{$product->Price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->weight}}</td>
                    <td>{{$product->image}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

