@php
  $logo = DB::table('config_homes')->select('logo', 'logo_transparent')->first();
@endphp
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>@yield('title', 'Xpro Company Profile')</title>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="{{ url('storage/' . $logo->logo) }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="@yield('meta-desc', 'Company Profile')">
  <meta name="keywords" content="@yield('meta-keyword', 'Software Development')">
  <meta name="google-site-verification" content="laxCB6fXBX1XGqybH4YLAo3piVbAZMHGRNr-fu8RqpQ" />
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

  <!-- Font-Awesome -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">

  <!-- Icomoon -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/icomoon.css') }}">

  <!-- Slider -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/rev-settings.css') }}">

  <!-- Animate.css -->
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

  <!-- Color Switcher -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/switcher.css') }}">

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">

  <!-- Main Styles -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" id="colors">

  <!-- Fonts Google -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-2EYDE4NFF1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-2EYDE4NFF1');
  </script>

</head>

<body>


  <!-- Preloader Start-->
  <div id="preloader">
    <div class="row loader">
      <div class="loader-icon"></div>
    </div>
  </div>
  <!-- Preloader End -->


  <!-- Top-Bar START -->
  {{-- <div id="top-bar" class="hidden-sm-down">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-12">
          <div class="top-bar-welcome">
            <ul>
              <li>Welcome to Professional Consulting Agency</li>
            </ul>
          </div>
          <div class="top-bar-info">
            <ul>
              <li><i class="fa fa-phone"></i>(+123) 456 7890
              <li>
              <li><i class="fa fa-envelope"></i>example@gmail.com
              <li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-12">
          <ul class="social-icons hidden-md-down">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- Top-Bar END -->


  <!-- Navbar START -->
  <header id="nav-transparent">
    <nav id="navigation4" class="container navigation">
      <div class="nav-header">
        <a class="nav-brand" href="{{ url('/') }}">
          <img src="{{ url('storage/' . $logo->logo_transparent) }}" alt="logo" class="main-logo" id="light_logo" width="150">
          <img src="{{ url('storage/' . $logo->logo) }}" class="main-logo" alt="logo" id="main_logo" width="150">
        </a>
        <div class="nav-toggle"></div>
      </div>
      <div class="nav-menus-wrapper">
        <ul class="nav-menu align-to-right">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('/about-us') }}">About</a>
            <ul class="nav-dropdown">
              <li><a href="{{ url('about-us/') }}">About Us</a></li>
              <li><a href="{{ url('our-team/') }}">Our Team</a></li>
              <li><a href="{{ url('our-partner/') }}">Our Client</a></li>
            </ul>
          </li>

          @foreach (DB::table('service_cats')->get() as $item)
            <li><a href="{{ url('service/categories/' . $item->id) }}">{{ $item->name }}</a>
              <ul class="nav-dropdown">
                {{-- @foreach (DB::table('services')->select('services.name as nama', 'sub_service_lists.*', 'services.*')->join('sub_service_lists', 'services.id',
                'sub_service_lists.service_list_id')->where('service_cat_id', $item->id)->groupBy('sub_service_lists.service_list_id')->get() as $service) --}}
                @foreach (DB::table('services')->select('services.name as nama', 'services.*')->join('service_cats', 'service_cats.id',
                'services.service_cat_id')->where('service_cat_id', $item->id)->get() as $keys => $service)
                <li>
                  <a href="{{ url('service/' . $service->id) }}">
                    {{ $service->name }}
                  </a>
                  {{-- Sub --}}
                  <ul class="nav-dropdown">
                    @foreach (DB::table('sub_service_lists')->where('service_list_id', $service->id)->get() as $sub_service)
                      <li>
                        <a href="{{ url('service/' . $service->id . '/' . $sub_service->id) }}">
                          {{ $sub_service->name }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                  {{-- End Sub --}}
                </li>
                @endforeach
              </ul>
            </li>
          @endforeach


          @php
            $name = [];
          @endphp
          {{-- @foreach (DB::table('service_cats')->get() as $item)
            <li><a href="{{ url('service/categories/' . $item->id) }}">{{ $item->name }}</a>
              <ul class="nav-dropdown">
                @foreach (DB::table('services')->join('sub_service_lists', 'services.id', 'sub_service_lists.service_list_id')->where('service_cat_id', $item->id)->get() as $keys => $service)
                <li>
                  <a href="{{ url('service/' . $service->service_list_id . '/' . $service->id) }}">
                    {{ $service->name }}
                  </a>
                </li>
                  @foreach (DB::table('sub_service_lists')->select('services.name as nama', 'sub_service_lists.*')->join('services', 'services.id', 'sub_service_lists.service_list_id')->where('service_list_id', $service->id)->get() as $list)
                  @endforeach
                @endforeach
              </ul>
            </li>
          @endforeach --}}
          <li><a href="{{ url('projects') }}">Projects</a>
            <ul class="nav-dropdown">
              @foreach (DB::table('project_cats')->get() as $project)
                <li><a href="{{ url('project/' . $project->id) }}">{{ $project->name }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="{{ url('blog') }}">Blog</a>
            <ul class="nav-dropdown">
              @foreach (DB::table('categories')->get() as $category)
                <li><a href="{{ url('blog/categories/' . $category->id) }}">{{ $category->category_name }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="#">Shop</a>
            <ul class="nav-dropdown">
              @foreach (DB::table('config_menus')->get() as $menu)
                <li><a href="{{ $menu->link }}" @if($menu->type == '_blank') target="_blank" @endif>{{ $menu->name }}</a></li>
              @endforeach
            </ul>
          </li>
          {{-- <li><a href="#">Shop</a></li> --}}
          {{-- <li><a href="#">Pages</a>
            <ul class="nav-dropdown">
              <li><a href="faq.html">FAQ 01</a></li>
              <li><a href="faq-2.html">FAQ 02</a></li>
              <li><a href="404.html">Error 404</a></li>
              <li><a href="under-construction.html">Under Construction</a></li>
            </ul>
          </li> --}}
          {{-- <li><a href="#">Elements</a>
            <ul class="nav-dropdown">
              <li><a href="feature-boxes.html">Feature Boxes</a></li>
              <li><a href="pricing-lists.html">Pricing Lists</a></li>
              <li><a href="testmonials.html">Testmonials</a></li>
              <li><a href="progress-bars.html">Progress Bars</a></li>
              <li><a href="accordions.html">Accordions</a></li>
              <li><a href="animated-tabs.html">Animated Tabs</a></li>
              <li><a href="countups.html">Countups</a></li>
              <li><a href="responsive-videos.html">Responsive Videos</a></li>
            </ul>
          </li> --}}
          <li><a href="{{ url('contact') }}">Contact</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Navbar END -->

  @yield('content')

  <!-- Footer START -->
  <footer>
    <div class="container">
      <div class="row">
        <!-- Column 1 Start -->
        <div class="col-md-4 col-sm-6 col-12">
          <h3>About Us</h3>
          <div class="mt-25">
            <img src="{{ url('storage/' . $logo->logo) }}" alt="footer-logo" width="200" style="background-color: white;padding: 10px;">
            <p class="mt-25">
              @php
                $aboutUs = DB::table('config_abouts')->select('desc_about')->first();
                echo $aboutUs->desc_about;
              @endphp
            </p>
            <div class="footer-social-icons mt-25">
              <ul>
                @foreach (DB::table('link_sosmeds')->get() as $sosmed)
                <li>
                  <a href="{{ $sosmed->link }}" style="width: auto !important; height: auto !important;" target="_blank">
                    <img src="{{ url('storage/' . $sosmed->logo) }}" alt="{{ $sosmed->name }}" width="20">
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <!-- Column 1 End -->

        <!-- Column 2 Start -->
        <div class="col-md-3 col-sm-6 col-12">
          <h3>Our Services</h3>
          <ul class="footer-list">
            @foreach (DB::table('services')->get() as $service)
              <a href="{{ url('service/' . $service->id) }}"><li>{{ $service->name }}</li></a>
            @endforeach
          </ul>
        </div>
        <!-- Column 2 End -->

        <!-- Column 3 Start -->
        <div class="col-md-3 col-sm-6 col-12">
          <h3>Recent Posts</h3>
          <div class="mt-25">
            <!-- Post Start -->
            @foreach (DB::table('blogs')->limit(3)->get() as $blog)
              <div class="footer-recent-post clearfix">
                <div class="footer-recent-post-thumb">
                  <img src="{{ url('storage/' . $blog->image) }}" alt="img" style="width: 65px; height: 65px;">
                </div>
                <div class="footer-recent-post-content">
                  <span>{{ $blog->created_at }}</span>
                  <a href="{{ url('blog/' . $blog->id) }}">{{ $blog->title }}</a>
                </div>
              </div>
            @endforeach
            <!-- Post End -->
          </div>
        </div>
        <!-- Column 3 End -->

        <!-- Column 4 Start -->
        <div class="col-md-2 col-sm-6 col-12">
          <h3>Tags</h3>
          <div class="footer-tags mt-25">
            @php
                $configuration = DB::table('config_homes')->select('tags')->first();
                $tags = explode(',', $configuration->tags);
            @endphp
            @foreach ($tags as $key => $item)
                <a href="#" style="text-transform: capitalize;">{{ $item }}</a>
            @endforeach
          </div>
        </div>
        <!-- Column 4 End -->
      </div>

      <!-- Footer Bar Start -->
      <div class="footer-bar d-flex justify-content-between">
        <p><span class="primary-color">{{ setting('site.title') }}</span> {{ setting('site.footer') }}</p>
        <a href="{{ url('sitemap.html') }}"><p>Sitemap</p> </a>
      </div>
      <!-- Footer Bar End -->
    </div>
  </footer>
  <!-- Footer END -->

  <!-- Scroll to top button Start -->
  <a href="#" class="scroll-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
  <!-- Scroll to top button End -->


  <!-- Jquery -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <!--Popper JS-->
  <script src="{{ asset('js/popper.min.js') }}"></script>

  <!-- Bootstrap JS-->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <!-- Owl Carousel-->
  <script src="{{ asset('js/owl.carousel.js') }}"></script>

  <!-- Navbar JS -->
  <script src="{{ asset('js/navigation.js') }}"></script>
  <script src="{{ asset('js/navigation.fixed.js') }}"></script>

  <!-- Wow JS -->
  <script src="{{ asset('js/wow.min.js') }}"></script>

  <!-- Countup -->
  <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('js/waypoints.min.js') }}"></script>

  <!-- Tabs -->
  <script src="{{ asset('js/tabs.min.js') }}"></script>

  <!-- Yotube Video Player -->
  <script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>

  <!-- Isotop -->
  <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>

  <!-- Modernizr -->
  <script src="{{ asset('js/modernizr.js') }}"></script>

  <!-- Switcher JS -->
  <script src="{{ asset('js/switcher.js') }}"></script>

  <!-- Google Map -->
  <script src="{{ asset('js/map.js') }}"></script>

  <!-- Chart JS -->
  <script src="{{ asset('js/Chart.bundle.js') }}"></script>
  <script src="{{ asset('js/utils.js') }}"></script>

  <!-- Revolution Slider -->
  <script src="{{ asset('js/revolution/jquery.themepunch.tools.min.js') }}"></script>
  <script src="{{ asset('js/revolution/jquery.themepunch.revolution.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.actions.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.carousel.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.kenburn.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.layeranimation.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.migration-2.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.parallax.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.navigation.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.slideanims.min.js') }}"></script>
  <script src="{{ asset('js/revolution/revolution.extension.video.min.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('js/main.js') }}"></script>

  @yield('scripts')

</body>

</html>