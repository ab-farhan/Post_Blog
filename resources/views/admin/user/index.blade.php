@extends('layouts.admin')
@section('content')
    <!-- Content Header  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 pl-0">
            <h1 class="m-0 text-dark">User List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">user </li>
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
                <h5 class=" text-uppercase text-bold"> <i class="fab fa-foursquare" style="font-size:16px;"></i> All User List</h5>
               
                <a href="{{url('dashboard/user/create')}}" class="btn btn-sm btn-danger text-uppercase"><i class="fa fa-plus-circle"></i> Create User</a>
                
            </div>
          </div>
      <!-- /.card-header -->
        <div class="card-body p-0">
        
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">No.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email </th>
                <th style="">Action</th>
              </tr>
            </thead>
            <tbody>
            @php
              for($x=0; $x<=0;$x++)
            @endphp
            @if($users->count()!= 0)
            @foreach($users as $data)
              <tr>
                <td>{{$x++}}</td>
                <td>
                  @if (($data->image != "image") && ($data->image !=''))
                  <img src="{{asset('uploads/user/'.$data->image)}}" alt="Image" class="img-fluid img-rounded" style="height: 40px;width: 40px;">
                  @else
                  <img src="{{asset('contents/admin/dist/img/avatar.png')}}" alt="No Image" class="img-fluid img-rounded" style="height: 40px;width: 40px;">
                  @endif
                  
                
                </td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                
                <td class="">
                <a href="{{route('user.show',[$data->id])}}" class="text-success float-left" title="View"><i class="fas fa-plus-square"></i></a> 
                <a href="{{route('user.edit',[$data->id])}}" class="text-info mx-2 float-left" title="Edit"><i class="fas fa-edit"></i></a> 

                <form action="{{route('user.destroy',[$data->id])}}" method="POST" class="float-left">
                @csrf 
                @method('DELETE')
                <button type="submit" class="text-danger btn" title="Delete" style="border:none;padding: 0px 0px;background-color:transparent;"><i class="fas fa-trash"></i></button>
                </form>
                {{-- <a href="{{route('user.destroy',[$data->id])}}" class="text-danger" title="Delete"><i class="fas fa-trash"></i></a>  --}}
                </td>
              </tr>
              @endforeach
              @else
                <tr>
                  <td colspan="5" class="text-center text-bold text-danger">No user Found.</td>
                </tr>
              
              @endif
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        
    </div>
          </div>
          <div class="  mx-auto">
            {{$users->links('pagination::bootstrap-4')}}
          </div>
       
      </div>
    </div>
   
@endsection