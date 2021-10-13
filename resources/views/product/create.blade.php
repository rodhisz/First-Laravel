@extends('user.template')

@section('content')
<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Add Product</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="{{route('profile.index')}}">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="{{route('product.store')}}">Add Product</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Add Product</div>
					</div>
					<form action="{{url('/product')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-6">
									<div class="form">
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Product Name :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="text" name="name_product" class="form-control input-fixed" id="exampleInputPassword1">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Price :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="text" name="price" class="form-control input-fixed" id="exampleInputPassword1">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Quantity :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="text" name="quantity" class="form-control input-fixed" id="exampleInputPassword1">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Weight :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="text" name="weight" class="form-control input-fixed" id="exampleInputPassword1">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label>Image :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<img src="https://ui-avatars.com/api/?name={{Auth::user()-> username}}" alt="..." class="avatar-img rounded">
											</div>
										</div>
										<div class="form-group form-show-notify row">
											<div class="col-lg-3 col-md-3 col-sm-4 text-right">
												<label> Gambar :</label>
											</div>
											<div class="col-lg-4 col-md-9 col-sm-8">
												<input type="file" name="image">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form">
								<div class="form-group from-show-notify row">
									<div class="col-lg-3 col-md-3 col-sm-12">
									</div>
									<div class="col-lg-4 col-md-9 col-sm-12">
										<button id="displayNotif" type="submit" class="btn btn-success">Add Produk</button>
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
