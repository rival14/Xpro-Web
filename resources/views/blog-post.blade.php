@extends('includes.wrapper')
@section('title', 'Blog Post')
@section('meta-desc', $blog->meta_desc ?? '')
@section('meta-keyword', $blog->meta_kword ?? '')
@section('content')

<!-- Page Title START -->
{{-- Default 1730 x 300 --}}
<div class="page-title-section" style="background-image: url('{{ url('storage/' . $slide->slide) }}');">
  <div class="container">
    <h1>{{ $slide->title }}</h1>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('blog') }}">List Blog</a></li>
    </ul>
  </div>
</div>
<!-- Page Title END -->

<!-- Blog Post START -->
<div class="section-block">
  <div class="container">
    <div class="row">
      <!-- Left Side START -->
      <div class="col-md-9 col-sm-8 col-12">
        <div class="blog-list-left">
          <img src="{{ url('storage/' . $blog->image) }}" alt="img" class="mx-auto">
          <div class="data-box">
            <h4>{{ date('d', strtotime($blog->created_at)) }}</h4>
            <strong>{{ date('M', strtotime($blog->created_at)) }}</strong>
          </div>
          <div class="blog-title-box">
            <h2>{{ $blog->title }}</h2>
            <span><i class="fa fa-calendar"></i>{{ date('M d, Y', strtotime($blog->created_at)) }}</span>
            <span><i class="fa fa-list-ul"></i> {{ $blog->category_name }}</span>
          </div>

          <div class="blog-post-content">
            {!! $blog->blog !!}


            {{-- <div class="blog-comments mt-50">
              <h3 class="mt-0">All Comments:</h3>
              <div class="blog-comment-user">
                <div class="row mt-20">
                  <div class="col-md-1 hidden-sm-down pr-0">
                    <img src="http://via.placeholder.com/50x50" alt="user">
                  </div>
                  <div class="col-md-11 col-12">
                    <div class="comment-block">
                      <h6>John Doe</h6><strong>07.03.2018</strong>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie
                        faucibus. Donec auctor et urnaLorem ipsum dolor
                        sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="blog-comment-user">
                <div class="row">
                  <div class="col-md-1 hidden-sm-down pr-0">
                    <img src="http://via.placeholder.com/50x50" alt="user">
                  </div>
                  <div class="col-md-11 col-12">
                    <div class="comment-block">
                      <h6>Emily Watson</h6><strong>10.03.2018</strong>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie
                        faucibus. Donec auctor et urnaLorem ipsum dolor
                        sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <h3 class="mt-30">Your Comment:</h3>
              <form class="comment-form" method="post" autocomplete="off">
                <div class="row">
                  <div class="col-6">
                    <input name="name" placeholder="Your Name">
                  </div>
                  <div class="col-6">
                    <input name="email" placeholder="E-mail adress" type="email">
                  </div>
                  <div class="col-12">
                    <textarea name="message" placeholder="Your Message"></textarea>
                  </div>
                </div>
              </form>

              <div class="mt-10 left-holder">
                <a href="#" class="primary-button button-md">Send Comment</a>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <!-- Left Side END -->

      <!-- Right Side START -->
      <div class="col-md-3 col-sm-4 col-12">
        <div class="blog-list-right">
          <div id="search-input">
            <div class="input-group">
              <form action="{{ url('blog/search') }}" method="get">
                <input type="text" class="form-control" placeholder="Search" name="search" />
              </form>
              <span class="input-group-btn">
                <button class="btn" type="button">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </span>
            </div>
          </div>

          <!-- Categories -->
          <div class="blog-list-left-heading">
            <h4>Categories</h4>
          </div>
          <div class="blog-categories">
            <ul>
              @foreach ($categories as $category)
              <li><a href="{{ url('blog/categories/' . $category->id) }}">{{ $category->category_name }}</a></li>
              @endforeach
            </ul>
          </div>

          <!-- Recent News -->
          <div class="blog-list-left-heading">
            <h4>Recent News</h4>
          </div>
          @foreach ($blogs as $blog)
          <div class="latest-posts">
            <div class="row">
              <div class="col-md-5 col-sm-5 col-4 latest-posts-img">
                <a href="{{ url('blog/' . $blog->id) }}">
                  <img src="{{ url('storage/' . $blog->image) }}" alt="blog-img" style="width: 80px; height: 80px;object-fit: contain;">
                </a>
              </div>

              <div class="col-md-7 col-sm-7 col-8 latest-posts-text pl-0">
                <a href="{{ url('blog/' . $blog->id) }}">{{ $blog->title }}</a>
                <span>{{ date('M d, Y', strtotime($blog->created_at)) }}</span>
              </div>
            </div>
          </div>
          @endforeach

          <!-- Archives -->
          <div class="blog-list-left-heading">
            <h4>Archives</h4>
          </div>
          <div class="archives">
            <ul>
              @foreach ($archives as $archive)
              <li><a href="#">{{ date('F', strtotime($archive->created_at)) }}</a> <span>{{ $archive->count }}</span></li>
              @endforeach
            </ul>
          </div>

          <!-- Tags -->
          <div class="blog-list-left-heading">
            <h4>Tags</h4>
          </div>
          <div class="mt-10">
            @php
            $tags = explode(',', $config->tags);
            @endphp
            @foreach ($tags as $key => $item)
            <a href="#" class="button-tag primary-button">{{ $item }}</a>
            @endforeach
          </div>

          <!--Share Links -->
          <div class="blog-list-left-heading">
            <h4>Share Links</h4>
          </div>
          <div class="blog-share">
            <ul>
              <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/intent/tweet?text={{ url()->current() }}"><i class="fa fa-twitter"></i></a></li>
              {{-- @php
                  $ig = DB::table('link_sosmeds')->where('name', 'Instagram')->first();
              @endphp
              <li><a href="{{ $ig->link }}"><i class="fa fa-instagram"></i></a></li>
              <li><a href="skype:xpro-group"><i class="fa fa-skype"></i></a></li> --}}
            </ul>
          </div>

        </div>
      </div>
      <!-- Right Side END -->
    </div>
  </div>
</div>
<!-- Blog Post END -->

<!-- Clients Carousel START -->
<div class="section-clients-grey border-top">
  <div class="container">
    <div class="owl-carousel owl-theme clients" id="clients">
      @foreach ($clients as $client)
      <div class="item" style="height: 75px;overflow:hidden;display: flex; align-items: center;">
        <img src="{{ url('storage/' . $client->logo) }}" alt="partner-image">
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Clients Carousel END -->

@endsection