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
        <div id="ht-preloader">
            <div class="loader clear-loader">
                <span></span>
                {{-- <p class="text-success">Jakarta Process Automation</p> --}}
            </div>
        </div>
        <!-- preloader end -->

        <!--header start-->
        @include('layouts.partials.navbar')
        <!--header end-->

        <!--body content start-->
        <div class="page-content">

            @include('section.about')

            @include('section.service')

            @include('section.partner')

        </div>
        <!--body content end-->

        <!--footer start-->
        @include('layouts.partials.footer')
        <!--footer end-->
        
    </div>
    <!-- page wrapper end -->

    <!--back-to-top start-->
    <div class="scroll-top"><a class="smoothscroll bg-success" href="#top"><i class="las la-angle-up"></i></a></div>
    <!--back-to-top end-->

    <!-- inject js start -->
    @include('layouts.partials.foot')
    <!-- inject js end -->

    @yield('content')

</body>



</html>