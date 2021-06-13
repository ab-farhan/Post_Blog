@extends('layouts.admin')
@section('content')
  @php
  $posts=App\Models\Post::where('post_status',1)->count();
  $users=App\Models\User::count();
  $post_tag=App\Models\PostTag::all();;
  $post=App\Models\Post::where('post_status',1)->latest()->take(8)->get();
  @endphp

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('website.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$users}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$posts}}</h3>
                <p>Post</p>
              </div>
              <div class="icon">
                <i class="fas fa-pen-fancy"></i>
              </div>
              <a href="{{route('post.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$categoriess->count()}}</h3>
                <p>Category</p>
              </div>
              <div class="icon">
                <i class="fas fa-tag"></i>
              </div>
              <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$Tags->count()}}</h3>

                <p>Tags</p>
              </div>
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
               <a href="{{route('tag.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> 
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
          <div class="card mt-4">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class=" text-uppercase text-bold"> <i class="fab fa-foursquare" style="font-size:16px;"></i> Recent Post List</h5>
               
                <a href="{{route('post.index')}}" class="btn btn-sm btn-danger text-uppercase"><i class="fa fa-th"></i> &nbsp; Post List</a>
                
            </div>
          </div>
      <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-bordered index_table mb-0">
              <thead>
                <tr>
                  <th style="width: 5px">No.</th>
                  <th>Title</th>
                  <th>Image </th>
                  <th>Category </th>
                  <th>Tag </th>
                  <th>Description </th>
                  <th style="width: 103px;">Action</th>
                </tr>
              </thead>
              <tbody>
              @php
                for($x=0; $x<=0;$x++)
              @endphp
              @if($post->count()!=0)
              @foreach($post as $data)
                <tr>
                  <td>{{$x++}}</td>
                  <td>{{Str::words($data->post_title,3)}}</td>
                  <td>
                    <img src="{{asset('uploads/post/'.$data->post_image)}}" alt="" width='50' class="img-fluid img-rounded">
                  </td>
                  <td>{{$data->category->category_name}}</td>
                  <td>
                    @foreach ($post_tag as $pTag)
                        @if ($pTag->post_id == $data->id)
                            <span class="badge badge-danger">{{$pTag->tags->tag_name}}</span>
                        @endif
                        
                    @endforeach
                  </td>
                  
                  <td>
                    {{Str::words($data->post_description,2)}}
                  </td>
                  <td>
                  <a href="{{route('post.show',[$data->id])}}" class="text-success btn p-0 float-left" title="View"><i class="fas fa-plus-square"></i></a>
                  <a href="{{route('post.edit',[$data->id])}}" class="text-info  mx-2 btn p-0 float-left" title="Edit"><i class="fas fa-edit"></i></a>
                  <form action="{{route('post.destroy',[$data->id])}}" method="POST" class="float-left">
                  @csrf 
                  @method('DELETE')
                  <button type="submit" class="text-danger btn" title="Delete" style="border:none;padding: 0px 0px;background-color:transparent;"><i class="fas fa-trash"></i></button>
                  </form>
                 
                  </td>
                </tr>
                @endforeach
                @else
                  <tr>
                    <td colspan="8" class="text-center text-danger text-bold"> No Post Found.</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
@endsection