<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'Digital Sindh Institute of Management & Technology')</title>
    <meta name="description" content="@yield('description', '')" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dsimt/images/logo/logo.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dsimt/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dsimt/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('dsimt/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('dsimt/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('dsimt/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dsimt/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('dsimt/css/dsimt-custom.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    @stack('styles')
    <style>
        .whatsapp-float {
            position: fixed;
            width: 56px;
            height: 56px;
            bottom: 28px;
            left: 28px;
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 28px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 28px rgba(37, 211, 102, 0.5);
            color: #fff;
        }
    </style>
</head>
<body>
    <a href="https://api.whatsapp.com/send?phone=+923060934322&text=Hello,%2C%20I'm%20interested%20in%20learning%20more%20about%20your%20services.%20I%20will%20get%20in%20touch%20via%20your%20website" class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <i class="fa fa-whatsapp"></i>
    </a>

    @include('main-website.partials.navbar')

    @yield('content')

    @include('main-website.partials.footer')
    @include('main-website.partials.scripts')

    @stack('scripts')
</body>
</html>
