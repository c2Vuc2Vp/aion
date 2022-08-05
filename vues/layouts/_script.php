<script type="text/javascript">

function Arrondir( nomber, nbApVirg ) {
return ( parseInt(nomber * Math.pow(10,nbApVirg) + 0.5) ) / Math.pow(10,nbApVirg);
}

function formatMillier( nombre ) {
var nbrArrnd = Arrondir(nombre, 2);
return new Intl.NumberFormat().format( nbrArrnd );
}

</script> 

<!-- Jquery, Popper, Bootstrap -->
<script src="./<?=$assets?>js/vendor/modernizr-3.5.0.min.js"></script>
<script src="./<?=$assets?>js/vendor/jquery-1.12.4.min.js"></script>
<script src="./<?=$assets?>js/popper.min.js"></script>
<script src="./<?=$assets?>js/bootstrap.min.js"></script>

<!-- Slick-slider , Owl-Carousel ,slick-nav -->
<script src="./<?=$assets?>js/owl.carousel.min.js"></script>
<script src="./<?=$assets?>js/slick.min.js"></script>
<script src="./<?=$assets?>js/jquery.slicknav.min.js"></script>

<!-- One Page, Animated-HeadLin, Date Picker -->
<script src="./<?=$assets?>js/wow.min.js"></script>
<script src="./<?=$assets?>js/animated.headline.js"></script>
<script src="./<?=$assets?>js/jquery.magnific-popup.js"></script>
<script src="./<?=$assets?>js/gijgo.min.js"></script>

<!-- Nice-select, sticky,Progress -->
<script src="./<?=$assets?>js/jquery.nice-select.min.js"></script>
<script src="./<?=$assets?>js/jquery.sticky.js"></script>
<script src="./<?=$assets?>js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="./<?=$assets?>js/jquery.counterup.min.js"></script>
<script src="./<?=$assets?>js/waypoints.min.js"></script>
<script src="./<?=$assets?>js/jquery.countdown.min.js"></script>
<script src="./<?=$assets?>js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="./<?=$assets?>js/contact.js"></script>
<script src="./<?=$assets?>js/jquery.form.js"></script>
<script src="./<?=$assets?>js/jquery.validate.min.js"></script>
<script src="./<?=$assets?>js/mail-script.js"></script>
<script src="./<?=$assets?>js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="./<?=$assets?>js/plugins.js"></script>
<script src="./<?=$assets?>js/main.js"></script>

<!-- fancybox gallery -->
<script src="<?=$vendor?>fancybox-3.5.7/jquery.fancybox.min.js"></script>
<!-- swetalert -->
<script src="<?=$vendor?>sweetalert/sweetalert2.js"></script>
