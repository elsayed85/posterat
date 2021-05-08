<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true" data-delay="10" data-open="2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                <h4 class="modal-title" id="memberModalLabel"> {!! $popup_title !!}</h4>
            </div>
            <div class="modal-body">
                {{--<p>You will now be shown the Demo site.</p>--}}
                {{--<div class="social-links clearfix">--}}
                    {{--<a class="facebook img-circle" href="#"><span class="fa fa-facebook fa-5x"></span></a>--}}
                    {{--<a class="twitter img-circle" href="#"><span class="fa fa-twitter fa-5x"></span></a>--}}
                    {{--<a class="linkedin img-circle" href="https://wa.me/96555580150?text=I%20ask%20about"><span class="fa fa-whatsapp fa-5x "></span></a>--}}
                    {{--<a class="linkedin img-circle" href="tel:+96555580150"><span class="fa fa-phone fa-5x"></span></a>--}}
                {{--</div>--}}
                {!! body_icons($popup_body) !!}


            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">@lang('theme.close')</button>--}}
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                <span id="countdown" class="center"></span>
                </div>
                    <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                    <progress value="0" max="9" id="progressBar"></progress>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius: 15px;text-align: center;">@lang('theme.close')</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


@push('js')
    <script type="text/javascript">
    $(function(){
        setTimeout(function(e){
            $('#memberModal').modal('show');
        }, parseInt($('#memberModal').attr('data-open')) * 1000);
        setTimeout(function(e){
            $('#memberModal').modal('hide');
        }, parseInt($('#memberModal').attr('data-delay')) * 1000);
    });

    var timeleft = 9;
    var downloadTimer = setInterval(function(){
        if(timeleft <= 0){
            clearInterval(downloadTimer);
            document.getElementById("countdown").innerHTML = "{{trans('theme.close')}}";
        } else {
            document.getElementById("countdown").innerHTML = "{{trans('theme.ignore after')}} : "+timeleft ;
        }
        timeleft -= 1;
    }, 1000);
    var timeleft2 = 10;
    var downloadTimer2 = setInterval(function(){
        if(timeleft2 <= 0){
            clearInterval(downloadTimer2);
        }
        document.getElementById("progressBar").value = 10 - timeleft2;
        timeleft2 -= 1;
    }, 1000);
    </script>

@endpush