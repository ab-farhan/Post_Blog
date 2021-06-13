@extends('layouts.admin')
@section('content')
    <!-- Content Header  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 pl-0">
            <h1 class="m-0 text-dark">Post List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">post </li>
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
                <h5 class=" text-uppercase text-bold"> <i class="fab fa-foursquare" style="font-size:16px;"></i> All Post List</h5>
               
                <a href="{{route('post.create')}}" class="btn btn-sm btn-danger text-uppercase"><i class="fa fa-plus-circle"></i> Create Post</a>
                
            </div>
          </div>
      <!-- /.card-header -->
        <div class="card-body p-0">
        
          <div class="table-responsive">
            <table class="table table-striped table-bordered index_table">
              <thead>
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Title</th>
                  <th>Image </th>
                  <th>Category </th>
                  <th>Tag </th>
                  <th>Description </th>
                  <th>Action</th>
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
                  <td>{{$data->post_title}}</td>
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
        <!-- /.card-body -->
        <div class=" mx-auto pb-3">
          {{$post->links('pagination::bootstrap-4')}}
        </div>
    </div>
          </div>
            
      </div>
    </div>

@endsection