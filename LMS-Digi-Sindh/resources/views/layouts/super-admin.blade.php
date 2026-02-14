<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials/title-meta')
    @include('layouts.partials/head-css')
</head>

<body>
    <main>
        @include('layouts.partials.super-admin-sidenav')

        <!-- Page content START (must be direct sibling of sidebar for layout) -->
        <div class="page-content">
            @include('layouts.partials.admin-topbar')
            @include('layouts.partials.view-as-banner')

            <div class="page-content-wrapper border">
                @yield('content')
            </div>
        </div>
        <!-- Page content END -->
    </main>

    @include('layouts.partials.view-as-modals')

    <div class="back-top"><i class="bi bi-arrow-up-short position-absolute top-50 start-50 translate-middle"></i></div>

    @include('layouts.partials/footer-scripts')
</body>

</html>
