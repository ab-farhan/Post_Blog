@extends('layouts.admin')
@section('content')
<!-- Content Header  -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">User Create</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a></li>
                    <li class="breadcrumb-item active">user Create </li>
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
                        <h4 class=" text-uppercase  mb-0"> <i class="fab fa-foursquare"></i> Create User</h4>
                        <a href="{{url('dashboard/user')}}" class="btn btn-danger text-uppercase"><i
                                class="fa fa-th"></i> User List</a>
                    </div>
                </div>
                <form action="{{route('user.store')}}" method="POST" role="form" id="userForm">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                                    <label for=""> Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id=""
                                        placeholder="Your name" value="{{old('name')}}">
                                    @if($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                                    <label for=""> Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" id=""
                                        placeholder="Your email" value="{{old('email')}}">
                                    @if($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for=""> Phone </label>
                                    <input type="text" name="phone" class="form-control" id=""
                                        placeholder="Your phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id=""
                                        placeholder="Password">
                                        @if($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" class="form-control" id=""
                                        placeholder="Confirm password">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Description"
                                        name="description">{{old('description')}}</textarea>
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