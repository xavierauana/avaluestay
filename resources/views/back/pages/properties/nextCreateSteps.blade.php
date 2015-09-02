@extends("back.layouts.default")

@section("content")
    <div class="panel panel-default" id="registration">
        <div class="panel-heading">
            <h1 class="panel-title">Several Steps to finished create property listing</h1>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3 navigation-regsitration" >
                    <ul class="nav" role="tablist">
                        <li role="presentation"><a href="#basic" v-on="click: resetActiveTab" data-tab="basic">Basic</a></li>
                        <li role="presentation"><a href="#location" v-on="click: resetActiveTab" data-tab="location">Location</a></li>
                        <li role="presentation"><a href="#location" v-on="click: resetActiveTab" data-tab="locationDescription">Describe your location</a></li>
                        <li role="presentation"><a href="#description" v-on="click: resetActiveTab" data-tab="description">Description</a></li>
                        <li role="presentation"><a href="#facilities" v-on="click: resetActiveTab" data-tab="facilities">Facilities</a></li>
                        <li role="presentation"><a href="#photos" v-on="click: resetActiveTab" data-tab="photos">Photos</a></li>
                        <li role="presentation"><a href="#services" v-on="click: resetActiveTab" data-tab="services">Services</a></li>
                        <li role="presentation"><a href="#pricing" v-on="click: resetActiveTab" data-tab="pricing">Pricing</a></li>
                        <li role="presentation"><a href="#bankinfo" v-on="click: resetActiveTab" data-tab="bankinfo">Bank Infomation</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 main-registration" >
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="basic">
                            <div class="row">
                                <div class="col-xs-12">
                                    @include("back.pages.properties.partials.form_basic")
                                </div>
                            </div>
                            <br>
                           <a class="btn btn-info pull-right" href="#location" v-on="click: resetActiveTab" data-tab="location">Next</a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="location">
                            <div class="row">
                                <div class="col-xs-12">
                                    @include("back.pages.properties.partials.form_location")
                                </div>
                            </div>
                            <br>
                           <a class="btn btn-info pull-right" href="#description" v-on="click: resetActiveTab" data-tab="locationDescription">Next</a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="locationDescription">
                            <div class="row clearfix">
                                <div class="col-xs-12">
                                    @include("back.pages.properties.partials.form_locationDescription")
                                </div>
                            </div>
                            <br>
                            @if(count($theProperty->media) > 0)
                                <div class="preview row">
                                    @foreach($theProperty->media()->whereTag("location")->get() as $file)
                                        <div class="col-xs-6 col-md-3 completedSet">
                                            <a href="#" class="thumbnail">
                                                @if(preg_match("/^image/", $file->type))
                                                    <img src="{{$file->link}}" class="" alt="">
                                                @endif
                                            </a>
                                            <button data-url="media" data-id="{{$file->id}}" v-on="click: deleteItem " class="btn btn-danger btn-block btn-sm" >
                                                delete
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <br>
                           <a class="btn btn-info pull-right" href="#description" v-on="click: resetActiveTab" data-tab="description">Next</a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="description">
                            <div class="row">
                                <div class="col-xs-12">
                                    @include("back.pages.properties.partials.form_description")
                                </div>
                            </div>
                            <br>
                            <a class="btn btn-info pull-right" href="#facilities"  v-on="click: resetActiveTab" data-tab="facilities">Next</a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="facilities">
                            <div class="row">
                                @include("back.pages.properties.partials.form_facilities")
                            </div>
                            <br>
                            <a class="btn btn-info pull-right" href="#photos"  v-on="click: resetActiveTab" data-tab="photos">Next</a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="photos">
                            <div class="row">
                                <div class="col-xs-12">
                                    @include("back.pages.properties.partials.form_media")
                                </div>
                                @if(count($theProperty->media) > 0)
                                    <div class="preview row">
                                        @foreach($theProperty->media->filter(function($item){return $item->tag=="property";}) as $file)
                                            <div class="col-xs-6 col-md-3 completedSet">
                                                <a href="#" class="thumbnail">
                                                    @if(preg_match("/^image/", $file->type))
                                                        <img src="{{$file->link}}" class="" alt="">
                                                    @endif
                                                </a>
                                                <button data-url="media" data-id="{{$file->id}}" v-on="click: deleteItem " class="btn btn-danger btn-block btn-sm" >
                                                    delete
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <br>
                            <a class="btn btn-info pull-right" href="#services"  v-on="click: resetActiveTab" data-tab="services">Next</a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="services">
                            <div class="row">
                                @include("back.pages.properties.partials.form_services")
                            </div>
                            <br>
                            <a class="btn btn-info pull-right" href="#pricing"  v-on="click: resetActiveTab" data-tab="pricing">Next</a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="pricing">
                            <div class="row">
                                @include("back.pages.properties.partials.form_pricing")
                            </div>
                            <br>
                            <a class="btn btn-info pull-right" href="#bankinfo"  v-on="click: resetActiveTab" data-tab="bankinfo">Next</a>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="bankinfo">
                            <div class="row">
                                @include("back.pages.properties.partials.form_bankinfo")
                            </div>
                            <br>
                            <a class="btn btn-info pull-right" href="/users/subscription"  v-on="click: resetActiveTab" data-tab="">Completed</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection