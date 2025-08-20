<!DOCTYPE html>
<html lang="en">

<head>
    <title>Jakarta Process Automation</title>
    @include('layouts.partials.head')
</head>

<body>

    <!-- page wrapper start -->
    <div class="page-wrapper">

        <!-- preloader start -->
        <div id="ht-preloader"
            class="position-fixed top-0 start-0 w-100 h-100 bg-white d-flex flex-column justify-content-center align-items-center"
            style="z-index: 9999; transition: opacity 0.5s ease;">
            <div class="d-flex align-items-center">
                <div class="dot dot-left spinner-grow me-2" style="width: 1rem; height: 1rem; color: #3461FF;"
                    role="status"></div>
                <div class="dot dot-right spinner-grow ms-2" style="width: 1rem; height: 1rem; color:#3461FF;"
                    role="status"></div>
            </div>
            <Jakarta class="mt-3 fs-4 fw-semibold" style="color: #3461FF;">Jakarta Process Automation</p>
        </div>
        <!-- preloader end -->

        <!--header start-->
        @include('layouts.partials.navbar')
        <!--header end-->

        <!--body content start-->
        <div class="page-content">

            @include('section.about')

            @include('section.service')

            @include('section.product')

            @include('section.partner')

        </div>

        <!-- scroll top start -->
        <button type="button" id="scrollTopBtn"
            class="shadow position-fixed d-flex align-items-center justify-content-center"
            style="width: 50px; height: 50px; background-color: #0f266e; color: white; border: none;
           bottom: 20px; right: 20px; opacity: 0; transform: scale(0.9);
           pointer-events: none; z-index: 1000; border-radius: 50%; transition: all 0.3s ease;">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 5.293l3.646 3.647a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L8 5.293z" />
            </svg>
        </button>
        <!-- scroll top end -->

        <!--body content end-->

        <!--footer start-->
        @include('layouts.partials.footer')
        <!--footer end-->

    </div>
    <!-- page wrapper end -->

    <!-- inject js start -->
    @include('layouts.partials.foot')
    <!-- inject js end -->

    @yield('content')

</body>

</html>
