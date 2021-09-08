@extends('includes.wrapper')
<style>
  .ellipsis {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
  }
  .feature-checklist {
  display: flex;
  flex-wrap: wrap;
  }
</style>
@section('title', 'About Us')
@section('meta-desc', $about->meta_desc)
@section('meta-keyword', $about->meta_kword)
@section('content')

<!-- Page Title START -->
{{-- Default 1730 x 300 --}}
<div class="page-title-section" style="background-image: url('{{ url('storage/' . $about->banner_about ?? '') }}');">
  <div class="container">
    <h1>{{ $slide->title }}</h1>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('about-us') }}">About</a></li>
    </ul>
  </div>
</div>
<!-- Page Title END -->


<!-- Info & Feature Section START -->
<div class="section-block">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ url('storage/' . $about->image_about) }}" class="" alt="">
      </div>
      <div class="col-md-6">
        <div class="pl-30-md mt-30">
          <div class="section-heading">
            <h3>{{ $about->title_about }}</h3>
          </div>
          <div class="section-heading-line-left"></div>
          <div class="text-content-big mt-20">
            <p>{{ $about->desc_about }}</p>
          </div>
          <div class="mt-20">
            <ul class="primary-list feature-checklist">
              @foreach ($services as $service)
              <li class="col-md-6"><i class="fa fa-check-circle"></i>{{ $service->name }}</li>
              @endforeach
            </ul>
          </div>
          <div class="mt-25">
            <a href="{{ url('contact') }}" class="primary-button button-sm mb-15-xs" style="margin-left: 160px !important;">Contact Us</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Feature Boxes START -->
    <div class="row mt-35">
      @foreach ($features as $feature)
        <div class="col-md-4 col-sm-4 col-12">
          <div class="feature-flex-square">
            <div class="clearfix">
              <div class="feature-flex-square-icon">
                <img src="{{ url('storage/' . $feature->icon_color) }}" alt="Icon Feature">
              </div>
              <div class="feature-flex-square-content">
                <h4><a href="#">{{ $feature->title }}</a></h4>
                <p>{!! $feature->desc !!}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
    <!-- Feature Boxes END -->
  </div>
</div>
<!-- Info & Feature Section END -->


<!-- Counters Section START -->
{{-- 1730x200 --}}
<div class="section-md mx-auto" style="background-image: url('{{ url('storage/' . $config->image_counter) }}');width: 80%;">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-5 col-12">
        <div class="section-heading white-color mt-15">
          <span style="color: black !important;">{{ $config->title_counter }}</span>
          <h3 style="color: black !important;">{{ $config->subtitle_counter }}</h3>
          <div class="section-heading-line-left"></div>
        </div>
      </div>
      <div class="col-md-7 col-sm-7 col-12">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-12">
            <div class="counter-box">
              <h4 class="countup primary-color">{{ $config->finish_counter }}</h4>
              <p>Project Finished</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-12">
            <div class="counter-box">
              <h4 class="countup primary-color">{{ $config->business_counter }}</h4>
              <p>Business Solutions</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-12">
            <div class="counter-box">
              <h4 class="countup primary-color">{{ $config->answer_counter }}</h4>
              <p>Effective Answers</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Counters Section END -->



<!-- Team Members START -->
<div class="section-block-grey">
  <div class="container">
    <div class="section-heading center-holder">
      <span>{{ $about->title_team }}</span>
      <h3>{{ $about->subtitle_team }}</h3>
      <div class="section-heading-line"></div>
      <p>{!! $about->desc_team !!}</p>
    </div>
    <div class="row mt-50">
      @foreach ($teams as $team)
        <div class="col-md-4 col-sm-6 col-12">
          <div class="team-member">
            <div class="team-member-img" style="height: 290px;overflow:hidden;display: flex; align-items: center;">
              <img src="{{ url('storage/' . $team->photo) }}" alt="img">
            </div>
            <div class="team-member-text" style="height: 250px;">
              <h4><a href="{{ url('team/' . $team->id) }}">{{ $team->name }}</a></h4>
              <span>{{ $team->job_title }}</span>
              <div class="ellipsis">{!! $team->desc !!}</div>

              <ul>
                <li><a href="{{ $team->ig }}" _target="blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ $team->fb }}" _target="blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{ $team->skype }}" _target="blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{ $team->linkedin }}" _target="blank"><i class="fa fa-skype"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Team Members END -->

<div class="section-block">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-12">
        <div class="section-heading">
          <span>{{ $about->title_active }}</span>
          <h4>{{ $about->subtitle_active }}</h4>
        </div>
        <div class="text-content-big">
          <p>{{ $about->desc_active }}</p>
        </div>
      </div>

      <div class="col-md-5 col-sm-6 col-12 offset-md-1">
        <!-- PROGRESS BARS Start -->
        <div class="mt-35">

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
            <div class="progress progress-medium">
              <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100" style="width:{{ $skill->skill_percentage }}%">
              </div>
            </div>
            <!-- Progress Bar End -->
          @endforeach
        </div>
        <!-- PROGRESS BARS End -->
      </div>
    </div>
  </div>
</div>
<!-- Progress Bars Section END -->

<!--Parallax Section START-->
<div class="section-block-parallax" style="background-image: url('{{ url('storage/' . $config->image_success) }}');">
  <div class="container">
    <div class="section-heading center-holder white-color">
      <span>{{ $config->title_success }}</span>
      <h2><strong>{{ $config->subtitle_success }}</strong></h2>
      <a href="{{ $config->link_succes }}" class="position-relative dark-button button-md mt-10">Become a Client</a>
    </div>
  </div>
</div>
<!--Parallax Section END-->


<!-- Testmonials START -->
<div class="section-block-grey">
  <div class="container">
    <div class="section-heading center-holder">
      <span>Our Testmonials</span>
      <h4>What Our Clients Say</h4>
      <div class="section-heading-line"></div>
    </div>
    <div class="row mt-50">

      @foreach ($testimonies as $testi)
        <div class="col-md-6 col-sm-6 col-12">
          <div class="testmonial-box">
            <div class="row">
              <div class="col-2 pr-0">
                <img src="{{ url('storage/' . $testi->pict) }}" alt="image" style="width: 66px; height: 66px;">
              </div>
              <div class="col-10">
                <h5>{{ $testi->name_testi }}</h5>
                <span>{{ $testi->job_title }}</span>
                <p>{{ $testi->testimony }}</p>
              </div>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>
<!-- Testmonials END -->


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