@extends('layouts.website')
@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            <div class="col-md-4">
                @foreach ($postfirst as $first)
                <a href="{{url('post/'.$first->post_slug)}}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{asset('uploads/post/'.$first->post_image)}}');">

                    <div class="text">
                        <h2>{{$first->post_title}}</h2>
                        <span class="date">{{$first->created_at->format('F m, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach ($postmiddle as $middle)
                <a href="{{url('post/'.$middle->post_slug)}}" class="h-entry img-5 h-100 gradient"
                    style="background-image: url('{{asset('uploads/post/'.$middle->post_image)}}');">
                    <div class="text">
                        <div class="post-categories mb-3">
                            <span class="post-category bg-danger">{{$middle->category->category_name}}</span>
                        </div>
                        <h2>{{$middle->post_title}}</h2>
                        <span class="date">{{$middle->created_at->format('F m, Y')}}</span>
                    </div>
                    @endforeach
                </a>
            </div>
            <div class="col-md-4">
                @foreach ($postlast as $last)
                <a href="{{url('post/'.$last->post_slug)}}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{asset('uploads/post/'.$last->post_image)}}');">
                    <div class="text">
                        <h2>{{$first->post_title}}</h2>
                        <span class="date">{{$last->created_at->format('F m, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($recentPost as $rPost)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{url('post/'.$rPost->post_slug)}}"><img
                            src="{{asset('uploads/post/'.$rPost->post_image)}}" alt="Image"
                            class="img-fluid rounded"></a>
                    <div class="excerpt">
                        @foreach ($post_tag as $tags)
                        @if($tags->post_id == $rPost->id)
                        <span class="post-category text-white bg-secondary mb-3">{{$tags->tags->tag_name}}</span>
                        @endif
                        @endforeach
                        <h2><a href="{{url('post/'.$rPost->post_slug)}}">{{$rPost->post_title}}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left">
                                <img src="@if($rPost->users->image !='image') {{asset('uploads/user/'.$rPost->users->image)}} @else {{asset('contents/admin/dist/img/avatar.png')}} @endif"
                                    alt="Image" class="img-fluid" style="height: 40px; width: 40px">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{$rPost->users->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{$rPost->created_at->format('M d, Y')}}</span>
                        </div>
                        {{-- {!!$rPost->post_description !!} --}}
                        <p><a href="{{url('post/'.$rPost->post_slug)}}" class="btn btn-info">Read More</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="row text-center pt-5 border-top">
            <div class="col-md-12">
                {{-- <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div> --}}
                {{-- {{$recentPost->links('pagination::bootstrap-4')}} --}}
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">

        <div class="row align-items-stretch retro-layout">

            <div class="col-md-5 order-md-2">
                @foreach ($fpostfirst as $pfirst)
                <a href="{{route('website.post',['slug'=>$pfirst->post_slug])}}" class="hentry img-1 h-100 gradient"
                    style="background-image: url('{{asset('uploads/post/'.$pfirst->post_image)}}');">
                    <span class="post-category text-white bg-danger">{{$pfirst->category->category_name}}</span>
                    <div class="text">
                        <h2>{{$pfirst->post_title}}</h2>
                        <span>{{$pfirst->created_at->format('F m, Y')}}</span>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="col-md-7">
                @foreach ($fpostmiddle as $pmiddle)
                <a href="{{route('website.post',['slug'=>$middle->post_slug])}}"
                    class="hentry img-2 v-height mb30 gradient"
                    style="background-image: url('{{asset('uploads/post/'.$pmiddle->post_image)}}'); width:100%;">
                    <span class="post-category text-white bg-success">{{$pmiddle->category->category_name}}</span>
                    <div class="text text-sm">
                        <h2>{{$pmiddle->post_title}}</h2>
                        <span>{{$pmiddle->created_at->format('F m, Y')}}</span>
                    </div>
                </a>
                @endforeach
                <div class="two-col d-block d-md-flex justify-content-between">
                    @foreach ($fpostlast as $fpost)
                    <a href="{{route('website.post',['slug'=>$fpost->post_slug])}}"
                        class="hentry v-height img-2 gradient "
                        style="background-image: url('{{asset('uploads/post/'.$fpost->post_image)}}');">
                        <span class="post-category text-white bg-primary">{{$fpost->category->category_name}}</span>
                        <div class="text text-sm">
                            <h2>{{$fpost->post_title}}</h2>
                            <span>{{$pmiddle->created_at->format('F m, Y')}}</span>
                        </div>
                    </a>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
</div>


<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a
                        explicabo, ipsam nostrum.</p>
                    <form action="#" class="d-flex">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection