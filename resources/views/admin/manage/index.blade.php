@extends('layouts.admin')
@section('content')
<!-- Content Header  -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 pl-0">
                <h1 class="m-0 text-dark">Manage Website </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Manage Website </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- /.content-header -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class=" text-uppercase  mb-0"> <i class="fas fa-edit" style="font-size:16px;"></i> Manage
                            Website</h4>
                        {{-- <a href="{{url('dashboard/user')}}" class="btn btn-danger text-uppercase"><i
                            class="fa fa-th"></i> User List</a> --}}
                    </div>
                </div>
                <form action="{{route('manage.update')}}" method="POST" role="form" id="manageForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <div class="row">
                                    <div class="col-md-6">
        
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                                            <label for="">Website Name </label>
        
                                            <input type="text" name="name" class="form-control" id="" placeholder="Your name"
                                                value="{{$manage->name}}">
                                            @if($errors->has('name'))
                                            <span class="error">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group{{ $errors->has('header_logo') ? ' has-error' : ''}}">
                                                    <label for="">Header Logo</label><small class="text-danger"> (max file size
                                                        2 mb)</small>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile"
                                                            name="header_logo" onchange="readURL(this);">
                                                        <label class="custom-file-label" for="customFile">Choose file...</label>
                                                        @if($errors->has('header_logo'))
                                                        <span class="error">{{ $errors->first('header_logo') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <img src="@if($manage->header_logo != '') {{asset('uploads/logo/'.$manage->header_logo)}} @else{{asset('contents/admin/dist/img/avatar.png')}}@endif" id="upload_image"
                                                    alt="photo" class="img-fluid img-rounded img-thumbnail"
                                                    style="width:90px; max-height:90px; border-radius: 50%;">
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-8">
                                                <div class="form-group{{ $errors->has('footer_logo') ? ' has-error' : ''}}">
                                                    <label for="">Footer Logo</label><small class="text-danger"> (max file size
                                                        2 mb)</small>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" id="flogo"
                                                            name="footer_logo" onchange="readURL(this);">
                                                        <label class="custom-file-label" for="customFile">Choose file...</label>
                                                        @if($errors->has('footer_logo'))
                                                        <span class="error">{{ $errors->first('footer_logo') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <img src="@if($manage->footer_logo != '') {{asset('uploads/logo/'.$manage->footer_logo)}} @else{{asset('contents/admin/dist/img/avatar.png')}}@endif" id="image_upload"
                                                    alt="photo" class="img-fluid img-rounded img-thumbnail"
                                                    style="width:90px; max-height:90px; border-radius: 50%;">
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-md-8">
                                                <div class="form-group{{ $errors->has('favicon') ? ' has-error' : ''}}">
                                                    <label for="">Favicon</label><small class="text-danger"> (max file size
                                                        2 mb)</small>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" id="flogo"
                                                            name="favicon" onchange="readURL(this);">
                                                        <label class="custom-file-label" for="customFile">Choose file...</label>
                                                        @if($errors->has('favicon'))
                                                        <span class="error">{{ $errors->first('favicon') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center my-auto">
                                                <img src="@if($manage->favicon != '') {{asset('uploads/logo/'.$manage->favicon)}} @else{{asset('contents/admin/dist/img/avatar.png')}}@endif" id="image_upload"
                                                    alt="photo" class="img-fluid img-rounded img-thumbnail "
                                                    style="width:40px; max-height:40px; border-radius: 50%;">
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : ''}}">
                                            <label for=""> Phone </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="phone" value="{{$manage->phone}}"
                                                    placeholder="Enter phone number...">
                                            </div>
                                            @if($errors->has('phone'))
                                            <span class="error">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}} ">
                                            <label for=""> Email  </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" name="email" value="{{$manage->email}}"
                                                    placeholder="Enter email address...">
                                            </div>
                                            @if($errors->has('email'))
                                            <span class="error">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : ''}}">
                                            <label for=""> Facebook Link </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fab fa-facebook"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="facebook" value="{{$manage->facebook}}" placeholder="Enter facebook link...">
                                            </div>
                                            @if($errors->has('facebook'))
                                            <span class="error">{{ $errors->first('facebook') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('twitter') ? ' has-error' : ''}} pt-2">
                                            <label for=""> Twitter Link </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-twitter"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="twitter" value="{{$manage->twitter}}" placeholder="Enter facebook link...">
                                            </div>
                                            @if($errors->has('twitter'))
                                            <span class="error">{{ $errors->first('twitter') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('instagram') ? ' has-error' : ''}} pt-2">
                                            <label for=""> Instagram Link </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="fab fa-instagram"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="instagram" value="{{$manage->instagram}}" placeholder="Enter instagram link...">
                                            </div>
                                            @if($errors->has('instagram'))
                                            <span class="error">{{ $errors->first('instagram') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('rssfied') ? ' has-error' : ''}} pt-2">
                                            <label for=""> Rss Link </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-rss"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="rssfied" value="{{$manage->rssfied}}"
                                                    placeholder="Enter rss link...">
                                            </div>
                                            @if($errors->has('rssfied'))
                                            <span class="error">{{ $errors->first('rssfied') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="2" placeholder="Your Address" name="address">{{$manage->address}}</textarea>
                                        </div>
                                        <div class="form-group{{ $errors->has('copyright') ? ' has-error' : ''}}">
                                            <label for=""> Copy Right text <small class="text-success text-bold">(You can include html tags and attribute in this field)</small></label>
                                            <textarea name="copyright" id="" class="form-control"  placeholder="Enter copyright text" rows="2">{{$manage->copyright}}</textarea>
                                            @if($errors->has('copyright'))
                                            <span class="error">{{ $errors->first('copyright') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Footer About </label>
                                            <textarea class="form-control" rows="4" placeholder="Enter footer about..."
                                                name="footer_about">{{$manage->footer_about}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger text-bold text-uppercase">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">

        <div class="row">
            <div class="col-12">
                <input type="file" multiple id="gallery-photo-add">
            <div class="gallery" ></div>

            <input type="file" multiple id="gallery-photo-add2">
            <div  class="gallery2" style="height: 100px; width: 100px;"></div>
            
            
            </div>
        </div>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>

        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
            $('#gallery-photo-add2').on('change', function() {
                imagesPreview(this, 'div.gallery2');
                
            });
        });
            </script>
</div> --}}
@endsection