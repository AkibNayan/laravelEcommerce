<script src="{{ asset('backend./lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend./lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ asset('backend./lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend./lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('backend./lib/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('backend./lib/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('backend./lib/rickshaw/vendor/d3.min.js') }}"></script>
<script src="{{ asset('backend./lib/rickshaw/vendor/d3.layout.min.js') }}"></script>
<script src="{{ asset('backend./lib/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('backend./lib/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('backend./lib/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('backend./lib/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('backend./lib/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('backend./lib/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('backend./lib/select2/js/select2.full.min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
<script src="{{ asset('backend./lib/gmaps/gmaps.min.js') }}"></script>

<script src="{{ asset('backend./js/bracket.js') }}"></script>
<script src="{{ asset('backend./js/map.shiftworker.js') }}"></script>
<script src="{{ asset('backend./js/ResizeSensor.js') }}"></script>
<script src="{{ asset('backend./js/dashboard.js') }}"></script>
<!-- Toastr Notification -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Toastr alert message Classification -->
@if (Session::has('message'))
<script>
    var type = "{{ Session::get('alert-type', 'info') }}";

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;

        default:
            break;
    }
</script>
@endif

<!-- Copy Paste from Toastr jQuery Library-->
<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

<script>
    $(function() {
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function() {
            minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
            if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
        }
    });
</script>
