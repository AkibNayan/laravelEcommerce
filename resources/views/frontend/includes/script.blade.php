<!-- Vendor -->
<script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/popper/umd/popper.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/common/common.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/vide/jquery.vide.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/vivus/vivus.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap-star-rating/js/star-rating.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('frontend/js/theme.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ asset('frontend/js/views/view.shop.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('frontend/js/theme.init.js') }}"></script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

<!-- SSL Commerz Sandbox Script -->
<script>
    (function(window, document) {
        var loader = function() {
            var script = document.createElement("script"),
                tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
<!-- SSL commerz Sandbox end -->
<!-- Tawk to live Chat Start -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/621ccd851ffac05b1d7c3b98/1ft085l8u';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!-- Tawk to live Chat End -->
<!-- Toastr Notification Script Start -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
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
@if (Session::has('message'))
<script>
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
        default:
            toastr.info("{{ Session::get('message') }}");
            break;
    }
</script>
@endif
<!-- Toastr Notification Script End -->

<!-- Division Selection and District show process Start -->

<script>
    $('#division_id').change(function() {
        var division = $('#division_id').val();

        $('#district_names').html("");
        var option = "";

        $.get("http://127.0.0.1:8000/get-district/" + division, function(data) {

            data = JSON.parse(data);

            data.forEach(function(element){
                option += "<option value="+ element.id +">"+ element.district_name +"</option>";
            });

            $('#district_names').html(option);

        });

    })
</script>

<!-- Division Selection and District show process End -->
