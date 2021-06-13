@extends('layouts.admin')
@section('content')
<!-- Content Header  -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">User Profile Edit</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">user profile</li>
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
                        <h4 class=" text-uppercase  mb-0"> <i class="fas fa-edit"  style="font-size:16px;"></i> Edit Profile</h4>
                        <a href="{{url('dashboard/user')}}" class="btn btn-danger text-uppercase"><i
                                class="fa fa-th"></i> User List</a>
                    </div>
                </div>
                <form action="{{route('user.profile.update')}}" method="POST" role="form" id="userEditForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                                            <label for=""> Name <span class="text-danger">*</span></label>
                                            <input type="hidden" name="id"value="{{$user->id}}">
                                            <input type="hidden" name="slug"value="{{$user->slug}}">
                                            <input type="text" name="name" class="form-control" id="" placeholder="Your name" value="{{$user->name}}">
                                            @if($errors->has('name'))
                                            <span class="error">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                                            <label for=""> Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" id=""
                                                placeholder="Your email" value="{{$user->email}}">
                                            @if($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Phone </label>
                                            <input type="text" name="phone" class="form-control" id=""
                                                placeholder="Your phone" value="{{$user->phone}}">
                                                
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image</label><small class="text-danger"> (max file size 2 mb)</small>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image" onchange="readURL(this);">
                                                <label class="custom-file-label" for="customFile">Choose file...</label>
                                            @if($errors->has('image'))
                                            <span class="error">{{ $errors->first('image') }}</span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password </label><small class="text-danger"> (if you want to change password)</small>
                                            <input type="password" name="password" class="form-control" id=""
                                                placeholder="Enter password">
                                            @if($errors->has('password'))
                                            <span class="error">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" placeholder="Description"
                                                name="description">{{$user->description}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-danger text-bold text-uppercase">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card m-2" style="box-shadow: 0px 0px 10px #e7e7e7;">
                                    <div class="card-body">
                                        <div class="text-center">
                                            @if ($user->image != "image")
                                            <img id="upload_image" src="{{asset('uploads/user/'.$user->image)}}" alt="" class="img-fluid img-rounded img-thumbnail" style="width:150px; height: 150px; border-radius: 50%;">
                                            @else
                                            <img src="{{asset('contents/admin/dist/img/avatar.png')}}" id="upload_image" alt="photo" class="img-fluid img-rounded img-thumbnail" style="width:150px; max-height: 150px; border-radius: 50%;">
                                            @endif
                                        </div>
                                        <div class="text-center pt-2">
                                            <h4 class="text-uppercase">{{$user->name}}</h4>
                                        <p class="text-info">{{$user->email}}</p>
                                        <p class="mb-3">{{$user->description}}</p>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection