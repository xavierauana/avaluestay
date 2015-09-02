@extends("front.layouts.default")

@section('content')

    @include("front.layouts.partials.frontEndSearchForm")

    <!-- This is the advertisment section 1. This particular section should be only for index page -->
    <section class="advertisment">
    <div class="ad-container" id="ad1">
            <a href="#"><img src="http://lorempixel.com/1440/490/city" alt=""></a>
        </div>
        <div class="ad-container" id="ad2">
            <a href="#"><img src="http://lorempixel.com/1440/490/people" alt=""></a>
        </div>
        <div class="row">
            <div class="col-sm-6 ad-container" id="ad3">
                <a href="#"><img src="http://lorempixel.com/1440/490/sport" alt=""></a>
            </div>
            <div class="col-sm-6 ad-container" id="ad4">
                <a href="#"><img src="http://lorempixel.com/1440/490/abstract" alt=""></a>
            </div>
        </div>
    </section>
    <!-- end of advertisment section 1-->

    <!-- Feature Section. -->
    <section class="category">
        <div class="row">
            <a href="#">
                <div class="col-xs-12" id="promotion-item">
                    <img src="http://lorempixel.com/1440/490/city" width="100%" alt="">
                    <p class="description">testing room or what so ever</p>
                </div>
            </a>
        </div>
        <div class="row">
            <a href="/destination/{{urlencode("Hong Kong")}}">
                <div class="col-sm-6 col-md-4 imgSquare">
                    <img src="http://lorempixel.com/700/700/abstract" alt="" class="img-responsive">
                    <p class="description">HONG KONG</p>
                </div>
            </a>
            <a href="">
                <div class="col-sm-6 col-md-4 imgSquare">
                    <img src="http://lorempixel.com/700/700/abstract" alt="" class="img-responsive">
                    <p class="description">FRANCE</p>
                </div>
            </a>
            <a href="">
                <div class="col-sm-6 col-md-4 imgSquare">
                    <img src="http://lorempixel.com/700/700/abstract" alt="" class="img-responsive">
                    <p class="description">GERMANY</p>
                </div>
            </a>
        </div>
    </section>
    <!-- end of feature section -->
@endsection