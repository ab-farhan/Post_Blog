<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Blog Site || Dainamic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('uploads/logo/'.$manages->favicon)}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('contents/website')}}../../css.css?family=Muli:300,400,700|Playfair+Display:400,700,900">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/aos.css">
    @yield('style')
    <link rel="stylesheet" href="{{asset('contents/website')}}/assets/css/style.css">

    <script src="{{asset('contents/website')}}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar" role="banner">
            <div class="container-fluid">
                <div class="row align-items-center">

                    <div class="col-12 search-form-wrap js-search-form">
                        <form method="get" action="#">
                            <input type="text" id="s" class="form-control" placeholder="Search...">
                            <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                        </form>
                    </div>

                    <div class="col-4 site-logo my-2">
                        <a href="{{route('website.home')}}" class="text-black h2 mb-0 ml-lg-5 pl-lg-4">
                            <img src="@if($manages->header_logo != '' || $manages->header_logo == "image"){{asset('uploads/logo/'.$manages->header_logo)}}@else {{asset('contents/admin/dist/img/avatar.png')}} @endif" alt="" class="img-fluid" style="max-width: 300px; max-height: 80px;">
                        </a>
                    </div>

                    <div class="col-8 text-right">
                        <nav class="navbar navbar-expand-lg navbar-light mr-lg-5 pr-lg-4">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('website.home')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('website.about')}}">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('website.allpost')}}">Posts</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Categories
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach ($categoriess as $category)
                                            @php
                                            $post_count=App\Models\Post::where('post_status',1)->where('category_id',$category->id)->count();
                                            @endphp
                                            <div class="dropdown-divider"></div>
                                            <a href="{{route('website.category',['slug'=>$category->category_slug])}}"
                                                class="dropdown-item text-capitalize">{{$category->category_name}} <span
                                                    style="font-size: 14px;" class="text-primary">({{$post_count}})</span></a>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('website.contact')}}">Contact</a>
                                    </li>
                                    </div>
                                </nav> 
                            </div>
                    </div>

                </div>
        </header>

        
        @yield('content')
    

        <div class="site-footer">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <h3 class="footer-heading mb-4">About Us</h3>
                        <p>{{$manages->footer_about}}</p>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <!-- <h3 class="footer-heading mb-4">Navigation</h3> -->
                        <ul class="list-unstyled float-left mr-5">
                            <li><a href="{{route('website.home')}}">Home</a></li>
                            <li><a href="{{route('website.about')}}">About Us</a></li>
                            <li><a href="{{route('website.allpost')}}">Posts</a></li>
                            <li><a href="{{route('website.contact')}}">Contact</a></li>
                           
                        </ul>
                        <ul class="list-unstyled float-left">
                            @php
                                $category5=App\Models\Category::latest()->take(5)->get()
                            @endphp
                            @foreach ($category5 as $data)
                            <li><a href="{{route('website.category',['slug'=>$data->category_slug])}}" class="text-capitalize">{{$data->category_name}}</a></li>
                            @endforeach
                            
                            
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h3 class="footer-heading mb-4">Connect With Us</h3>
                            <p>
                                <a target="_blank" href="{{$manages->facebook}}" ><span class="fa fa-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                <a href="{{ $manages->twitter }}" target="_blank"><span class="fa fa-twitter p-2"></span></a>
                                <a href="{{ $manages->instagram }}" target="_blank"><span class="fa fa-instagram p-2"></span></a>
                                <a href="{{ $manages->rssfied }}" target="_blank"><span class="fa fa-rss p-2"></span></a>
                                <a href="{{ $manages->email }}" target="_blank"><span class="fa fa-envelope p-2"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center ">
                        <p class="text-white text-capitalize">
                             {!!$manages->copyright!!}
                            {{-- Copyright &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> </i> All rights reserved | This template is made with <i
                                class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="#"
                                target="_blank">Ab Farhan</a> --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <script src="{{asset('contents/website')}}/assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/jquery-ui.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/bootstrap.min.js"></script>
    {{-- <script src="{{asset('contents/website')}}/assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/jquery.stellar.min.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/jquery.countdown.min.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('contents/website')}}/assets/js/aos.js"></script>--}}
    @yield('script')
    <script src="{{asset('contents/website')}}/assets/js/main.js"></script>
    


</body>

</html>