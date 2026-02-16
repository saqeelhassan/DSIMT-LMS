<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>DSIMT - Online Education Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dsimt-assets/images/cropped-epathsala_favicon-192x192.png') }}" />
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('dsimt-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!--Custom CSS-->
    <link href="{{ asset('dsimt-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dsimt-assets/css/dsimt-theme.css') }}" rel="stylesheet" type="text/css" />
    <!--Plugin CSS-->
    <link href="{{ asset('dsimt-assets/css/plugin.css') }}" rel="stylesheet" type="text/css" />
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
  </head>
  <body class="">
    <!-- Preloader -->
    <div id="preloader">
      <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

    @include('DSIMT-Webiste.Header & Footer.header')

    @yield('content')

    @include('DSIMT-Webiste.Header & Footer.footer')

    <!-- Search form popup -->
    <form action="#" class="ct-searchForm">
      <div class="inner">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-8">
              <div class="form-group">
                <input id="cf-search-form" type="text" placeholder="Search ..." required class="form-control" />
                <button type="submit" class="ct-search-btn"><i class="fa fa-search"></i></button>
              </div>
              <div class="form-group">
                <a href="#" class="ct-searchForm-close">
                  <i class="fas fa-times"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- Search form popup end -->

    <!-- Back to top start -->
    <div id="back-to-top">
      <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- *Scripts* -->
    <script src="{{ asset('dsimt-assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('dsimt-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dsimt-assets/js/plugin.js') }}"></script>
    <script src="{{ asset('dsimt-assets/js/main.js') }}"></script>
    <script src="{{ asset('dsimt-assets/js/custom-swiper.js') }}"></script>
    <script src="{{ asset('dsimt-assets/js/custom-nav.js') }}"></script>
  </body>
</html>
