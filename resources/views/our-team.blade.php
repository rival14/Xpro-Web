@extends('includes.wrapper')
<style>
  .ellipsis {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
  }
</style>
@section('title', 'Our Team')
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
            <img src="{{ url('storage/' . $team->photo) }}" alt="img" width="100%">
          </div>
          <div class="team-member-text">
            <h4><a href="{{ url('team/' . $team->id) }}">{{ $team->name }}</a></h4>
            <span>{{ $team->job_title }}</span>
            <div class="ellipsis">{!! $team->desc !!}</div>

            <ul>
              <li><a href="{{ $team->fb }}" _target="blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="{{ $team->ig }}" _target="blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="{{ $team->linkedin }}" _target="blank"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="{{ $team->skype }}" _target="blank"><i class="fa fa-skype"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Team Members END -->

@endsection