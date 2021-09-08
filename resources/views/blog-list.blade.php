@extends('includes.wrapper')
<style>
  .ellipsis {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    height: 75px;
    -webkit-box-orient: vertical;
  }
</style>
@section('title', 'Blog List')
@section('meta-desc', $config->meta_desc)
@section('meta-keyword', $config->meta_kword)
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

<!-- Blog Grid START -->
<div class="section-block">
  <div class="container">
    <div class="row">
      <!-- Left Side START -->
      <div class="col-md-9 col-sm-8 col-12 pr-30-md">
        <div class="row">

          @foreach ($blogs as $blog)
            <div class="col-md-6 col-sm-12 col-12">
              <div class="blog-grid">
                <div class="blog-grid-img" style="height: 245px;overflow:hidden;display: flex; align-items: center;">
                  <img src="{{ url('storage/' . $blog->image) }}" alt="img" style="width: 100%;">
                  <div class="data-box-grid">
                    <h4>{{ date('d', strtotime($blog->created_at)) }}</h4>
                    <p>{{ date('M', strtotime($blog->created_at)) }}</p>
                  </div>
                </div>
                <div class="blog-grid-text">
                  <span>{{ $blog->category_name }}</span>
                  <h4>{{ $blog->title }}</h4>
                  <ul>
                    <li><i class="fa fa-calendar"></i>{{ date('M d, Y', strtotime($blog->created_at)) }}</li>
                    <li><i class="fa fa-list-ul"></i>{{ $blog->category_name }}</li>
                  </ul>
                  <div class="ellipsis">{!! $blog->blog !!}</div>

                  <div class="mt-20 left-holder">
                    <a href="{{ url('blog/' . $blog->id) }}" class="primary-button button-sm">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

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
                    <img src="{{ url('storage/' . $blog->image) }}" alt="blog-img" style="width: 80px;height: 80px;">
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
<!-- Blog Grid END -->

<!-- Clients Carousel START -->
<div class="section-clients-grey border-top">
  <div class="container">
    <div class="owl-carousel owl-theme clients" id="clients">
      @foreach ($clients as $client)
      <div class="item" style="height: 75px;overflow:hidden;display: flex; align-items: center;">
        <img src="{{ url('storage/' . $client->logo) }}" width="100%" alt="partner-image">
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Clients Carousel END -->

@endsection