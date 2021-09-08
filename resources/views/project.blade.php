@extends('includes.wrapper')

@section('title', 'Project')
@section('meta-desc', $config->meta_desc)
@section('meta-keyword', $config->meta_kword)
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


<!-- Projects Mansory START -->
<div class="section-block">
  <div class="container">
    <div class="section-heading">
      <h4>Latest Projects</h4>
      <div class="section-heading-line-left"></div>
    </div>
    <div class="row mt-30">
      <div class="masonry-4">
        @foreach ($projects as $project)
        <a href="{{ url('project/' . $project->project_cat_id . '/' . $project->id) }}">
          <div class="masonry-item">
            <img src="{{ url('storage/' . $project->image) }}" alt="project">
            <div class="masonry-item-overlay">
              <h4>{{ $project->name }}</h4>
              <ul>
                <li>{{ $project->category_name }}</li>
              </ul>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
<!-- Projects Mansory END -->


<!-- Clients Carousel START -->
<div class="section-clients border-top">
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