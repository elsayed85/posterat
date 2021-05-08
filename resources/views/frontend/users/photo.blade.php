@extends('frontend.layouts.single-category')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@endpush
@section('content')
<!-- Small Breadcrumb -->
{{--<div class="small-breadcrumb" xmlns="">--}}
    {{--<div class="container">--}}
        {{--<div class=" breadcrumb-link">--}}
            {{--<ul>--}}
                {{--<li><a href="{{url('/')}}">@lang('theme.home page')</a></li>--}}
                {{--<li><a class="active" href="#">@lang('theme.photo')</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- Small Breadcrumb -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
    <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
    <section class="section-padding gray">
        <!-- Main Container -->
        <div class="container">
            <!-- Row -->
            <div class="row">
                <!-- Middle Content Area -->
                <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                    <!-- Sidebar Widgets -->
                    @include('frontend.users.inc._sidebar')
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <h4>@lang('theme.photo')</h4>
                            <label class="control-label">@lang('theme.my profile photo') </label>
                            <form method="post" action="{{route('myphoto.update')}}" enctype="multipart/form-data"
                                  class="dropzone" id="dropzone1">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Middle Content Area  End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Main Container End -->
    </section>
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
    <!-- =-=-=-=-=-=-= Ads أرشيف End =-=-=-=-=-=-= -->
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
         Dropzone.options.dropzone1 =
         {
             maxFiles: 1,
             maxFilesize: 2,
             renameFile: function(file) {
                 var dt = new Date();
                 var time = dt.getTime();
                 return file.name;
             },
             paramName:"main_image",
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
                     url: '{{ route('image_delete') }}',
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
                 this.on("sending", function(file, xhr, formData) {
                     // Will send the filesize along with the file as POST data.
                     formData.append("ad_id", formData.ad_id);
                 });

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
                 swal("Success!", "{{ trans('theme.done successfully') }}",'success');
             },
             error: function(file, response)
             {
                 swal("Error!", "{{ trans('theme.failed') }}",'error');
                 return false;
             }
         };


         @if ($errors->any())
         @foreach ($errors->all() as $error)
         @if($loop->first)
         swal("Error!", "{{ $error }}",'error');
         @endif
                 @break;
         @endforeach

         @endif

</script>

@endpush
