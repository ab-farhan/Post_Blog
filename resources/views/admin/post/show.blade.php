@extends('layouts.admin')
@section('content')
        <!-- Content Header  -->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6 pl-0">
                  <h1 class="m-0 text-dark">View Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('post.index')}}">All Post</a></li>
                    <li class="breadcrumb-item active">view post</li>
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
                        <h4 class=" text-uppercase  mb-0"> <i class="fab fa-foursquare"></i> View Post</h4>
                        <a href="{{route('post.index')}}" class="btn btn-danger btn-sm text-uppercase"><i class="fa fa-th"></i> Post List</a>
                    </div>
                  </div>
                  <div class="card-body px-5">
                      <table class="table view_table table-bordered">
                        <tr>
                            <td>Post Image</td>
                            <td>:</td>
                            <td>
                                @if($post->post_image != '')
                                <img src="{{asset('uploads/post/'.$post->post_image)}}" alt="" width='300' class="img-fluid">
                                @else
                                <img src="{{asset('uploads')}}/avater-noimg.png" alt="" width='300' class="img-fluid">
                                @endif
                            </td>
                        </tr>
                            <tr>
                                <td>Title</td>
                                <td>:</td>
                                <td>{{$post->post_title}}</td>
                            </tr>
                            <tr>
                                <td> Category Name</td>
                                <td>:</td>
                                <td>{{$post->category->category_name}}</td>
                            </tr>
                            <tr>
                                <td>Post Tags</td>
                                <td>:</td>
                                <td>
                                    @foreach ($post_tag as $pTag)
                                        @if ($pTag->post_id == $post->id)
                                            <span class="badge badge-danger">{{$pTag->tags->tag_name}}</span>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{!! $post->post_description !!} </td>
                            </tr>
                            <tr>
                                <td>Author Name</td>
                                <td>:</td>
                                <td>{{$post->users->name}}</td>
                            </tr>
                            <tr>
                                <td>Uploaded At</td>
                                <td>:</td>
                                <td>{{$post->created_at->format('d F Y.')}}</td>
                            </tr>
                      </table>
                  </div>
                  
                </div>
              </div>
          </div>
        </div>
@endsection

