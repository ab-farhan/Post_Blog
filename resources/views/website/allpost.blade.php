@extends('layouts.website')
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('contents/website')}}/assets/images/img_4.jpg');">
  <div class="container">
      <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
              <div class="post-entry text-center">
                  <h1 class="">Blogs</h1>
                  <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($post as $rPost)
            <div class="col-lg-4 mb-4">
            <div class="entry2">
                <a href="{{url('post/'.$rPost->post_slug)}}"><img src="{{asset('uploads/post/'.$rPost->post_image)}}" alt="Image" class="img-fluid rounded"></a>
                <div class="excerpt">
                @foreach ($post_tag as $tags)
                    @if($tags->post_id == $rPost->id)
                    <span class="post-category text-white bg-secondary mb-3">{{$tags->tags->tag_name}}</span>
                    @endif
                @endforeach
                <h2><a href="{{url('post/'.$rPost->post_slug)}}">{{$rPost->post_title}}</a></h2>
                <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left">
                    <img src="@if($rPost->users->image !='image') {{asset('uploads/user/'.$rPost->users->image)}} @else {{asset('contents/admin/dist/img/avatar.png')}} @endif" alt="Image" class="img-fluid" style="height: 40px; width: 40px">
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
              {{$post->links('pagination::bootstrap-4')}}
            </div>
          </div>
    </div>
</div>

@endsection