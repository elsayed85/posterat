<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
<script src="{{asset(trans('theme.path').'/js/jquery.min.js')}}"></script>
<!-- Bootstrap Core Css  -->
<script src="{{asset(trans('theme.path').'/js/bootstrap.min.js')}}"></script>
<!-- Jquery Easing -->
<script src="{{asset(trans('theme.path').'/js/easing.js')}}"></script>
<!-- Menu Hover  -->
<script src="{{asset(trans('theme.path').'/js/forest-megamenu.js')}}"></script>
<!-- Jquery Appear Plugin -->
<script src="{{asset(trans('theme.path').'/js/jquery.appear.min.js')}}"></script>
<!-- Numbers Animation   -->
<script src="{{asset(trans('theme.path').'/js/jquery.countTo.js')}}"></script>
<!-- Jquery Smooth Scroll  -->
<script src="{{asset(trans('theme.path').'/js/jquery.smoothscroll.js')}}"></script>
<!-- Jquery Select Options  -->
<script src="{{asset(trans('theme.path').'/js/select2.min.js')}}"></script>
<!-- noUiSlider -->
<script src="{{asset(trans('theme.path').'/js/nouislider.all.min.js')}}"></script>
<!-- Carousel Slider  -->
<script src="{{asset(trans('theme.path').'/js/carousel.min.js')}}"></script>
<script src="{{asset(trans('theme.path').'/js/slide.js')}}"></script>
<!-- Image Loaded  -->
<script src="{{asset(trans('theme.path').'/js/imagesloaded.js')}}"></script>
<script src="{{asset(trans('theme.path').'/js/isotope.min.js')}}"></script>
<!-- CheckBoxes  -->
<script src="{{asset(trans('theme.path').'/js/icheck.min.js')}}"></script>
<!-- Jquery Migration  -->
<script src="{{asset(trans('theme.path').'/js/jquery-migrate.min.js')}}"></script>
<!-- Sticky Bar  -->
<script src="{{asset(trans('theme.path').'/js/theia-sticky-sidebar.js')}}"></script>
@if(get_setting('theme_switcher'))
<!-- Style Switcher -->
<script src="{{asset(trans('theme.path').'/js/color-switcher.js')}}"></script>
@endif
<!-- Template Core JS -->
<script src="{{asset(trans('theme.path').'/js/custom.js')}}"></script>
@if(get_setting('tawk_to_chat'))
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60379ede385de4075719f5d7/1evck95a9';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@endif