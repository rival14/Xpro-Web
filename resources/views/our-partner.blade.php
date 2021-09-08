@extends('includes.wrapper')
@section('title', 'Our Client')
@section('meta-desc', $config->meta_desc)
@section('meta-keyword', $config->meta_kword)
@section('content')

<!-- Page Title START -->
{{-- Default 1730 x 300 --}}
<div class="page-title-section" style="background-image: url('{{ url('storage/' . $slide->slide ?? '') }}');">
  <div class="container">
    <h1>{{ $slide->title }}</h1>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('about-us') }}">About</a></li>
    </ul>
  </div>
</div>
<!-- Page Title END -->

<!-- Testmonials START -->
<div class="section-block-grey">
  <div class="container">
    <div class="section-heading center-holder">
      <span>Our Clients</span>
      <h4>What Our Clients Say</h4>
      <div class="section-heading-line"></div>
    </div>
    <div class="row mt-50">

      @foreach ($testimonies as $testi)
        <div class="col-md-6 col-sm-6 col-12">
          <div class="partner-box">
            <div class="row">
              <div class="col-md-6 col-sm-12 col-12">
                <div class="partner-img" style="height: 355px;overflow:hidden;display: flex; align-items: center;">
                  <img src="{{ url('storage/' . $testi->pict) }}" alt="partner" class="img-fluid">
                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-12">
                <div class="partner-text">
                  <span>{{ $testi->job_title }}</span>
                  <h4>{{ $testi->name_testi }}</h4>
                  <p>{{ $testi->testimony }}</p>
                </div>
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