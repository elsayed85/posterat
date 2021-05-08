@extends('frontend.index')

@section('css')
    <link rel="stylesheet" href="{{asset('frontend/ltr/css/dropzone.css')}}">
    <link href="{{asset('frontend/ltr/css/jquery.tagsinput.min.css')}}" rel="stylesheet">
@stop

@section('content')

<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>



<!-- Small Breadcrumb -->
<div class="small-breadcrumb">
    <div class="container">
        <div class=" breadcrumb-link">
            <ul>
                <li><a href="{{route('index')}}">الرئيسية</a></li>
                <li><a class="active" >اضف اعلان</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Small Breadcrumb -->
<!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding  gray ">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-12">
                    <!-- end post-padding -->
                    <div class="post-ad-form extra-padding postdetails">
                        <div class="heading-panel">
                            <h3 class="main-title text-left">
                                أضف إعلانك
                            </h3>
                        </div>
                        <p class="lead">نشر اعلانا على <a href="{{config('app.url', 'Site')}}">{{get_setting('site_name', 'Site')}}</a> بدون مقابل! ومع ذلك، يجب على جميع الإعلانات متابعة قواعدنا:</p>
                        <form action="{{route('ads.store')}}" class="submit-form" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Title  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">عنوان المشروع <small>أدخل عنوان قصير لمشروعك</small></label>
                                    <input class="form-control" name="title" placeholder="جديد هوندا العلامة التجارية المدني 2017 للبيع" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <!-- Category  -->
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label">الفئة </label>
                                    <select class="category form-control" name="category_id">
                                        <option label="Select Option"> --اختار قسم--</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Price  -->
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label">السعر</label>
                                    <input class="form-control" placeholder="" name="cost" type="text">
                                    <label class="control-label">هل تريد اخفاء السعر من الإعلان</label>
                                    <input type="checkbox" value="1" name="cost_hide">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- City  -->
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label class="control-label">المدينة </label>
                                <select class="city form-control" name="city_id">
                                    <option label="Select Option"> --اختار المدينة--</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Image Upload  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">صور لإعلانك</label>
                                    <div id="dropzone" class="dropzone"></div>
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- Ad Description  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                    <label class="control-label">وصف الإعلان <small>أدخل وصف طويل للمشروع الخاص بك</small></label>
                                    <textarea  name="description" id="editor1" rows="12" class="form-control " placeholder=""></textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- Ad Tags  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                    <label class="control-label">إعلان الكلمات </label>
                                    <input class="form-control" name="tags" id="tags" value="laptop,car,camera for sale" >
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- Ad Type_is  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">نوع الاعلان</label>
                                    <div class="skin-minimal">
                                        <ul class="list">
                                            <li>
                                                <input tabindex="7" type="radio" id="minimal-radio-1" value="personal" name="type_is" checked>
                                                <label  for="minimal-radio-1">شخصى </label>
                                            </li>
                                            <li>
                                                <input tabindex="8" type="radio" id="minimal-radio-2" value="business" name="type_is">
                                                <label for="minimal-radio-2">شركات</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Ad Type  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">وضع الإعلان</label>
                                    <div class="skin-minimal">
                                        <ul class="list">
                                            <li>
                                                <input tabindex="7" type="radio" id="minimal-radio-1" value="نشط" name="mode">
                                                <label  for="minimal-radio-1">نشط </label>
                                            </li>
                                            <li>
                                                <input tabindex="8" type="radio" id="minimal-radio-2" value="غير نشط" name="mode" checked>
                                                <label for="minimal-radio-2">غير نشط</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Ad Condition  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">حالة الاعلان</label>
                                    <div class="skin-minimal">
                                        <ul class="list">
                                            <li>
                                                <input type="radio" id="new" value="1" name="premium">
                                                <label  for="new">ممول</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="used" value="0" name="premium" checked>
                                                <label for="used">غير ممول</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row">

                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label">رقم الهاتف المحمول</label>
                                    <input class="form-control"  type="text" name="phone">
                                    <label class="control-label">هل تريد اخفاء الهاتف من الإعلان</label>
                                    <input type="checkbox" value="1" name="phone_show">
                                </div>
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label">رقم الواتس اب الخاص بك  </label>
                                    <input class="form-control"  name="whatsapp" type="text">
                                    <label class="control-label">هل تريد اخفاء رقم الواتس اب من الإعلان</label>
                                    <input type="checkbox" value="1" name="whatsapp_show">
                                </div>

                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label">معرف البريد الإلكتروني الخاص بك</label>
                                    <input class="form-control" placeholder="البريد الالكتورني" type="email">
                                </div>
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label class="control-label"> عنوان <small> عنوانك الدائم </small> </label>
                                    <input class="form-control" placeholder="القاهرة مصر" type="text">
                                </div>
                            </div>

                            <!-- Featured Ad  -->
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label class="control-label">جعل إعلانك مميزة  <small class="pull-right" > <a href="">ما هو الإعلان المميز</a></small></label>
                                    <div class="skin-minimal">
                                        <ul class="list">
                                            <li>
                                                <input type="radio" id="bank" name="minimal-radio">
                                                <label  for="bank"> تحويل مصرفي مباشر</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="cheque" name="minimal-radio" checked>
                                                <label for="cheque">دفع شيكات</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="paypal" name="minimal-radio" checked>
                                                <label for="paypal">باي بال</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="card" name="minimal-radio" checked>
                                                <label for="card">بطاقة ائتمان</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <button class="btn btn-theme pull-right">نشر إعلاني</button>
                        </form>
                    </div>
                    <!-- end post-ad-form-->
                </div>
                <!-- end col -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->

