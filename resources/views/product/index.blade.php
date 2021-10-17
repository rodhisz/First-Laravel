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

        <!-- Start kode untuk form pencarian -->
        <form class="form" method="get" action="{{ route('search') }}">
            <div class="form-group w-50 mb-3">
                {{-- <label for="search" class="d-block mr-2">Search</label> --}}
                <input type="text" name="search" class="form-control w-75 d-inline btn-round" id="search" placeholder="Search...">
                <button type="submit" class="btn btn-primary btn-rounded">
                    <i class="fa fa-search search-icon"></i>
                </button>
            </div>
        </form>
        <!-- Start kode untuk form pencarian -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Product List</h4>
                            <a class="btn btn-primary btn-rounded ml-auto" type="button" href="{{route('product.create')}}">
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
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
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
                                        <td>{{($p->status)}}</td>
                                        <td>{{$p->quantity}}</td>
                                        <td>{{$p->weight}}</td>
                                        <td>
                                            <img src="{{url('storage/'.$p->image)}}" style="max-width: 100px !important; border-radius:5px;" class="img-thumbnail" alt="">
                                        </td>
                                        <td>
                                            <div class="form-button-action">

                                                <a href="{{route('product.edit',$p->id)}}" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Product">
                                                    <i class="fa fa-edit"></i>
                                                </a>

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
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                        Showing &nbsp; <strong>{{ $product->firstItem() }}</strong> &nbsp;
                                        to &nbsp; <strong>{{ $product->lastItem() }}</strong> &nbsp;
                                        of &nbsp; <strong>{{ $product->total() }}</strong> &nbsp; entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                        {{ $product->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
