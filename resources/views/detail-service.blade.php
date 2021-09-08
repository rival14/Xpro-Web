@extends('includes.wrapper')
{!! NoCaptcha::renderJs() !!}
<style>
  .pr-15-md {
    margin-bottom: 30px;
  }
</style>
@section('title', 'Service')
@section('meta-desc', $config->meta_desc)
@section('meta-keyword', $config->meta_kword)
@section('content')

<!-- Page Title START -->
@php
    $banner = DB::table('service_cats')->where('id', $services->service_cat_id ?? $service->service_cat_id)->first();
@endphp
<div class="page-title-section" style="background-image: url('{{ url('storage/' . $banner->image_bg ?? $slide->slide) }}');">
  <div class="container">
    <h1>{{ $services->name }}</h1>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('service/') }}">{{ $services->name }}</a></li>
    </ul>
  </div>
</div>
<!-- Page Title END -->


<!-- Service Single START -->
<div class="section-block">
  <div class="container">
    <div class="row">
      <!-- Left Side START -->
      <div class="col-md-3 col-sm-4 col-12">
        <div class="services-single-left-box">

          <!-- Vertical Menu START -->
          <div class="services-single-left-heading">
            <h4>All Services</h4>
          </div>
          <div class="services-single-menu mt-30">
            <ul>
              @foreach ($allservices as $service)
                <li class="services-active">
                  <a href="{{ url('service/' . $service->service_list_id . '/'. $service->id) }}">{{ $service->name }}</a>
                </li>
              @endforeach
            </ul>
          </div>
          <!-- Vertical Menu END -->

          <div class="services-single-left-heading mt-40">
            <h4>Need Help ?</h4>
          </div>
          <ul class="primary-list mt-30">
            <div class="mt-3">
              <li><i class="fa fa-globe"></i>{{ $countries[0]->address }}</li>
              <li><i class="fa fa-phone"></i>{{ $countries[0]->phone }}</li>
              <li><i class="fa fa-envelope-open"></i>{{ $countries[0]->email }}</li>
            </div>
          </ul>

          <!-- Callback START -->
          <div class="callback-box mt-30">
            <div class="services-single-left-heading">
              <h4>Request a Callback</h4>
            </div>
            <form method="POST" action="{{ url('request-callback') }}" class="callback-box-form mt-20">
              @csrf
              <input type="text" name="name" placeholder="Your Name">
              <input type="number" name="phone" placeholder="Phone Number">
              <div class="g-recaptcha" data-sitekey="6LfFdrUbAAAAAKFxggIUzMH7ZqtYuLgy7K8JRMUM"  style="transform:scale(0.75);-webkit-transform:scale(0.75);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
              @if (Session::has('g-recaptcha-response'))
              <span class="help-block mx-auto">
                <strong>{{ Session::get('g-recaptcha-response') }}</strong>
              </span>
              @endif
              <button type="submit">Request</button>
            </form>
          </div>
          <!-- Callback END -->
        </div>
      </div>
      <!-- Left Side END -->

      <!-- Right Side START -->
      <div class="col-md-9 col-sm-8 col-12">
        <div class="services-single-right">
          <div style="height: 445px;overflow:hidden;display: flex; align-items: center;">
            <img src="{{ url('storage/' . $services->image) }}" class="rounded-border mx-auto img-fluid" alt="img" style="width: 100%;">
          </div>
          <div class="text-content-big mt-20">
            <p>{!! $services->desc !!}</p>
          </div>

          {!! $services->detail !!}

          <!-- Accordions START -->
          <div class="panel-group mt-20" id="accordion" role="tablist" aria-multiselectable="true">

            {!! $services->faq !!}
            {{-- @foreach ($faqs as $faq)
              <div class="panel panel-default accordion">
                <div class="panel-heading accordion-heading" role="tab" id="headingOne">
                  <h4 class="panel-title accordion-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">
                      {{ $faq->question }}
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body accordion-body">
                    {{ $faq->answer }}
                  </div>
                </div>
              </div>
            @endforeach --}}
          </div>
          <!-- Accordions END -->

          <!-- Download Button START -->
          @if ($services->file)
            @foreach (JSON_decode($services->file) as $item)
              <a href="{{ url('storage/' . $item->download_link) }}">
                <div class="download-file-button clearfix">
                  <h5>Download Our Services file <span>(zip)</span></h5>
                  <i class="fa fa-file-word-o"></i>
                </div>
              </a>
            @endforeach
          @endif
          <!-- Download Button END -->

          <div class="section-single-heading mt-50">
            <h4>About Our Company</h4>
          </div>
          <div class="text-content-big mt-15">
            <p>{{ $about->desc_about }}</p>
          </div>

        </div>
      </div>
      <!-- Right Side END -->
    </div>
  </div>
