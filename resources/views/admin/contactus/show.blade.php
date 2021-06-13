@extends('layouts.admin')
@section('content')
        <!-- Content Header  -->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6 pl-0">
                  <h1 class="m-0 text-dark">View Contact</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('contactus.index')}}">All Contact</a></li>
                    <li class="breadcrumb-item active">view contact</li>
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
                        <h4 class=" text-uppercase  mb-0"> <i class="fab fa-foursquare"></i> View Contact</h4>
                        <a href="{{route('contactus.index')}}" class="btn btn-danger btn-sm text-uppercase"><i class="fa fa-th"></i> Contact List</a>
                    </div>
                  </div>
                  <div class="card-body px-5">
                      <table class="table view_table table-bordered">
                        
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$contactus->name}}</td>
                            </tr>
                            <tr>
                                <td> Email</td>
                                <td>:</td>
                                <td>{{$contactus->email}}</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>:</td>
                                <td>{{$contactus->subject}}</td>
                            </tr>
                            
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{{$contactus->message}} </td>
                            </tr>
                            <tr>
                                <td>Send At</td>
                                <td>:</td>
                                <td>{{$contactus->created_at->format('d F Y | h:i:s a')}}</td>
                            </tr>
                      </table>
                  </div>
                  
                </div>
              </div>
          </div>
        </div>
@endsection

