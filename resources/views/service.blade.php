@extends('includes.wrapper')

@section('title', 'Service')
@section('meta-desc', $config->meta_desc)
@section('meta-keyword', $config->meta_kword)
@section('content')

<!-- Page Title START -->
<div class="page-title-section" style="background-image: url('{{ url('storage/' . $slide->slide) }}');">
  {{-- DEFAULT : 1730 x 300 --}}
  <div class="container">
    <h1>{{ $slide->title }}</h1>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('service') }}">Services</a></li>
    </ul>
  </div>
</div>
<!-- Page Title END -->


<!-- Service Boxes START -->
<div class="section-block">
  <div class="container">
    <div class="section-heading center-holder">
      <span>Gain a Success With Us!</span>
      <h3>Solid Solutions & Perfect Achievement</h3>
      <div class="section-heading-line"></div>
      {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et
        dolore magna aliqua.</p> --}}
    </div>
    <div class="row mt-50">
      @foreach ($services as $key => $service)
        <div class="col-md-3 col-sm-6 col-12">
          <div class="service-block">
            <img src="{{ url('storage/' . $service->image) }}" alt="service">
            <div class="clearfix">
              <div class="service-block-number">
                <h5>{{ sprintf("%02d", $key + 1) }}</h5>
              </div>
              <div class="service-block-title">
                <h4><a href="{{ url('service/' . $service->id) }}">{{ $service->name }}</a></h4>
              </div>
            </div>
            <p>{!! $service->desc !!}</p>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>
<!-- Service Boxes END -->


<!-- Counters Section START -->
<div class="section-block-parallax section-md" style="background-image: url('{{ url('storage/' . $about->banner_about) }}');">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-5 col-12">
        <div class="section-heading white-color mt-15">
          <span>Gain a Success with Us !</span>
          <h3>Get to know us better !</h3>
          <div class="section-heading-line-left"></div>
        </div>
      </div>
      <div class="col-md-7 col-sm-7 col-12">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-12">
            <div class="counter-box white-color">
              <h4 class="countup">{{ $config->finish_counter }}</h4>
              <p>Project Finished</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-12">
            <div class="counter-box white-color">
              <h4 class="countup">{{ $config->business_counter }}</h4>
              <p>Business Solutions</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-12">
            <div class="counter-box white-color">
              <h4 class="countup">{{ $config->answer_counter }}</h4>
              <p>Effective Answers</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Counters Section END -->


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
                <img src="{{ url('storage/' . $testi->pict) }}" alt="image" style="width: 60px; height: 60px;">
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
        <img src="{{ url('storage/' . $client->logo) }}" width="100%" alt="partner-image">
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Clients Carousel END -->

@endsection