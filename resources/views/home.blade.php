@extends('includes.wrapper')
@php
    $image = '';
@endphp
<style>
  .ellipsis {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
  }
  @media (min-width:801px) {
    .feature-box-5 {
      height: 93%;
    }
  }
  .feature-box-5:hover img {
    content: url("{{ url('storage/' . $image) }}");
  }
  .feature-checklist {
    display: flex;
    flex-wrap: wrap;
  }
</style>
@section('title', 'Home')
@section('meta-desc', $config->meta_desc)
@section('meta-keyword', $config->meta_kword)
@section('content')

<!-- Start revolution slider -->
<div class="rev-slider-long">
  <div class="rev_slider_wrapper fs-slider-wrap">
    <div id="rev_slider" class="rev_slider">
      <ul>
        @foreach ($slides as $slide)
          <!-- Slide 1 -->
          <li data-delay="5000" data-transition="slidingoverlayleft" data-slotamount="7" data-masterspeed="2500"
            data-fsmasterspeed="1000" class="bg-black">

            <!-- Main image-->
            <img src="{{ url('storage/' . $slide->slide) }}" alt="" data-bgposition="top left" data-bgfit="cover"
              data-bgrepeat="no-repeat" class="rev-slidebg">

            <!-- Layer 1 -->
            <div class="slide-title tp-caption tp-resizeme text-center text-lg-left"
              data-x="['left','left','center','center']" data-hoffset="['35','35','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-145','-145', '-150', '-350']"
              data-fontsize="['65','65', '60', '125']" data-fontweight="700" data-lineheight="['70','70', '70', '135']"
              data-width="['1200','991','650']" data-height="none" data-color="#fff" data-whitespace="normal"
              data-transform_idle="o:1;"
              data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
              data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
              data-frames='[{"delay":0,"speed":4500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
              data-start="500" data-responsive_offset="on" data-elementdelay="0.05">{!! $slide->title !!}
            </div>

            <!-- Layer 2 -->
            <div class="tp-caption rev-btn tp-resizeme slider-btn primary-button no-rounded" id="slide-1081-layer-14"
              data-x="['left','left','center','center']" data-hoffset="['35','35','0','0']"
              data-y="['middle','middle','middle','middle']" data-voffset="['-15','-15','0','0']"
              data-fontsize="['15','15','15','15']" data-fontweight="500" data-lineheight="['50','50','50','50']"
              data-width="['200','200','200','200']" data-height="none" data-whitespace="nowrap" data-start="1500"
              data-type="button"
              data-actions='[{"event":"click","action":"scrollbelow","offset":"-70px","delay":"","speed":"2500","ease":"Power1.easeInOut"}]'
              data-responsive_offset="on" data-splitin="none" data-splitout="none"
              data-frames='[{"delay":1100,"speed":1000,"frame":"0","from":"y:50px;opacity:0;fb:10px;fbr:100;","to":"o:1;fb:0;fbr:100;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;fbr:110%;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
              data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
              data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="">
              <a href="{{ $slide->link }}">Learn
              More</a>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
<!-- End revolution slider -->

<!--Features START-->
<div class="features-slider">
  <div class="container">
    <div class="row mx-auto">
      @foreach ($feature as $key => $item)
      @php
          $image = $item->icon;
      @endphp
        <div class="col-sm-10 col-md-8 col-lg-4 mx-auto">
          {{-- add emphasised class for red backgroud hover --}}
          <div class="feature-box-5"
          onmouseover="console.log($('.iconn{{ $key }}')[0].setAttribute('src', '{{ url('storage/' . $item->icon) }}'))"
          onmouseout="console.log($('.iconn{{ $key }}')[0].setAttribute('src', '{{ url('storage/' . $item->icon_color) }}'))">
            <img src="{{ url('storage/' . $item->icon_color) }}" alt="icon" class="img-fluid iconn{{$key}}" width="60" height="60">
            <h4>{{ $item->title }}</h4>
            <p>{{ $item->desc }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<!--Features END-->

<!--Info Section START-->
<div class="section-block pb-0">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ url('storage/' . $config->image_homedesc) }}" class="" alt="">
      </div>
      <div class="col-md-6">
        <div class="pl-30-md mt-30">
          <div class="section-heading">
            <h3>{{ $config->title_homedesc }}</h3>
          </div>
          <div class="section-heading-line-left"></div>
          <div class="text-content-big mt-20">
            <p>{{ $config->home_desc }}</p>
          </div>
          <div class="mt-20">
            <ul class="primary-list feature-checklist">
              @foreach ($services as $service)
                <li class="col-md-6"><i class="fa fa-check-circle"></i>{{ $service->name }}</li>
              @endforeach
            </ul>
          </div>
          <div class="mt-25 d-flex">
            <a href="{{ url('contact') }}" class="primary-button button-sm mb-15-xs" style="margin-left: 160px !important;">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Info Section END-->

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

