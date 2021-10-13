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
                        <div class="card-title">{{$title}}</div>
                    </div>
                    <div class="card-body">

                        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-1"></div>

                            <div class="col-md-6">

                                <div class="form">

                                    <div class="form-group form-show-notify row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                            <label>Product Name :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" name="name_product" value="{{$product->name_product}}" class="form-control input-fixed" id="exampleInputPassword1">
                                        </div>
                                    </div>

                                    <div class="form-group form-show-notify row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                            <label>Price :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" name="price" value="{{$product->price}}"class="form-control input-fixed" id="exampleInputPassword1">
                                        </div>
                                    </div>

                                    <div class="form-group form-show-notify row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                            <label>Status :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            {{-- <input type="text" name="price" value="{{$product->price}}"class="form-control input-fixed" id="exampleInputPassword1"> --}}
                                            <select class="@error('status') is invalid @enderror form-control input-fixed" name="status" id="">
                                                <option value="">Select Status</option>
                                                <option value="Available" @if (old('status')) == "Available") selected="selected" @endif>Available</option>
                                                <option value="Unavailable" (old('status')) == "Unavailable" ? 'selected' : '' }}>Unavailable</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-show-notify row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                            <label>Quantity :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control input-fixed" id="exampleInputPassword1">
                                        </div>
                                    </div>

                                    <div class="form-group form-show-notify row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                            <label>Weight :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" name="weight" value="{{$product->weight}}" class="form-control input-fixed" id="exampleInputPassword1">
                                        </div>
                                    </div>

                                    <div class="form-group form-show-notify row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                            <label>Photo :</label>
                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            @if ($product->image != '')
                                            <img src="{{url('storage', $product->image)}}" alt="" class="avatar-img rounded">
                                            @else
                                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username}}"   alt="..." class="avatar-img rounded">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group form-show-notify row">
                                        <div class="col-lg-3 col-md-3 col-sm-4 text-right">
                                        </div>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form">
                            <div class="form-group from-show-notify row">
                                <div class="col-lg-3 col-md-3 col-sm-12">

                                </div>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <button id="displayNotif" type="submit" class="btn btn-primary">Save Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
