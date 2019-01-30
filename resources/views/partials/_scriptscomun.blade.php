    <!-- Bootstrap core JavaScript Bundle=bootstrap.min.js + popper.js.   Jquery v3.3.1-->
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/js/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/js/sb-admin.min.js')}}"></script>

    <script>
        // Get the current year for the copyright
        $('#year').text(new Date().getFullYear()); 
        
        // Botón subir
        $(document).ready(function() {
            // Show or hide the sticky footer button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 200) {
                    $('.go-top').fadeIn(200);
                } else {
                    $('.go-top').fadeOut(200);
                }
            });

            // Animate the scroll to top
            $('.go-top').click(function(event) {
                event.preventDefault();
                $('html, body').animate({scrollTop: 0}, 1200);
            })
        });
        
    </script>