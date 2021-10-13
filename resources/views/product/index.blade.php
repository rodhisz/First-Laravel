@extends('user.template')
@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{$title}}</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{$title}}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Product List</h4>
                            <a class="btn btn-primary btn-round ml-auto" type="button" href="{{route('product.create')}}">
                                <i class="fa fa-plus"></i>
                                Add Product
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Weight</th>
                                        <th>Image</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($product as $p)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$p->name_product}}</td>
                                        <td>Rp. {{number_format($p->price)}}</td>
                                        <td>{{$p->quantity}}</td>
                                        <td>{{$p->weight}}</td>
                                        <td><img src="{{url('storage/'.$p->image)}}" style="max-width: 100px" class="img-thumbnail" alt=""></td>
                                        <td>
                                            <div class="form-button-action">
                                                <form action="{{route('product.update', $p->image)}}" method="post">
                                                    @csrf
                                                    @method('PASSWORD_DEFAULT')
                                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                </form>
                                                <form action="{{route('product.destroy', $p->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
