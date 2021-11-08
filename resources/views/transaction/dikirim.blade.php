@extends('user.template')
@section('content')


<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Lunas</h4>
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
                    <a href="#">Transaction</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Lunas</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lunas Transaction</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Unique Code</th>
                                        <th>Order Code</th>
                                        <th>Member Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order as $or)
                                    <tr style="vertical-align: 10px">
                                        <td>{{$i++}}</td>
                                        <td>{{$or->unique_code}}</td>
                                        <td>{{$or->order_code}}</td>
                                        <td>{{$or->user->name}}</td>
                                        <td>
                                            @if ($or->status == 3)
                                                <span class="badge bg-info"><i class="fas fa-check me-2"></i>Dikirim</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">

                                                <a href="#" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" data-toggle="modal" data-target="#editLunas{{$or->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @include('transaction.modal.lunas')

                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7">Data Kosong</td>
                                    </tr>
                                    @endforelse
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
