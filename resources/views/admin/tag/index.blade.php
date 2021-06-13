@extends('layouts.admin')
@section('content')
    <!-- Content Header  -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 pl-0">
            <h1 class="m-0 text-dark">Tag List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Tag </li>
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
                <h5 class=" text-uppercase text-bold"> <i class="fab fa-foursquare" style="font-size:16px;"></i> All Tag List</h5>
               
                <a href="{{route('tag.create')}}" class="btn btn-sm btn-danger text-uppercase"><i class="fa fa-plus-circle"></i> Create Tag</a>
                
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
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
            @php
              for($x=0; $x<=0;$x++)
            @endphp
            @if($tag->count()!=0)
            @foreach($tag as $data)
              <tr>
                <td>{{$x++}}</td>
                <td>{{$data->tag_name}}</td>
                <td>
                  {{Str::words($data->tag_details,4)}}
                </td>
                <td class="d-flex">
                {{-- <a href="{{route('tag.show',[$data->id])}}" class="text-success" title="View"><i class="fas fa-plus-square"></i></a> --}}
                <a href="{{route('tag.edit',[$data->id])}}" class="text-info mx-2" title="Edit"><i class="fas fa-edit"></i></a>
                <form action="{{route('tag.destroy',[$data->id])}}" method="POST">
                @csrf 
                @method('DELETE')
                <button type="submit" class="text-danger btn" title="Delete" style="border:none;padding: 0px 0px;background-color:transparent;"><i class="fas fa-trash"></i></button>
                </form>
               
                </td>
              </tr>
              @endforeach
              @else
                <tr>
                  <td colspan="4" class="text-center text-danger text-bold"> No Tag Found.</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
    </div>
          </div>
            <div class="mx-auto mb-3">
              {{$tag->links('pagination::bootstrap-4')}}
            </div>
      </div>
    </div>

@endsection