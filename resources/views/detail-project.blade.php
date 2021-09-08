@extends('includes.wrapper')

@section('title', 'Detail Project')
@section('meta-desc', $project->meta_desc)
@section('meta-keyword', $project->meta_kword)
@section('content')

<!-- Page Title START -->
<div class="page-title-section" style="background-image: url('{{ url('storage/' . $slide->slide) }}');">
  <div class="container">
    <h1>{{ $slide->title }}</h1>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('projects') }}">Projects</a></li>
    </ul>
  </div>
</div>
<!-- Page Title END -->


<div class="section-block">
  <div class="container">
    <div class="project-single">
      <div class="project-single-img" style="height: 450px;overflow:hidden;display: flex; align-items: center;">
        <img src="{{ url('storage/' . $project->image) }}" class="rounded-border shadow-primary" alt="img">
      </div>

      <div class="project-single-text">
        <div class="row">
          <!-- Left Side Start -->
          <div class="col-md-8 col-sm-8 col-12">
            <h4>About Project</h4>
            {!! $project->desc !!}

            <h4>Project Features</h4>
            <ul>
              @php
                $tags = explode(',', $project->features);
              @endphp
              @foreach ($tags as $key => $item)
                <li><i class="fa fa-check"></i>{{ $item }}</li>
              @endforeach
            </ul>
          </div>
          <!-- Left Side End -->

          <!-- Right Side Start -->
          <div class="col-md-4 col-sm-4 col-12">
            <h4>Project Information</h4>
            <div class="project-single-info">
              <ul>
                <li><span>Category :</span> {{ $project->category_name }}</li>
                <li><span>Status :</span> {{ $project->status }}</li>
                <li><span>Client :</span> {{ $project->client_name }}</li>
                <li><span>Date :</span> {{ date('d-M-Y', strtotime($project->complete_date)) }}</li>
                <li><span>Tags :</span> {{ $project->meta }}</li>
              </ul>
            </div>
          </div>
          <!-- Right Side End -->
        </div>
      </div>
    </div>

    <!-- Carousel Start -->
    <div class="project-carousel">
      <h4>Related Projects</h4>
      <div class="owl-carousel owl-theme" id="project-single">

        @foreach ($related_project as $rel_project)
          <div class="project-item" style="height: 240px;overflow:hidden;display: flex; align-items: center;">
            <img src="{{ url('storage/' . $rel_project->image) }}" alt="project">
            <div class="project-item-overlay">
              <div class="project-item-content">
                <span>{{ $rel_project->category_name }}</span>
                <h6>{{ $rel_project->name }}</h6>
                <a href="{{ url('project/' . $rel_project->id) }}">View More</a>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
    <!-- Carousel End -->
  </div>
</div>


<!-- Notice Section START -->
<div class="notice-section notice-section-sm border-top">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-12">
        <div class="mt-5">
          <h6>Looking for Professional Approach and Quality Services ?</h6>
          <div class="section-heading-line-left"></div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-12">
        <div class="mt-10 right-holder-md">
          <a href="#" class="primary-button button-sm mt-15-xs">Contact Us Today</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Notice Section END -->

@endsection