</div>
<!-- Main Content Area End -->
<!-- Post Ad Sticky -->
<a href="#" class="sticky-post-button hidden-xs">
         <span class="sell-icons">
         <i class="flaticon-transport-9"></i>
         </span>
    <h4>يبيع</h4>
</a>
<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>
<!-- Back To Top -->
<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
<script src="{{asset('frontend/ltr/js/jquery.min.js')}}"></script>
<!-- Bootstrap Core Css  -->
<script src="{{asset('frontend/ltr/js/bootstrap.min.js')}}"></script>
<!-- Jquery Easing -->
<script src="{{asset('frontend/ltr/js/easing.js')}}"></script>
<!-- Menu Hover  -->
<script src="{{asset('frontend/ltr/js/forest-megamenu.js')}}"></script>
<!-- Jquery Appear Plugin -->
<script src="{{asset('frontend/ltr/js/jquery.appear.min.js')}}"></script>
<!-- Numbers Animation   -->
<script src="{{asset('frontend/ltr/js/jquery.countTo.js')}}"></script>
<!-- Jquery Smooth Scroll  -->
<script src="{{asset('frontend/ltr/js/jquery.smoothscroll.js')}}"></script>
<!-- Jquery Select Options  -->
<script src="{{asset('frontend/ltr/js/select2.min.js')}}"></script>
<!-- noUiSlider -->
<script src="{{asset('frontend/ltr/js/nouislider.all.min.js')}}"></script>
<!-- Carousel Slider  -->
<script src="{{asset('frontend/ltr/js/carousel.min.js')}}"></script>
<script src="{{asset('frontend/ltr/js/slide.js')}}"></script>
<!-- Image Loaded  -->
<script src="{{asset('frontend/ltr/js/imagesloaded.js')}}"></script>
<script src="{{asset('frontend/ltr/js/isotope.min.js')}}"></script>
<!-- CheckBoxes  -->
<script src="{{asset('frontend/ltr/js/icheck.min.js')}}"></script>
<!-- Jquery Migration  -->
<script src="{{asset('frontend/ltr/js/jquery-migrate.min.js')}}"></script>
<!-- Sticky Bar  -->
<script src="{{asset('frontend/ltr/js/theia-sticky-sidebar.')}}'"></script>
<!-- Style Switcher -->
<script src="{{asset('frontend/ltr/js/color-switcher.js')}}"></script>
<!-- Template Core JS -->
<script src="{{asset('frontend/ltr/js/custom.js')}}"></script>
<!-- For this Page Only -->
<!-- For this Page Only -->
<!-- Ckeditor  -->
<script src="{{asset('frontend/ltr/js/ckeditor/ckeditor.js')}}" ></script>
<!-- Ad Tags  -->
<script src="{{asset('frontend/ltr/js/jquery.tagsinput.min.js')}}"></script>
<!-- DROPZONE JS  -->
<script src="{{asset('frontend/ltr/js/dropzone.js')}}" ></script>
<script src="{{asset('frontend/ltr/js/form-dropzone.js')}}" ></script>
<script type="text/javascript">
    "use strict";

    /*--------- Textarea Ck Editor --------*/
    CKEDITOR.replace( 'editor1' );

    /*--------- Ad Tags --------*/
    $('#tags').tagsInput({
        'width':'100%'
    });

    /*--------- create remove function in dropzone --------*/
    Dropzone.autoDiscover = false;
    var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
    var fileList = new Array;
    var i = 0;
    $("#dropzone").dropzone({
        addRemoveLinks: true,
        maxFiles: 5, //change limit as per your requirements
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        dictMaxFilesExceeded: "Maximum upload limit reached",
        acceptedFiles: acceptedFileTypes,
        url: "uploads",
        dictInvalidFileType: "upload only JPG/PNG",
        init: function () {
            // Hack: Add the dropzone class to the element
            $(this.element).addClass("dropzone");
        }
    });
    (jQuery);
</script>

@endsection

