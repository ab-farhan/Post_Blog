@extends('layouts.website')
@section('content')

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('uploads/post/'.$post->post_image)}}');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
                  <span class="post-category text-white bg-success mb-3">{{$post->category->category_name}}</span>
                 
              <h1 class="mb-4"><a href="javascsipt::void(0)">{{$post->post_title}}</a></h1>
              <div class="post-meta align-items-center text-center">
                <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="@if($post->users->image !='image'){{asset('uploads/user/'.$post->users->image)}}@else{{asset('contents/admin/dist/img/avatar.png')}} @endif" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By {{$post->users->name}}</span>
                <span>&nbsp;-&nbsp; {{$post->created_at->format('F d, Y')}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            
            <div class="post-content-body">
              {!!$post->post_description!!}
            </div>

            
            <div class="pt-5">
              <p>Categories:  <a href="#">{{$post->category->category_name}}</a>  Tags: 
                @foreach ($post_tag as $tags)
                @if($tags->post_id == $post->id)
                <a href="#">#{{$tags->tags->tag_name}}</a>,
                @endif
              @endforeach
             </p>
            </div>


            <div class="pt-5">
              <h3 class="mb-5">6 Comments</h3>
              {{-- <ul class="comment-list">
                <li class="comment">
                  <div class="vcard">
                    <img src="{{asset('contents/website')}}/assets/images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>
                </li>

                <li class="comment">
                  <div class="vcard">
                    <img src="{{asset('contents/website')}}/assets/images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>

                  <ul class="children">
                    <li class="comment">
                      <div class="vcard">
                        <img src="{{asset('contents/website')}}/assets/images/person_1.jpg" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>Jean Doe</h3>
                        <div class="meta">January 9, 2018 at 2:21pm</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                        <p><a href="#" class="reply rounded">Reply</a></p>
                      </div>


                      <ul class="children">
                        <li class="comment">
                          <div class="vcard">
                            <img src="{{asset('contents/website')}}/assets/images/person_1.jpg" alt="Image placeholder">
                          </div>
                          <div class="comment-body">
                            <h3>Jean Doe</h3>
                            <div class="meta">January 9, 2018 at 2:21pm</div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                            <p><a href="#" class="reply rounded">Reply</a></p>
                          </div>

                            <ul class="children">
                              <li class="comment">
                                <div class="vcard">
                                  <img src="{{asset('contents/website')}}/assets/images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                  <h3>Jean Doe</h3>
                                  <div class="meta">January 9, 2018 at 2:21pm</div>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                  <p><a href="#" class="reply rounded">Reply</a></p>
                                </div>
                              </li>
                            </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li class="comment">
                  <div class="vcard">
                    <img src="{{asset('contents/website')}}/assets/images/person_1.jpg" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>Jean Doe</h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                    <p><a href="#" class="reply rounded">Reply</a></p>
                  </div>
                </li>
              </ul> --}}
              @comments(['model' => $post])
              
              <!-- END comment-list -->
              
              {{-- <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="#" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              </div> --}}
            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- END sidebar-box -->
            <div class="sidebar-box">
              <div class="bio text-center">
                <img src="@if($post->users->image !='image'){{asset('uploads/user/'.$post->users->image)}}@else{{asset('contents/admin/dist/img/avatar.png')}} @endif" alt="user Image" class="img-fluid mb-5">
                <div class="bio-body">
                  <h2>{{$post->users->name}}</h2>
                  <p class="mb-4">{{$post->users->description}}</p>
                  <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                  <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <!-- END sidebar-box -->  
            <div class="sidebar-box">
              <h3 class="heading">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>
                  @foreach ($random as $popular)
                  <li>
                    <a href="">
                      <img src="{{asset('uploads/post/'.$popular->post_image)}}" alt="Image placeholder" class="mr-4">
                      <div class="text">
                        <h4>{{$popular->post_title}}</h4>
                        <div class="post-meta">
                          <span class="mr-2">{{$popular->created_at->format('F m, Y')}}</span>
                        </div>
                      </div>
                    </a>
                  </li> 
                  @endforeach
              
                </ul>
              </div>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
               
                @foreach ($category as $data)
                @php
                $post_count=App\Models\Post::where('post_status',1)->where('category_id',$data->id)->count();
                @endphp
                <li><a href="#">{{$data->category_name}}<span>{{$post_count}}</span></a></li>
                @endforeach
              </ul>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
                @php
                $tagg=App\Models\Tag::all();
                @endphp
                @foreach ($tagg as $tag)
                <li><a href="#">#{{$tag->tag_name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
          <!-- END sidebar -->

        </div>
      </div>
    </section>
    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>More Related Posts</h2>
          </div>
        </div>
        <div class="row align-items-stretch retro-layout">

          <div class="col-md-5 order-md-2">
            @foreach ($fpostfirst as $pfirst)
            <a href="{{route('website.post',['slug'=>$pfirst->post_slug])}}" class="hentry img-1 h-100 gradient" style="background-image: url('{{asset('uploads/post/'.$pfirst->post_image)}}');">
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
            <a href="{{route('website.post',['slug'=>$pmiddle->post_slug])}}" class="hentry img-2 v-height mb30 gradient" style="background-image: url('{{asset('uploads/post/'.$pmiddle->post_image)}}'); width:100%;">
              <span class="post-category text-white bg-success">{{$pmiddle->category->category_name}}</span>
              <div class="text text-sm">
                <h2>{{$pmiddle->post_title}}</h2>
                <span>{{$pmiddle->created_at->format('F m, Y')}}</span>
              </div>
            </a>
            @endforeach
            <div class="two-col d-block d-md-flex justify-content-between">
              @foreach ($fpostlast as $fpost)
              <a href="{{route('website.post',['slug'=>$fpost->post_slug])}}" class="hentry v-height img-2 gradient " style="background-image: url('{{asset('uploads/post/'.$fpost->post_image)}}');">
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
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
              <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="container">
      
    </div> --}}
@endsection
    
  