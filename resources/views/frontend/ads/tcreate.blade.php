@extends('frontend.layouts.single-category')

@push('css')
    <link rel="stylesheet" href="{{asset(trans('theme.path').'/css/dropzone.css')}}">
    <link href="{{asset(trans('theme.path').'/css/jquery.tagsinput.min.css')}}" rel="stylesheet">
@endpush
@section('content')
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
                            <p class="lead">نشر اعلانا على <a href="#">{{get_setting('site_title')}}</a> بدون مقابل! ومع ذلك، يجب على جميع الإعلانات متابعة قواعدنا:</p>
                            <form  class="submit-form">
                                <!-- Title  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">عنوان المشروع <small>أدخل عنوان قصير لمشروعك</small></label>
                                        <input class="form-control" placeholder="جديد هوندا العلامة التجارية المدني 2017 للبيع" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Category  -->
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">فئة <small>اختيار الفئة المناسبة لإعلانك</small></label>
                                        <select class="category form-control">
                                            <option label="Select Option"></option>
                                            <option value="0">سيارات و دراجات</option>
                                            <option value="1">الهواتف النقالة</option>
                                            <option value="2">الأجهزة المنزلية</option>
                                            <option value="3">ملابس</option>
                                            <option value="4">Human Resource</option>
                                            <option value="5">Information Technology</option>
                                            <option value="6">Marketing</option>
                                            <option value="7">آخرون</option>
                                            <option value="8">Sales</option>
                                        </select>
                                    </div>
                                    <!-- Price  -->
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">السعر<small>دولار أمريكي only</small></label>
                                        <input class="form-control" placeholder="eg $350" type="text">
                                    </div>
                                    <form action="" method="post">

                                        <h4>Category</h4>
                                        <select class="browser-default custom-select" name="category" id="category">
                                            <option selected>Select category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        <div id="sub1" style="display: none;">
                                            <select class="browser-default custom-select subcategory" name="subcategory" id="subcategory1">
                                                <option selected>Select category</option>

                                            </select>
                                        </div><div id="sub2" style="display: none;">
                                            <select class="browser-default custom-select subcategory" name="subcategory2" id="subcategory2">
                                                <option selected>Select category</option>

                                            </select>
                                        </div>
                                        <div id="sub3" style="display: none;">
                                            <select class="browser-default custom-select subcategory" name="subcategory3" id="subcategory3">
                                                <option selected>Select category</option>

                                            </select>
                                        </div>
                                    </form>

                                </div>
                                <!-- end row -->
                                <!-- Image Upload  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">صور لإعلانك <small>الرجاء إضافة الصور إعلانك. (350x450)</small></label>
                                        <div id="dropzone" class="dropzone"></div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <!-- Ad Description  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                        <label class="control-label">وصف الإعلان <small>أدخل وصف طويل للمشروع الخاص بك</small></label>
                                        <textarea  name="editor1" id="editor1" rows="12" class="form-control " placeholder=""></textarea>
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
                                <!-- Ad Type  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">نوع الإعلان<small>تريد شراء أو بيع</small></label>
                                        <div class="skin-minimal">
                                            <ul class="list">
                                                <li>
                                                    <input tabindex="7" type="radio" id="minimal-radio-1" name="minimal-radio">
                                                    <label  for="minimal-radio-1">أريد أن أبيع </label>
                                                </li>
                                                <li>
                                                    <input tabindex="8" type="radio" id="minimal-radio-2" name="minimal-radio" checked>
                                                    <label for="minimal-radio-2">أريد شراء</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Ad Condition  -->
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <label class="control-label">شرط<small>حالة السلعة</small></label>
                                        <div class="skin-minimal">
                                            <ul class="list">
                                                <li>
                                                    <input type="radio" id="new" name="minimal-radio">
                                                    <label  for="new">جديد</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="used" name="minimal-radio" checked>
                                                    <label for="used">مستعمل</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">اسمك</label>
                                        <input class="form-control" placeholder="على سبيل المثال محمد عمير" type="text">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">معرف البريد الإلكتروني الخاص بك</label>
                                        <input class="form-control" placeholder="contact@scriptsbundle.com" type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">رقم الهاتف المحمول<small>عدد لالتشكل</small></label>
                                        <input class="form-control" placeholder="eg +92-0321-123-456-789" type="text">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                        <label class="control-label">عنوان<small>عنوانك الدائم</small></label>
                                        <input class="form-control" placeholder="eg House no 8 Streent no 2 New York" type="text">
                                    </div>
                                </div>
                                <!-- اختر حزمة  -->
                                <div class="select-package">
                                    <div class="no-padding col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                        <h3 class="margin-bottom-20">اختر حزمة</h3>
                                        <div class="pricing-list">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <h3>قائمة حرة   <small>إرسال 5 القوائم</small></h3>
                                                    <p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis.</p>
                                                </div>
                                                <!-- end col -->
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="pricing-list-price text-center">
                                                        <h4>$0.00</h4>
                                                        <a href="#submit" class="btn btn-theme btn-sm btn-block">اختار</a>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <div class="pricing-list">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <h3>قائمة قسط   <small>إرسال 10 القوائم</small></h3>
                                                    <p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis.</p>
                                                </div>
                                                <!-- end col -->
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="pricing-list-price text-center">
                                                        <h4>$2.00</h4>
                                                        <a href="#submit" class="btn btn-theme btn-sm btn-block">اختار</a>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <div class="pricing-list">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <h3>عمل قائمة   <small>إرسال مشاريع غير محدود</small></h3>
                                                    <p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis.</p>
                                                </div>
                                                <!-- end col -->
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="pricing-list-price text-center">
                                                        <h4>$10.00</h4>
                                                        <a href="#submit" class="btn btn-theme btn-sm btn-block">اختار</a>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
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
        <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        <footer>
            <!-- Footer Content -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3  col-sm-6 col-xs-12">
                            <!-- Info Widget -->
                            <div class="widget">
                                <div class="logo"> <img alt="" src="images/logo-1.png"> </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et dolor eget erat fringilla port.</p>
                                <ul>
                                    <li><img src="images/appstore.png" alt=""></li>
                                    <li><img src="images/googleplay.png" alt=""></li>
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
                                <p>© 2017 AForest جميع الحقوق محفوظة. تصميم بواسطة <a href="http://themeforest.net/user/scriptsbundle/portfolio" target="_blank">Scriptsbundle</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
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
@endsection
@push('js')
    <script src="{{asset(trans('theme.path').'/js/ckeditor/ckeditor.js')}}" ></script>
    <!-- Ad Tags  -->
    <script src="{{asset(trans('theme.path').'/js/jquery.tagsinput.min.js')}}"></script>
    <!-- DROPZONE JS  -->
    <script src="{{asset(trans('theme.path').'/js/dropzone.js')}}" ></script>
    <script src="{{asset(trans('theme.path').'/js/form-dropzone.js')}}" ></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#sub1').hide(); $('#sub2').hide(); $('#sub3').hide();
            $('#category').on('change',function(e) {
                $('#sub1').hide();    $('#sub2').hide(); $('#sub3').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(1);
                        $('#subcategory1').empty();
                        if(data.subcategories.length){
                            $('#sub1').show();

                            $.each(data.subcategories,function(index,subcategory){
                                $('#subcategory1').append(' <option label="Select Option"></option>');
                                $('#subcategory1').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                        }else{
                            $('#sub2').hide();$('#sub3').hide();
                        }

                    }
                })
            });
            $('#subcategory1').on('change',function(e) {
                $('#sub2').hide(); $('#sub3').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(2);
                        $('#subcategory2').empty();
                        if(data.subcategories.length){
                            $('#sub2').show();

                            $.each(data.subcategories,function(index,subcategory){
                                $('#subcategory2').append(' <option label="Select Option"></option>');
                                $('#subcategory2').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                        }else{
                            $('#sub2').hide();
                        }


                    }
                })
            });

            $('#subcategory2').on('change',function(e) {
                $('#sub3').hide();
                var cat_id = e.target.value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    url:'{{ route('subcat') }}',
                    type:"POST",
                    data: {
                        id: cat_id
                    },

                    success:function (data) {
                        console.log(3);
                        $('#subcategory3').empty();
                        if(data.subcategories.length){
                            $('#sub3').show();

                            $.each(data.subcategories,function(index,subcategory){
                                $('#subcategory3').append(' <option label="Select Option"></option>');
                                $('#subcategory3').append('<option value="'+subcategory.id+'">'+subcategory.title+'</option>');
                            });
                        }else{
                            $('#sub3').hide();
                        }


                    }
                })
            });

        });

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
    <!-- JS -->
@endpush
