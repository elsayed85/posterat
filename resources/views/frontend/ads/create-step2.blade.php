@extends('frontend.layouts.single-category')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

@endpush
@section('content')
    <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
    <div class="main-content-area clearfix">
        <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
        <section class="section-padding  gray">
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
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <h4>الصورة الرئيسية</h4>
                                <label class="control-label">يرجي <small>اختيار الصورة</small> المناسبة لإعلانك </label>
                                <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data"
                                      class="dropzone" id="dropzone1">
                                    @csrf
                                </form>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <h4>صور لإضافية</h4>
                                <label class="control-label">يرجي <small>اختيار صور</small> مناسبة من 1 - 10 صور </label>

                                <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data"
                                      class="dropzone" id="dropzone2">
                                    @csrf
                                </form>
                            </div>
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
@endsection
@push('js')
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
        <script type="text/javascript">
        Dropzone.options.dropzone1 =
            {
                maxFiles: 1,
                maxFilesize: 2,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url("image/delete") }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                init: function() {

                    this.on("maxfilesexceeded", function(file){
                        this.removeFile(file);
                        alert("File Limit exceeded!","error");
                    });
                    this.on("addedfile", function(file) { if(this.files.length<=this.maxFiles-1){
                        this.enqueueFile(file);} this.processQueue();
                    });


                },
                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
        Dropzone.options.dropzone2 =
            {
                maxFiles: 10,
                maxFilesize: 2,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url("image/delete") }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                init: function() {

                    this.on("maxfilesexceeded", function(file){
                        this.removeFile(file);
                        alert("File Limit exceeded!","error");
                    });
                    this.on("addedfile", function(file) { if(this.files.length<=(this.maxFiles-1)){
                        this.enqueueFile(file);} this.processQueue();
                    });


                },
                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
    </script>
@endpush
