@extends('layouts.admin')
@section('content')
    <!-- Content Header  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 pl-0">
            <h1 class="m-0 text-dark"> Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
              <li class="breadcrumb-item active"> Edit Category</li>
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
                    <h4 class=" text-uppercase  mb-0"> <i class="fab fa-foursquare"></i> Edit Category</h4>
                    <a href="{{route('category.index')}}" class="btn btn-danger text-uppercase"><i class="fa fa-th"></i> Category List</a>
                </div>
              </div>
              <form action="{{route('category.update',[$category->id])}}" method="POST" role="form" id="categoryForm">
                @csrf
                @method('PUT')
                <div class="card-body">
                  
                    <div class="row">
                      <div class="col-md-8 offset-md-2">
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                        <label for="">Category Name <span class="text-danger">*</span></label>
                        <input type="hidden" name="id" class="form-control" id="" value="{{$category->id}}">
                        <input type="text" name="name" class="form-control" id="" value="{{$category->category_name}}">
                        @if($errors->has('name'))
                          <span class="error">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" rows="3"  name="details">{{$category->category_details}}</textarea>
                      </div>
                      </div>
                    </div>
                  </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-danger text-bold text-uppercase">update</button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>

@endsection