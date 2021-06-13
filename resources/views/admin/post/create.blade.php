@extends('layouts.admin')
@section('content')
<!-- Content Header  -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Post Create</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
                    <li class="breadcrumb-item active"> Create Post</li>
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
                        <h4 class=" text-uppercase  mb-0"> <i class="fab fa-foursquare" style="font-size:18px;"></i> Create Post</h4>
                        <a href="{{route('post.index')}}" class="btn btn-danger btn-sm text-uppercase"><i
                                class="fa fa-th"></i> Post List</a>
                    </div>
                </div>
                <form action="{{route('post.store')}}" method="POST" role="form" id="PostForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
                                    <label for="">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="Post Title" value="{{old('title')}}">
                                    @if($errors->has('title'))
                                    <span class="error">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('category') ? ' has-error' : ''}}" >
                                    <label for="">Category <span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="" style="display: none">Select Category</option>
                                        @foreach ($category as $data)
                                            <option value="{{$data->id}}">{{$data->category_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @if($errors->has('category'))
                                    <span class="error">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                    
                                <div class="form-group">
                                    <label>Tags <span class="text-danger">*</span></label><br>
                                    @foreach ($tags as $tags)
                                    <div class="form-check d-inline-block pr-2">
                                        <input class="form-check-input" type="checkbox" id="tag_{{$tags->id}}" value="{{$tags->id}}" name="tags[]">
                                        <label for="tag_{{$tags->id}}" class="form-check-label">{{$tags->tag_name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <div class="form-group"{{ $errors->has('image') ? ' has-error' : ''}}>
                                    <label for="">Image <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="image" value="{{old('image')}}" onchange="readURL(this);">
                                                <label class="custom-file-label" for="customFile">Choose file...</label>
                                              </div>
                                        </div>
                                        <div class="col-md-5">
                                            <img id="upload_image" src="{{asset('uploads')}}/avater-noimg.png" alt="photo" class="img-fluid" style="max-height: 150px;">
                                        </div>
                                    </div>
                                    @if($errors->has('image'))
                                    <span class="error">{{ $errors->first('image') }}</span>
                                    @endif
                                  </div>

                                <div class="form-group"{{ $errors->has('description') ? ' has-error style="border-color:red;"' : ''}}>
                                    <label> Description <span class="text-danger">*</span></label>
                                    <textarea id="summernote" class="form-control" rows="6" name="description">{{old('description')}}</textarea> 
                                    @if($errors->has('description'))
                                    <span class="error">{{ $errors->first('description') }}</span>
                                    @endif
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

@section('style')
    <!-- summernote -->
<link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/summernote/summernote-bs4.css">
@endsection
@section('script')
     <!-- Summernote -->
<script src="{{asset('contents/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
@endsection