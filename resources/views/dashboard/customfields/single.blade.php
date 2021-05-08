<div class="row row-sm">
    <div class="col-sm-12 col-lg-7 col-xl-8">
        <div class="">
            <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
            <div class="main-content-body main-content-body-contacts card custom-card">
                <div class="main-contact-info-body p-4">
                    <div class="media-list pb-0">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <form action="{{route('dashboard.customfields.to_category',$customfield->id) }}" method="POST" class="form-horizontal">
                        @csrf
                                <div class="form-group">
                        <label>categories</label>
                        <select class="form-control select2-no-search" name="category_id">
                            <option label="" value="">
                                اختار قسم لإضافة الحقل المخصص له
                            </option>
                        @foreach($categories as $category)
                        <option label="" value="{{$category->id}}">
                        {{$category->title}}
                        </option>
                        @endforeach
                        </select>
                                </div>
                                <input type="hidden" name="custpm_field_id" value="{{ $customfield->id}}">

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">add</button>
                                </div>
                            </form>
                        </div>
                        <div class="media">
                        <div class="media-body">
                        <label>categories : </label>
                            <span class="tx-medium">
                                {{--{{dd($customfield->categories)}}--}}
                               @foreach($customfield->categories as $category)
                                    {{$category->title}} -
                            @endforeach
                            </span>
                        </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>input title</label> <span class="tx-medium">{{$customfield->input_title}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>input name</label> <span class="tx-medium">{{$customfield->input_name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>input type</label> <span class="tx-medium">{{$customfield->input_type}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>default value</label> <span class="tx-medium">{{$customfield->default_value}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>input icon</label> <span class="tx-medium">{{$customfield->input_icon}}</span>
                                </div>
                            </div>
                        </div>
                        @if($customfield->input_type == 'select')
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>input options</label>
                                    <span class="tx-medium">
                                        <ul>
                                            @if(is_array($customfield->input_options) && count($customfield->input_options))
                                    @foreach($customfield->input_options as $option=>$value)
                                            <li>{{$option}}:
                                                @foreach($value as $val)
                                                   - {{$val}}
                                            @endforeach
                                            </li>
                                    @endforeach
                                            @endif
                                        </ul>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>requied</label> <span class="tx-medium">{{$customfield->requied?'yes':'no'}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>show</label> <span class="tx-medium">{{$customfield->show?'yes':'no'}}</span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <label>updated at</label> <span class="tx-medium">{{$customfield->updated_at}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="media mb-0">
                            <div class="media-body">
                                <div>
                                    <label>created at</label> <span class="tx-medium">{{$customfield->created_at}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>