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
                            <h4 class="card-title">Category List</h4>
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Add Category
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Modal -->
                        @include('category.modal.add')

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr style="text-align: center;" role="row">
                                        <th class="sorting" style="width: 10px;">#</th>
                                        <th class="sorting" style="width: 167,797;">Category</th>
                                        <th style="width: 122,344;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($category as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td class="text-left">{{$p->name_category}}</td>
                                        <td>
                                            <div class="form-button-action">

                                                <a href="{{route('update.category',$p->id)}}" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit" data-toggle="modal" data-target="#editModal{{$p->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @include('category.modal.edit')
                                                </form>

                                                <button data-target="#delCategory{{$p->id}}" data-toggle="modal" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                @include('category.modal.delete')

                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data Tidak Ditemukan</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                        Showing &nbsp; <strong>{{ $category->firstItem() }}</strong> &nbsp;
                                        to &nbsp; <strong>{{ $category->lastItem() }}</strong> &nbsp;
                                        of &nbsp; <strong>{{ $category->total() }}</strong> &nbsp; entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                        {{ $category->links('pagination::bootstrap-4') }}
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
