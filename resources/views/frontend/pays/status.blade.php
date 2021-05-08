@extends('frontend.layouts.single-category')
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
                        صفحة إتمام الدفع
                    </div>
                    <!-- end col -->
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                            <a href="{{url('/')}}" class="btn btn-theme">@lang('theme.back to home')</a>
                        </div>

                    </div>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        @if($loop->first)
        swal("Error!", "{{ $error }}",'error');
        @endif
                @break;
        @endforeach

        @endif
        @if (session('status'))
        swal("{{ strtoupper(session('type')) }}!", "{{ session('status') }}","{{ session('type') }}");
        @endif
    </script>
@endpush