<!--Countup Section START-->
<div class="section-block-grey py-0">
  <div class="container section-block-bg"
    style="background-image: url('{{ url('storage/' . $config->image_counter )}}'); background-size: 800px">
    <div class="section-heading text-center">
      <h5 class="">{{ $config->title_counter }}</h5>
      <h2 class="mb-0">{{ $config->subtitle_counter }}</h2>
      <div class="row mt-40">
        <div class="col-md-4">
          <div class="counter-box disable-line">
            <h2 class="countup primary-color">{{ $config->finish_counter }}</h2>
            <p class="pt-0">Projects Finished</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="counter-box disable-line">
            <h2 class="countup primary-color">{{ $config->business_counter }}</h2>
            <p class="pt-0">Business Solutions</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="counter-box disable-line">
            <h2 class="countup primary-color">{{ $config->answer_counter }}</h2>
            <p class="pt-0">Effective Answers</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Countup Section END-->

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

<!--FAQ and About Section START-->
<div class="section-block-grey">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-12">
        <div class="section-heading">
          <h4>About Us</h4>
          <div class="section-heading-line-left"></div>
        </div>
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
        <div class="mt-25 d-flex">
          <a href="{{ url('contact') }}" class="primary-button button-sm mb-15-xs"
            style="margin-left: 160px !important;">Contact Us</a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-12">
        <div class="section-heading">
          <h4>FAQ</h4>
          <div class="section-heading-line-left"></div>
        </div>
        <!-- Accordions START -->
        <div class="accordion border-bottom-0" id="accordion" role="tablist" aria-multiselectable="true">
          @foreach ($faqs as $key => $faq)
            <div class="panel panel-default accordion">
              <div class="panel-heading accordion-heading" role="tab" id="heading{{ $key }}">
                <h4 class="panel-title accordion-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $key }}"
                    aria-expanded="true" aria-controls="collapse{{ $key }}">
                    {{ $faq->question }}
                  </a>
                </h4>
              </div>
              <div id="collapse{{ $key }}" class="collapse @if($key == 0) show @endif" role="tabpanel" aria-labelledby="heading{{ $key }}">
                <div class="panel-body accordion-body">
                  {{ $faq->answer }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!-- Accordions END -->
      </div>
    </div>
  </div>
</div>
<!--FAQ and About Section END-->

<!-- Newsletter START -->
<div class="section-block-parallax" style="background-image: url('{{ url('storage/' . $config->image_success) }}');">
  <div class="container">
    <div class="section-heading center-holder white-color">
      <h2>Stay <strong>informed</strong></h2>
      <div class="section-heading-line"></div>
      <p>{{ $config->subscribe_text }}</p>
    </div>
    <div class="mt-30 center-holder">
      <!-- Newsletter Form START -->
      <form class="newsletter-form" method="post" action="{{ url('subscribe') }}">
        @csrf
        <input type="email" name="email" placeholder="Enter Your Email adress" required>
        <button type="submit">Subscribe</button>
      </form>
      <!-- Newsletter Form END -->
    </div>
  </div>
</div>
<!-- Newsletter END -->

<!--Blog Grid START-->
<div class="section-block">
  <div class="container">
    <div class="section-heading">
      <h4>Blog</h4>
      <div class="section-heading-line-left"></div>
    </div>

    <div class="row mt-20">
      @foreach ($blogs as $blog)
        <div class="col-lg-6 col-md-6 col-12">
          <div class="blog-box">
            <div class="blog-box-img" style="height: 530px;overflow:hidden;display: flex; align-items: center;">
              <img src="{{ url('storage/' . $blog->image) }}" alt="img">
            </div>
            <div class="blog-box-text">
              <div class="blog-box-date">
                <h4>{{ date('d', strtotime($blog->created_at)) }}</h4>
                <h5>{{ date('M', strtotime($blog->created_at)) }}</h5>
              </div>
              @php
                $tags = explode(',', $blog->tags);
              @endphp
                <h6>
                  @foreach ($tags as $key => $item)
                    {{ $item }}
                    @if (count($tags) - 1 != $key)
                      ,
                    @endif
                  @endforeach
                </h6>
              <a href="#">
                <h4>{{ $blog->title }}</h4>
              </a>
              <div class="ellipsis">{!! $blog->blog !!}</div>
              <div class="pricing-box-1-button">
                <a href="{{ url('blog/' . $blog->id) }}">Read More</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<!--Blog Grid END-->

<!-- Notice Section START -->
<div class="notice-section-grey notice-section-sm">
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
          <a href="{{ url('contact') }}" class="primary-button button-sm mt-15-xs">Contact Us Today</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Notice Section END -->

@endsection