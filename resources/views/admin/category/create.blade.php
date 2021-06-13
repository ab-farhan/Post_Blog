@extends('layouts.admin')
@section('content')
<!-- Content Header  -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Category Create</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
                    <li class="breadcrumb-item active">Category Create </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class=" text-uppercase  mb-0"> <i class="fab fa-foursquare"></i> Create Category</h4>
                        <a href="{{url('dashboard/category')}}" class="btn btn-danger text-uppercase"><i
                                class="fa fa-th"></i> Category List</a>
                    </div>
                </div>
                <form action="{{route('category.store')}}" method="POST" role="form" id="categoryForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                                    <label for="">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id=""
                                        placeholder="Category Name">
                                    @if($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Category Details</label>
                                    <textarea class="form-control" rows="3" placeholder="Details"
                                        name="details"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-danger text-bold text-uppercase">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection