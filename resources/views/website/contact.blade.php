@extends('layouts.website')
@section('style')
<style>
    .same-height {
    padding: 3em 0 !important;
}
</style>
@endsection
@section('content')
        <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('contents/website')}}/assets/images/img_4.jpg');">
            <div class="container">
                <div class="row same-height justify-content-center">
                    <div class="col-md-12 col-lg-10">
                        <div class="post-entry text-center">
                            <h1 class="">Contact Us</h1>
                            <p class="lead mb-4 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mb-5">
                        @if (Session::has('success_mes'))
                        <script>
                            swal("Successfully!", "Send you messsage!", "success");
                        </script>
                        @endif
                        @if (Session::has('error_mes'))
                        <script>
                            swal("Opps!", "Try again!", "error");
                        </script>
                        @endif
                        <form action="{{route('contactus.create')}}" class="p-5 bg-white" method="POST" id="contactusForm">
                            @csrf
                            <div class="row form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="fname">First Name</label>
                                    <input type="text" id="fname" class="form-control" name="name" placeholder="Your Name">
                                    @if($errors->has('name'))
                                    <span class="error">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="subject">Subject</label>
                                    <input type="subject" id="subject" class="form-control" name="subject" placeholder="Your Subject">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Messages..."></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <div class="p-4 mb-3 bg-white">
                            <p class="mb-0 font-weight-bold">Address</p>
                            <p class="mb-4">{{$manages->address}}</p>
                            <p class="mb-0 font-weight-bold">Phone</p>
                            <p class="mb-4" ><a href="#" tel='+88{{$manages->phone}}'>{{$manages->phone}}</a></p>
                            <p class="mb-0 font-weight-bold">Email Address</p>
                            <p class="mb-0"><a href="#"><span >{{$manages->email}}</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
@endsection
@section('script')

<script src="{{asset('contents/admin')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('contents/admin')}}/plugins/jquery-validation/additional-methods.min.js"></script>
    <script>
        // form validation contactus
        $('#contactusForm').validate({
            rules: {
                name: 'required',
                email: 'required',
                subject: 'required',
                message: 'required',
            },
            messages: {
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
       
    </script>
@endsection