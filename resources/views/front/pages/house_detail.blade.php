@extends('front.layouts.default')

@section("content")
    <h1 class="page-title">
        House Detail
    </h1>
    <section>
        <div class="col-md-12">
            <h2 id="property-name">
                文化旅館•翠雅山房
            </h2>
            <h4 id="property-address">
                香港九龍青山道800號
            </h4>
				<span class='rating pull-right'>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
        </div>
    </section>
    <section>
        <div class="col-sm-8">
            <div class="img-container">
                <img src="http://lorempixel.com/600/400/city" alt="">
            </div>
            <div class="icons-container text-center">
                <p class="icons text-center">
                    <i class="fa fa-home"></i>
                    <br>
                    Home
                </p>
                <p class="icons text-center">
                    <i class="fa fa-building"></i>
                    <br>
                    Building
                </p>
                <p class="icons text-center">
                    <i class="fa fa-users"></i>
                    <br>
                    xxx people
                </p>
                <p class="icons text-center">
                    <i class="fa fa-bed"></i>
                    <br>
                    1 bed
                </p>

            </div>
            <div class="description">
                About Room <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum quasi culpa, suscipit repudiandae consectetur, vel sed earum vero ea, dicta debitis illum officiis molestiae quidem obcaecati. Quia sunt quaerat iste doloribus commodi aliquam dolor itaque doloremque odit nobis minus maiores aliquid tempore sint eveniet quis dolorem, omnis architecto asperiores inventore?
            </div>
            <hr>
            <div class="facilities">
                <div class="col-xs-2">
                    Facilities
                </div>
                <div class="col-xs-10">
                    <table class="table" id="facilities-table">
                        <tbody>
                        <tr>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Kitchen</td>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> For events</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Network</td>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Smoking</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> TV</td>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Facilities for disabled </td>
                        </tr>
                        <tr>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Life necessities</td>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Elevator</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Shampoo</td>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Indoor Fireplace</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Heater</td>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Buzzer / Wireless intercom</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Air conditioning equipment</td>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Security Guard</td>
                        </tr>
                        <tr>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Washing machine</td>
                            <td class="col-xs-6"><i class="fa fa-circle"></i> Swimming pool</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="location-container">
                <div class="map-container">
                    <iframe
                            width="100%"
                            height="300"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDcuVH7UBoLjGkZ6_O2RHlrVbWUwr6zmXA
						    &q=香港九龍青山道800號" allowfullscreen>
                    </iframe>
                </div>
                <div class="location-pics-container">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/600/400" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/600/400" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/600/400" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/600/400" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/600/400" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/600/400" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3">
                            <img src="http://lorempixel.com/600/400" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-3">
                            <video width="100%" autobuffer autoloop loop controls>
                                <source src="/media/video.oga">
                                <source src="/media/video.m4v">
                                <object type="video/ogg" data="/media/video.oga" width="320" height="240">
                                    <param name="src" value="/media/video.oga">
                                    <param name="autoplay" value="false">
                                    <param name="autoStart" value="0">
                                    <p><a href="/media/video.oga">Download this video file.</a></p>
                                </object>
                            </video>
                        </div>

                    </div>
                </div>
                <div class="location-description">
                    <p>
                        位置
                    </p>
                    <p>
                        此酒店位於新宿，距離Studio Alta 百貨公司、東京都廳和新宿御苑不到 2 公里。明治神宮和代代木公園均位於 5 公里內。
                    </p>
                    <p>
                        酒店服務設施
                    </p>
                    <p>
                        此酒店提供14 間餐廳、酒吧/酒廊和自助泊車 (收費)。免費提供公眾地方 Wi-Fi。另外還附設禮賓服務、乾洗和洗衣設施。
                    </p>
                    <p>
                        客房服務設施
                    </p>
                    <p>
                        全部 970 間客房均擁有豪華浸缸，並提供免費 Wi-Fi及平面電視。其他客房設施包括免費有線上網、衛星電視和雪櫃。
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="imgs-container">
                <div class="row">
                    @foreach($property->media as $media)
                        <div class="col-xs-4">
                            <img src="{{$media->link}}" class="img-responsive" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="pricing">
                <div id="price">
                    <p>
                        <?php setlocale(LC_MONETARY, 'Chinese_Hong_Kong')  ?>
                        {{money_format('%i',$property)}}
                    </p>
                </div>
                <input type="text" class="form-control" name="promoCode" value="" placeholder="Promotion Code">
                <input type="submit" name="submit" id="bookingButton" value="Book Now" class="btn btn-lg btn-block">
                <button class="btn btn-default btn-lg btn-block">
                    <i class="fa fa-heart-o"></i> Save to wish list
                </button>
                <p class="social-icons text-center">
                    <span>Share it: <i class="fa fa-facebook"></i>  <i class="fa fa-twitter"></i> </span>
                </p>
                <p class="report-listing text-center">
                    <span><i class="fa fa-times"></i> Report this listing</span>
                </p>
            </div>

        </div>
        <hr>
    </section>
@endsection
