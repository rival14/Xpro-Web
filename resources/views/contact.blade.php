@extends('includes.wrapper')
{!! NoCaptcha::renderJs() !!}
@section('title', 'Contact')
@section('meta-desc', $config->meta_desc)
@section('meta-keyword', $config->meta_kword)
@section('content')

<!-- Page Title START -->
<div class="page-title-section" style="background-image: url('{{ url('storage/' . $slide->slide) }}');">
  <div class="container">
    <h1>{{ $slide->title }}</h1>
    <ul>
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('contact/') }}">Contact</a></li>
    </ul>
  </div>
</div>
<!-- Page Title END -->

<!-- Contact Boxes START -->
<div class="section-block-grey">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="contact-box">
          <i class="fa fa-phone-square"></i>
          <h4>Call Us</h4>
          <span>{{ $countries[0]->phone }}</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="contact-box">
          <i class="fa fa-map"></i>
          <h4>Visit Us</h4>
          <span>{{ $countries[0]->location }}</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="contact-box">
          <i class="fa fa-envelope"></i>
          <h4>Mail Us</h4>
          <span>{{ $countries[0]->email }}</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="contact-box">
          <i class="fa fa-comments-o"></i>
          <h4>Live Chat</h4>
          <span>Chat with Us 24/7</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact Boxes END -->


<!-- Contact Form Section START -->
<div class="section-block">
  <div class="container">
    <div class="section-heading center-holder">
      <span>{{ $contact->title }}</span>
      <h3>{!! $contact->desc !!}</h3>
      <div class="section-heading-line"></div>
    </div>
    <div class="mt-50">
      <div class="contact-form-box">
        <!-- Form Start -->
        <form class="contact-form row" method="POST" action="{{ url('contact/submit') }}">
          @csrf
          <div class="col-md-6 col-sm-6 col-12">
            <input type="text" name="name" placeholder="Name" required>
          </div>
          <div class="col-md-6 col-sm-6 col-12">
            <input type="email" name="email" placeholder="E-mail" required>
          </div>

          <div class="col-md-12">
            <input type="text" name="subject" placeholder="Subject" required>
          </div>

          <div class="col-md-12">
            <textarea name="message" placeholder="Message" required></textarea>
          </div>
          <div class="col-md-12">
            {!! app('captcha')->display() !!}
            @if (Session::has('g-recaptcha-response'))
            <span class="help-block mx-auto">
              <strong>{{ Session::get('g-recaptcha-response') }}</strong>
            </span>
            @endif
          </div>
          <div class="col-md-12">
            <div class="center-holder">
              <button type="submit">Send Message</button>
            </div>
          </div>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<!-- Contact Form Section END -->

<!-- Contact Section START -->
<div class="container-fluid">
  <div class="row">
    @foreach ($countries as $country)
      <div class="col-md-4 col-sm-4 col-12 pl-0 pr-0">
        <div class="contact-country-one" style="background-image: url('{{ url('storage/' . $country->image) }}');">
          <i class="fa fa-map-signs"></i>
          <h4>{{ $country->name }}</h4>
          <ul class="contact-country">
            <li><i class="fa fa-map-marker"></i>{{ $country->address }}</li>
            <li><i class="fa fa-phone"></i>{{ $country->phone }}</li>
            <li><i class="fa fa-clock-o"></i>{{ $country->operational }}</li>
          </ul>
        </div>
      </div>
    @endforeach
  </div>
</div>
<!-- Contact Section END -->

@if (setting('site.contact_maps') == 'on')
  <!-- Map START -->
  <div id="map">
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key={{ $contact->api_key ?? 'AIzaSyBk25E4mNfVIEt3tNl3K1HwNZVruVoFBlA'}}&callback=initMap">
    </script>
  </div>
  <!-- Map START -->
@endif

@endsection