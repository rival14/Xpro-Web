@extends('includes.wrapper')
@section('title', 'Detail Team')
@section('meta-desc', $team->meta_desc)
@section('meta-keyword', $team->meta_kword)
@section('content')

<!-- Page Title START -->
{{-- Default 1730 x 300 --}}
<div class="page-title-section" style="background-image: url('{{ url('storage/' . $slide->slide) }}');">
  <div class="container">
    <h1>{{ $slide->title }}</h1>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('about-us') }}">About Us</a></li>
    </ul>
  </div>
</div>
<!-- Page Title END -->

<!-- Team Member Section START -->
<div class="section-block">
  <div class="container">
    <div class="team-single">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-12">
          <div class="team-single-img">
            <img src="{{ url('storage/' . $team->photo) }}" alt="img">
          </div>
        </div>

        <!-- Personal Info START -->
        <div class="col-md-8 col-sm-8 col-12">
          <div class="team-single-text">
            <span>{{ $team->job_title }}</span>
            <h4>{{ $team->name }}</h4>
            <ul class="team-single-info">
              <li><strong>Phone</strong><span>{{ $team->phone }}</span></li>
              <li><strong>E-mail</strong><span>{{ $team->email }}</span></li>
            </ul>
            <div class="text-content mt-20">
              <p>{!! $team->desc !!}</p>
            </div>

            <ul class="team-single-social">
              <li><a href="{{ url('https://' . $team->fb) }}"><i class="fa fa-facebook-square"></i></a></li>
              <li><a href="{{ url('https://' . $team->ig) }}"><i class="fa fa-instagram"></i></a></li>
              <li><a href="{{ url('https://' . $team->skype) }}"><i class="fa fa-skype"></i></a></li>
              <li><a href="{{ url('https://' . $team->linkedin) }}"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- Personal Info END -->

        <!-- Skills START -->
        <div class="col-md-6 col-sm-6 col-12">
          <div class="section-heading mt-40">
            <h6>Activities And Skills</h6>
            <div class="section-heading-line-left"></div>
          </div>
          <ul class="primary-list mt-40">
            @php
              $activity = explode(',', $team->active_desc);
            @endphp
            @foreach ($activity as $key => $item)
              <li><i class="fa fa-check"></i>{{ $item }}</li>
            @endforeach
          </ul>
        </div>

        <div class="col-md-6 col-sm-6 col-12">
          <div class="section-heading mt-40">
            <h6>Professional Skills</h6>
            <div class="section-heading-line-left"></div>
          </div>
          <!-- PROGRESS BARS Start -->
          <div class="mt-40">
            @foreach ($skills as $skill)
              <!-- Progress Bar Start -->
              <div class="progress-text">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-6">
                    {{ $skill->skill_name }}
                  </div>
                  <div class="col-md-6 col-sm-6 col-6 text-right">
                    {{ $skill->skill_percentage }}%
                  </div>
                </div>
              </div>
              <div class="progress custom-progress">
                <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="10"
                  aria-valuemin="0" aria-valuemax="100" style="width:{{ $skill->skill_percentage }}%">
                </div>
              </div>
              <!-- Progress Bar End -->
            @endforeach
          </div>
          <!-- PROGRESS BARS End -->
        </div>
        <!-- Skills END -->
      </div>
    </div>
  </div>
</div>
<!-- Team Member Section END -->

<!-- Clients Carousel START -->
<div class="section-clients border-top">
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