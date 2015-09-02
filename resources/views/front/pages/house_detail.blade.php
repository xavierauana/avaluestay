@extends('front.layouts.default')

@section("content")
    <div id="hose_detail">
        <h1 class="page-title">
            House Detail
        </h1>
        <section>
            <div class="col-md-12">
                <h2 id="property-name">
                    @{{property.name}}
                </h2>
                <h4 id="property-address">
                    @{{address}}
                </h4>
                    <span class='rating pull-right'>
                        @for($i=0; $i< floor($property->rating()); $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        @if( $property->rating() > floor($property->rating()))
                            <i class="fa fa-star-half"></i>
                        @endif
                        @for($i=0; $i< 5-ceil($property->rating()); $i++)
                            <i class="fa fa-star-o"></i>
                        @endfor
                    </span>
            </div>
        </section>
        <section>
            <div class="col-sm-8">
                <div class="img-container" v-show="propertyImgs">
                    <img id="property-preview" src="@{{propertyImgs[0].link}}" alt="">
                </div>
                <div class="icons-container text-center">
                    @if($property->propertyType->type == "House")
                        <p class="icons text-center">
                            <i class="fa fa-home"></i>
                            <br>
                            House
                        </p>
                    @elseif($property->propertyType->type == "Apartment")
                        <p class="icons text-center">
                            <i class="fa fa-building"></i>
                            <br>
                            Building
                        </p>
                    @endif
                    <p class="icons text-center">
                        <i class="fa fa-users"></i>
                        <br>
                        @{{property.accommodates}} people
                    </p>

                    <p class="icons text-center">
                        <i class="fa fa-bed"></i>
                        <br>
                        @{{property.beds}} bed
                    </p>

                </div>
                <div class="description">
                    About Room
                    <div v-html="property.summary">
                    </div>
                </div>
                <hr>
                <div class="facilities">
                    <div class="col-xs-2">
                        Facilities
                    </div>
                    <div class="col-xs-10">
                        <div class="col-xs-6" v-repeat="property.facilities">
                            <li>@{{item}}</li>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="location-container">
                    <div class="map-container">
                        <map when-applied="@{{ mapTemplateSetAddress }}"></map>
                    </div>
                    <div class="location-pics-container">
                        <div class="row" v-show="neighbourhoodImgs">
                            <div class="col-md-3" v-repeat="item in neighbourhoodImgs">
                                <img src="@{{item.link}}" class="img-responsive" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="location-description">
                        <h4>About my neighbourhood</h4>

                        <div v-html="property.locationDescription">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="imgs-container">
                    <div class="row" v-show="propertyImgs">
                        <div class="col-xs-4" v-repeat="item in propertyImgs">
                            <img src="@{{item.link}}" class="img-responsive" v-on="click: loadPropertyPreviewImage"
                                 alt="">
                        </div>
                    </div>
                </div>
                <div class="pricing">
                    <div id="price">
                        <p>
                            HK$ <span id="nightRate">{{number_format($property->showPrice,1,".",",")}}</span>
                        </p>
                    </div>
                    <input type="text" class="form-control" name="promoCode" value="" placeholder="Promotion Code">
                    @if(!Auth::user())
                        <a id="bookingButton" class="btn btn-lg btn-block" data-toggle="modal"
                           href="/auth/login?redirect={{url('property/'.$property->id)}}">Book Now</a>
                    @else
                        <a name="submit" id="bookingButton" class="btn btn-lg btn-block" data-toggle="modal"
                           href="#bookingForm">Book Now</a>
                        <a name="submit" id="bookingButton" class="btn btn-lg btn-block" data-toggle="modal"
                           href="#messageBox">Message Owner</a>
                    @endif
                    <button class="btn btn-default btn-lg btn-block" v-class="favorite: isFavorite"
                            v-on="click: toggleFavorite">
                        <i class="fa fa-heart-o"></i>
                        <span v-show="isFavorite">In your wish list</span>
                        <span v-show="!isFavorite">Save to your wish list</span>
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
        <br>
        @include('front.pages.partials.bookingForm')
        <div class="modal fade center-screen" id="messageBox">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Message Owner</h4>
                    </div>
                    <div class="modal-body">
                    <textarea class="form-control" name="message" id="message" cols="30" rows="10"
                              placeholder="What you want to say?" v-model="message"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" v-on="click: sendMessage">Send</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </div>
    <br><br>




@endsection

@section('scripts')

    <script type="x-template" id="tempalte_map">
        <iframe
                width="100%"
                height="300"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDcuVH7UBoLjGkZ6_O2RHlrVbWUwr6zmXA
                        &q=@{{ encodeURIComponent( address )  }}
                        &attribution_source=Google+Maps+Embed+API
                        &attribution_web_url=@{{ url }}
                        &attribution_ios_deep_link_id=comgooglemaps://?daddr=@{{ encodeURIComponent( address )  }}"
                allowfullscreen>
        </iframe>
    </script>



    <script>
        if (avaluestay.successMessage) {
            swal("Here's a message!")
        }
        Vue.component('map', {
            template: "#tempalte_map",
            props: ['when-applied'],
            data: function () {
                return {
                    address: "",
                    url: ""
                }
            },
            ready: function () {
                this.address = this.whenApplied()[0];
                this.url = "http://avaluestay.dev/property/" + this.whenApplied()[1].id;
            }
        });
        Vue.component('bookingform', {
            template: "#template_bookingForm",
            data: function () {
                return {
                    services: [],
                    propertyId: 0,
                    nightRate: 0,
                    token: $('meta[name="csrf-token"]').attr('content'),
                    duration: 0,
                    messages: [],
                    selectedServiceIds: [],
                    overallTotal: 0
                }
            },
            props: ['get-services', 'get-night-rate', 'get-property-id'],
            methods: {
                pay: function (e) {
                    e.preventDefault();
                    var data, self;
                    self = this;
                    data = {
                        duration: this.duration,
                        nightRate: this.nightRate,
                        selectedServiceIds: this.selectedServiceIds,
                        propertyId: this.propertyId,
                        overallTotal: this.overallTotal,
                        checkInDate: $('#checkInDate').val(),
                        checkOutDate: $('#checkOutDate').val()
                    }

                    $.post("/invoices", data).success(function (data) {
                        console.log(data);
                        $("input[name='amount']").val(self.overallTotal);
                        $("input[name='orderRef']").val(data.orderRef);
                        $("input[name='successUrl']").val("http://avaluestay.dev/booking/success?property=" + data.propertyId);
                        $("input[name='failUrl']").val("http://avaluestay.dev/booking/fail?property=" + data.propertyId);
                        $("input[name='errorUrl']").val("http://avaluestay.dev/booking/error?property=" + data.propertyId);

                        e.target.submit();
                    });

                },
                setAjaxHeader: function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': this.token
                        }
                    });
                },
                checkOut: function (e) {
                    var results;

                    if($('#checkInDate').val().trim().length > 0 && $("#checkOutDate").val().trim().length > 0){
                        this.showPaymentTab();
                        $(e.target).toggleClass('hidden');
                        results = this.calculate();
                        this.overallTotal = results.reduce(function (sum, item) {
                            return sum += item
                        }, 0);
                        this.giveOutput(results);
                    }
                },
                giveOutput: function (results) {
                    var self;
                    self = this;
                    $("#overallTotalAmount").text(results.reduce(function (sum, item) {
                        return sum += item;
                    }, 0).toFixed(0).replace(/./g, function (c, i, a) {
                        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
                    }));
                    $.each($("#booking").find('input.services:checked'), function (index, service) {
                        if (service.dataset.type == 'daily') {
                            self.messages.push("Included " + self.duration + " days " + service.dataset.name + ".");
                        }
                        if (service.dataset.type == 'onceoff') {
                            self.messages.push("Included once " + service.dataset.name + ".");
                        }
                        self.selectedServiceIds.push(service.dataset.id)
                    });
                },
                getDuration: function () {
                    var diff;

                    diff = Date.parse($("#checkOutDate").val()) - Date.parse($("#checkInDate").val());

                    return Math.floor(diff / ((60 * 60 * 24 * 1000)));
                },
                calculate: function (e) {
                    var self, totalAmount;

                    self = this;

                    this.duration = this.getDuration();

                    totalAmount = this.duration * this.nightRate;

                    var totalDailyServiceCharge = 0;
                    var totalOnceOffServiceCharge = 0;

                    $.each($("#booking").find('input.services:checked'), function (index, service) {
                        if (service.dataset.type == "daily") {
                            totalDailyServiceCharge += parseInt(service.dataset.price) * self.duration;
                        }
                        if (service.dataset.type == "onceoff") {
                            totalOnceOffServiceCharge += parseInt(service.dataset.price);
                        }

                    });

                    return [totalAmount, totalDailyServiceCharge, totalOnceOffServiceCharge]

                },
                initializeDateTimePicker: function () {
                    $('#checkInDate').datetimepicker({
                        format: 'DD MMMM YYYY'
                    });
                    $('#checkOutDate').datetimepicker({
                        useCurrent: false, //Important! See issue #1075
                        format: 'DD MMMM YYYY'
                    });
                    $("#checkInDate").on("dp.change", function (e) {
                        $('#checkOutDate').data("DateTimePicker").minDate(e.date.add(1, 'd'));
                    });
                    $("#checkOutDate").on("dp.change", function (e) {
//                        $('#checkInDate').data("DateTimePicker").maxDate(e.date);
                    });
                },
                showPaymentTab: function () {
                    var bookingTab, paymentTab;

                    bookingTab = $("#booking");
                    paymentTab = $("#payment");
                    if (bookingTab.hasClass("in")) {
                        bookingTab.removeClass('in');
                        paymentTab.addClass('in');
                    }
                    if (bookingTab.hasClass("active")) {
                        bookingTab.removeClass("active");
                        paymentTab.addClass("active");
                    }
                },
                showBookingTab: function () {
                    var bookingTab, paymentTab;

                    bookingTab = $("#booking");
                    paymentTab = $("#payment");
                    if (!bookingTab.hasClass("in")) {
                        bookingTab.addClass('in');
                        paymentTab.removeClass('in');
                    }
                    if (!bookingTab.hasClass("active")) {
                        bookingTab.addClass("active");
                        paymentTab.removeClass("active");
                    }
                },
                registerModalReset: function () {
                    var checkOutButton, self;

                    checkOutButton = $("#checkOutButton");
                    self = this;
                    $('#bookingForm').on('hidden.bs.modal', function (e) {
                        self.messages = [];
                        self.duration = 0;
                        self.selectedServiceIds = [];
                        $("#bookingForm input").val("");
                        self.showBookingTab();
                        if (checkOutButton.hasClass('hidden')) {
                            checkOutButton.toggleClass('hidden');
                        }
                    })
                }
            },
            ready: function () {
                this.services = this.getServices();
                this.nightRate = this.getNightRate();
                this.propertyId = this.getPropertyId();
                this.initializeDateTimePicker();
                this.setAjaxHeader();
                this.registerModalReset();
            }
        });


        var houseDetailVue = new Vue({
            el: "#hose_detail",
            data: {
                message: "",
                token: $('meta[name="csrf-token"]').attr('content'),
                checkInDateObject: "",
                checkOutDateObject: "",
                duration: "",
                totalAmount: "",
                property: avaluestay.property,
                address: "",
                userId: avaluestay.userId,
                totalServiceAmount: 0,
                isFavorite: false
            },
            computed: {
                propertyImgs: function () {
                    return this.property.media.filter(function (pic) {
                        return pic.tag == 'property'
                    });
                },
                neighbourhoodImgs: function () {
                    return this.property.media.filter(function (pic) {
                        return pic.tag == 'neighbourhood'
                    });
                },
                address: function () {
                    var temp = [];
                    if (this.property.address2) {
                        temp.push(this.property.address2)
                    }
                    if (this.property.address3) {
                        temp.push(this.property.address3)
                    }
                    if (this.property.city) {
                        temp.push(this.property.city)
                    }
                    if (this.property.country) {
                        temp.push(this.property.country)
                    }
                    var result = temp.join(", ");
                    return result;
                },
                hasPropertyImg: function () {
                    return false;
//                    return this.property.media.some(function (media) {
//                        console.log(media);
//                        return media.tag == 'property'
//                    });
                }
            },
            methods: {
                getPropertyId: function () {
                    return this.property.id;
                },
                getServices: function () {
                    return this.property.services;
                },
                getRate: function () {
                    return parseInt(this.property.price * (parseFloat(this.property.commission.rate) + 1));
                },
                mapTemplateSetAddress: function () {
                    return [this.address, this.property];
                },
                toggleFavorite: function (e) {
                    var self = this;
                    $.post("/favorites/" + this.property.id)
                            .success(function (data) {
                                if (data.response == 'completed') {
                                    self.isFavorite = !self.isFavorite;
                                }
                            });
                },
                sendMessage: function (e) {
                    var url = "/messages/receiver/" + this.property.user_id;
                    console.log(url);
                    $.post(url, {message: this.message})
                            .success(function (data) {
                                console.log(data)
                            });
                    this.message = '';
                    $(e.target).parents("div.modal").modal("toggle");
                },
                loadPropertyPreviewImage: function (e) {
                    console.log("fired");
                    document.getElementById("property-preview").src = e.target.src
                },

                checkIsFavorite: function () {
                    var self, found, item;
                    self = this;
                    found = this.property.wish_list.some(function (item) {
                        return item.user_id = self.userId;
                    });
                    this.isFavorite = found;
                },
                setAjaxHeader: function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': this.token
                        }
                    });
                }
            },
            ready: function () {
                this.checkIsFavorite();
                this.setAjaxHeader();
            }
        });

    </script>
@endsection
