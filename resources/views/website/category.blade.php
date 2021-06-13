@extends('layouts.website')
@section('content')
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3 class="text-capitalize">{{$category->category_name}}</h3>
            <p>{{$category->category_details}}</p>
          </div>
        </div>
      </div>
    </div>
    @php
    // $category_id=$category->id;
    
  @endphp
    <div class="site-section bg-white">
      <div class="container">
        <div class="row">
          @foreach ($posts as $post)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="{{route('website.post',['slug'=>$post->post_slug])}}"><img src="@if($post->post_image!=''){{asset('uploads/post/'.$post->post_image)}}@else{{asset('uploads/avater-noimg.png')}}@endif" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
                @foreach ($post_tag as $tags)
                  @if($tags->post_id == $post->id)
                  <span class="post-category text-white bg-warning mb-3">{{$tags->tags->tag_name}}</span>
                  @endif
                @endforeach
             

              <h2><a href="{{route('website.post',['slug'=>$post->post_slug])}}">{{$post->post_title}}.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="@if($post->users->image!='image'){{asset('uploads/user/'.$post->users->image)}}@else{{asset('contents/admin/dist/img/avatar.png')}}@endif" alt="Image" class="img-fluid" style="height: 30px; width: 30px;"></figure>
                <span class="d-inline-block mt-1">By <a href="#">{{$post->users->name}}</a></span>
                <span>&nbsp;-&nbsp; {{$post->created_at->format('F d, Y')}}</span>
              </div>
              
                <p>{{Str::words($post->post_description,15)}}</p>
                <p><a href="{{route('website.post',['slug'=>$post->post_slug])}}" class="btn btn-info">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            {{$posts->links('pagination::bootstrap-4')}}
          </div>
        </div>
        
    </div>
  </div>
    
@endsection