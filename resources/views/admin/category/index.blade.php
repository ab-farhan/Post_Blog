@extends('layouts.admin')
@section('content')
    <!-- Content Header  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 pl-0">
            <h1 class="m-0 text-dark">Category List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Category </li>
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
                <h5 class=" text-uppercase text-bold"> <i class="fab fa-foursquare" style="font-size:16px;"></i> All Category List</h5>
               
                <a href="{{url('dashboard/category/create')}}" class="btn btn-sm btn-danger text-uppercase"><i class="fa fa-plus-circle"></i> Create Category</a>
                
            </div>
          </div>
      <!-- /.card-header -->
        <div class="card-body p-0">
        
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No.</th>
                <th>Name</th>
                <th>Details </th>
                <th>Post Count </th>
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
            @php
            
              for($x=0; $x<=0;$x++)
            @endphp
            @if($create->count()!= 0)
            @foreach($create as $data)
                @php
                  $category_id=$data->id;
                  $post_count=App\Models\Post::where('post_status',1)->where('category_id',$category_id)->count();
                @endphp
              <tr>
                <td>{{$x++}}</td>
                <td>{{$data->category_name}}</td>
                <td>
                  {{Str::words($data->category_details,3)}}
                </td>
                <td>
                  @if($post_count<=9)
                    @if($post_count==0)
                    <span class="text-danger">0{{$post_count}}</span>
                    @else
                    0{{$post_count}}
                   @endif
                  @else
                    {{$post_count}}
                  @endif
                  
                </td>
                <td class="d-flex">
                {{-- <a href="{{route('category.show',[$data->id])}}" class="text-success" title="View"><i class="fas fa-plus-square"></i></a> --}}
                <a href="{{route('category.edit',[$data->id])}}" class="text-info mx-2" title="Edit"><i class="fas fa-edit"></i></a> 
                
                  @if($post_count == '0')
                <form action="{{route('category.destroy',[$data->id])}}" method="POST">
                @csrf 
                @method('DELETE')
                <button type="submit" class="text-danger btn" title="Delete" style="border:none;padding: 0px 0px;background-color:transparent;"><i class="fas fa-trash"></i></button>
                </form>
                @endif
                {{-- <a href="{{route('category.destroy',[$data->id])}}" class="text-danger" title="Delete"><i class="fas fa-trash"></i></a>  --}}
                </td>
              </tr>
              @endforeach
              @else
                <tr>
                  <td colspan="5" class="text-center text-bold text-danger">No Category Found.</td>
                </tr>
              
              @endif
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        
    </div>
          </div>
          <div class="  mx-auto">
            {{$create->links('pagination::bootstrap-4')}}
          </div>
       
      </div>
    </div>
   
@endsection