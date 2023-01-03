<!DOCTYPE html>
<html lang="en">

<head>

    @include('backend.includes.header')

    <!-- vendor css -->
    @include('backend.includes.css')
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.includes.leftmenu')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.includes.topbar')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.includes.rightpanel')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <!-- Main Content Part Start -->
        @yield('body-content')
        <!-- Main Content Part End -->

        <!-- Footer Part Start -->
        @include('backend.includes.footer')
        <!-- Footer Part End -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- Script Part Start -->
    @include('backend.includes.script')
    <!-- Script Part End -->

</body>

</html>