</div>
<!-- Service Single END -->


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

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@section('scripts')
<script>
  $('.primary-list > li').prepend('<i class="fa fa-check"></i>');

  let data = JSON.parse(JSON.stringify({!! $services->chart !!}));

  let color = data.map(item => item.color);

  if ($('.chart').length > 0) {
  var $pieChart = $('.chart');
  $pieChart.each(function () {
  var $elem = $(this),
  pieChartSize = $elem.attr('data-size') || "120",
  pieChartAnimate = $elem.attr('data-animate') || "2100",
  pieChartWidth = $elem.attr('data-width') || "6",
  pieChartColor = $elem.attr('data-color') || "#2e52c2",
  pieChartTrackColor = $elem.attr('data-trackcolor') || "rgba(0,0,0,0.1)";
  $elem.find('span, i').css({
  'width': pieChartSize + 'px',
  'height': pieChartSize + 'px',
  'line-height': pieChartSize + 'px'
  });
  $elem.appear(function () {
  $elem.easyPieChart({
  size: Number(pieChartSize),
  animate: Number(pieChartAnimate),
  trackColor: pieChartTrackColor,
  lineWidth: Number(pieChartWidth),
  barColor: pieChartColor,
  scaleColor: false,
  lineCap: 'round',
  onStep: function (from, to, percent) {
  $elem.find('span.percent').text(Math.round(percent));
  }
  });
  });
  });
  }
  ;


  if ($(".chartjs-render-monitor").length !== 0) {
  var randomScalingFactor = function () {
  return Math.round(Math.random() * 100);
  };

  var config = {
  type: 'pie',
  data: {
  datasets: [{
  data: data.map(item => item.value),
  backgroundColor: data.map(item => item.color),
  label: 'Dataset 1'
  }],
  labels: data.map(item => item.label)
  },
  options: {
  responsive: true
  }
  };

  window.onload = function () {
  var ctx = document.getElementById("chart-area").getContext("2d");
  window.myPie = new Chart(ctx, config);
  };

  document.getElementById('randomizeData').addEventListener('click', function () {
  config.data.datasets.forEach(function (dataset) {
  dataset.data = dataset.data.map(function () {
  return randomScalingFactor();
  });
  });

  window.myPie.update();
  });

  var colorNames = Object.keys(window.chartColors);
  document.getElementById('addDataset').addEventListener('click', function () {
  var newDataset = {
  backgroundColor: [],
  data: [],
  label: 'New dataset ' + config.data.datasets.length,
  };

  for (var index = 0; index < config.data.labels.length; ++index) { newDataset.data.push(randomScalingFactor()); var
    colorName=colorNames[index % colorNames.length]; ; var newColor=window.chartColors[colorName];
    newDataset.backgroundColor.push(newColor); } config.data.datasets.push(newDataset); window.myPie.update(); });
    document.getElementById('removeDataset').addEventListener('click', function () { config.data.datasets.splice(0, 1);
    window.myPie.update(); }); }
</script>
@endsection

@endsection