@extends("back.layouts.default")

@section("content")

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Your Listed Property</h1>
        </div>
        <div class="panel-body" id="listing">
            @if(count($properties) > 0)
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @if($properties->has('approved'))
                        <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Approved Properties
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul>
                                    @foreach($properties->get('approved') as $index=>$property)
                                        <li>
                                            <div class="myProperty row">
                                                <a href="/properties/next/{{$property->id}}">
                                                    <div class="col-md-3">
                                                        @if($property->media()->whereTag("property")->first())
                                                            <img src="{{$property->media()->whereTag("property")->first()->link}}" class="img-responsive" alt="">
                                                        @else
                                                            <img src="/imgs/noImage.jpeg" class="img-responsive" alt="">
                                                        @endif
                                                        <ul class="list-unstyled">
                                                            <li><i class="fa fa-money"></i>HK${{number_format ( (float) $property->price , 0 , "." ,  "," )}}</li>
                                                            <li><i class="fa fa-map-marker"></i>{{$property->address3}}, {{$property->city}}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h4>{{$property->name}}</h4>
                                                        <p class="description">
                                                            {{$property->summary}}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn pull-right btn-small @if($property->listingStatus == 'listing') btn-danger @else btn-success @endif"
                                                                data-url="property/updateListStatus"
                                                                data-id="{{$property->id}}"
                                                                v-on="click: updateListingStatus"
                                                                >
                                                            @if($property->listingStatus == 'listing') Unlist @else Put it to our list NOW! @endif
                                                        </button>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($properties->has('pending'))
                        <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Waiting for approval
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse in" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <ul class="list-unstyled">



                                    @foreach($properties->get('pending') as $index=>$property)
                                        <li>
                                            <div class="myProperty row">
                                                <a href="/properties/next/{{$property->id}}">
                                                    <div class="col-md-3">
                                                        @if($property->media()->whereTag("property")->first())
                                                            <img src="{{$property->media()->whereTag("property")->first()->link}}" class="img-responsive" alt="">
                                                        @else
                                                            <img src="/imgs/noImage.jpeg" class="img-responsive" alt="">
                                                        @endif
                                                            <ul class="list-unstyled">
                                                                <li><i class="fa fa-money"></i>HK${{number_format ( (float) $property->price , 0 , "." ,  "," )}}</li>
                                                                <li><i class="fa fa-map-marker"></i>{{$property->address3}}, {{$property->city}}</li>
                                                            </ul>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h4>{{$property->name}}</h4>
                                                        <p class="description">
                                                            {{$property->summary}}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            @else
                <h4>You haven't list any property yet! Let's do it <a href="{{route("properties.create")}}">NOW</a></h4>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var listingVue = new Vue({
            el: "#listing",
            methods:{
             updateListingStatus:function(e){
                 $.ajax({
                     url: e.target.dataset.url+"/"+e.target.dataset.id
                 }).success(function(data){
                     if(data.response == 'completed'){
                         if(data.status == 'unlist'){
                             $(e.target).removeClass('btn-danger').addClass("btn-success").text("Put it to our list NOW!")
                         }else{
                             $(e.target).removeClass('btn-success').addClass("btn-danger").text("Unlist")
                         }

                     }
                 })
             }
            }
        })
    </script>
@endsection