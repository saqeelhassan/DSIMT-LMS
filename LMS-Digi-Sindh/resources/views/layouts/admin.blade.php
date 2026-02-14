<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.partials/title-meta')

    @include('layouts.partials/head-css')

</head>

<body>

    <main>

        @include('layouts.partials/admin-sidenav')

        <!-- Page content START -->
        <div class="page-content">

            @include('layouts.partials/admin-topbar')

            @include('layouts.partials.view-as-banner')
            <div class="page-content-wrapper border">
                @yield('content')
            </div>

        </div>

    </main>

    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    @include('layouts.partials/footer-scripts')

</body>

</html>