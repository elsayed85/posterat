<footer>
    <!-- Footer Content -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3  col-sm-6 col-xs-12">
                    <!-- Info Widget -->
                    <div class="widget">
                        <div class="logo"> <img alt="" src="{{asset(trans('theme.path').'/images/logo-1.png')}}"> </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et dolor eget erat fringilla port.</p>
                        <ul>
                            <li><img src="{{asset(trans('theme.path').'/images/appstore.png')}}" alt=""></li>
                            <li><img src="{{asset(trans('theme.path').'/images/googleplay.png')}}" alt=""></li>
                        </ul>
                    </div>
                    <!-- Info Widget Exit -->
                </div>
                <div class="col-md-3  col-sm-6 col-xs-12">
                    <!-- تابعنا -->
                    <div class="widget socail-icons">
                        <h5>تابعنا</h5>
                        <ul>
                            <li><a class="fb" href=""><i class="fa fa-facebook"></i></a><span>Facebook</span></li>
                            <li><a class="twitter" href=""><i class="fa fa-twitter"></i></a><span>Twitter</span></li>
                            <li><a class="linkedin" href=""><i class="fa fa-linkedin"></i></a><span>Linkedin</span></li>
                            <li><a class="googleplus" href=""><i class="fa fa-google-plus"></i></a><span>Google+</span></li>
                        </ul>
                    </div>
                    <!-- تابعنا End -->
                </div>
                <div class="col-md-6  col-sm-6 col-xs-12">
                    <!-- Newslatter -->
                    <div class="widget widget-newsletter">
                        <h5>Singup عن النشرة الأسبوعية</h5>
                        <div class="fieldset">
                            <p>قد نرسل لك معلومات عن الأحداث، وندوات والمنتجات والخدمات ذات الصلة والتي نعتقد.</p>
                            <form>
                                <input class="" value="Enter your email address" type="text">
                                <input class="submit-btn" name="submit" value="عرض" type="submit">
                            </form>
                        </div>
                    </div>
                    <!-- Newslatter -->
                </div>
            </div>
        </div>
    </div>
    <!-- Copyrights -->
    <div class="copyrights">
        <div class="container">
            <div class="copyright-content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p>© {{get_setting('site_year')}} {{get_setting('site_title')}} جميع الحقوق محفوظة. تصميم بواسطة <a href="{{get_setting('site_designedurl')}}" target="_blank">{{get_setting('site_designedby')}}</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>