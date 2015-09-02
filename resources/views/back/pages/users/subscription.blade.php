@extends("back.layouts.default")

@section('content')
    <div class="panel panel-default">
        @if(Session::has('message'))
            <div class="alert alert-info">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<strong>Hi there,</strong> {{Session::get('message')}}

            </div>
        @endif
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">

                    <div class="center-block plans text-center">
                        <div class="heading">
                            <h2>
                                Annual Subscription
                            </h2>
                            <p>Most people choose this one</p>
                        </div>
                        <div class="price">
                            <div class="priceTag">
                                <span class="dollarSign">HK$ </span><span class="dollar">1,000</span><span class="cents">.0</span>
                            </div>
                            <br>
                                <span class="perUnit">Per Year</span>
                        </div>

                        <ul class="list-unstyled privilege-list">
                            <li>testing 1</li>
                            <li>testing 2</li>
                            <li>testing 3</li>
                        </ul>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet ex impedit labore maiores. Eligendi.
                        </p>

                        <a class="btn btn-info" data-toggle="modal" data-target="#annualForm">BUY NOW!!!</a>
                    </div>


                </div>
                <div class="col-sm-6">

                    <div class="center-block plans text-center">
                        <div class="heading">
                            <h2>
                                Buy Credit
                            </h2>
                            <p>with credit, you can communicate with your potential clients</p>
                        </div>
                        <div class="price">
                            <div class="priceTag">
                                <span class="dollarSign">HK$ </span><span class="dollar">10</span><span class="cents">.0</span>
                            </div>
                            <br>
                            <span class="perUnit">Per Credit</span>
                        </div>

                        <ul class="list-unstyled privilege-list">
                            <li>testing 1</li>
                            <li>testing 2</li>
                            <li>testing 3</li>
                        </ul>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eveniet ex impedit labore maiores. Eligendi.
                        </p>

                        <a class="btn btn-info" data-toggle="modal" data-target="#creditForm">BUY 10 NOW!!!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer clearfix">
            <a class="btn-default btn pull-right" href="/properties" id="nextButton" style="margin-right: 20px">I'll do it later</a>

        </div>
    </div>





    @include('back.layouts.partials.subscriptionModal')
    @include('back.layouts.partials.creditModal')
@endsection

{{--@section('scripts')--}}
    {{--<script>--}}

        {{--$("#numberOfCredit").change(function(){--}}
            {{--var number = $("#numberOfCredit").val();--}}
            {{--$("#totalAmount").text(number*10);--}}
        {{--});--}}

        {{--var     urlParams, result, match,--}}
                {{--pl     = /\+/g,  // Regex for replacing addition symbol with a space--}}
                {{--search = /([^&=]+)=?([^&]*)/g,--}}
                {{--decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },--}}
                {{--query  = window.location.search.substring(1);--}}
        {{--result=[];--}}
        {{--var getQuery = function(){--}}
            {{--urlParams = [];--}}
            {{--temp = {};--}}
            {{--while (match = search.exec(query)){--}}
                {{--temp[decode(match[1])] = decode(match[2]);--}}
                {{--urlParams.push(temp);--}}
            {{--}--}}
            {{--var theButton = $("a#nextButton");--}}
            {{--result = urlParams.filter(function(param){--}}
                {{--return Object.keys(param)[0] === "redirect";--}}
            {{--})--}}
            {{--if(result.length > 0){--}}
                {{--theButton.attr("href","/"+result[0].redirect);--}}
            {{--}--}}
        {{--}--}}


        {{--$(".payForm").submit(function(e){--}}
{{--//            e.preventDefault();--}}
            {{--var url, form, baseSuccessUrl, cardType, validCreditCard, baseFailUrl, baseErrorUrl;--}}
            {{--validCreditCard = true;--}}
            {{--cardType = "";--}}

{{--//            $(e.target.cardNo).validateCreditCard(function(result) {--}}
{{--//                if(result.card_type.name == 'visa' || result.card_type.name == "master")--}}
{{--//                {--}}
{{--//                    if(result.valid){--}}
{{--//                        validCreditCard = true;--}}
{{--//                        cardType = result.card_type.name--}}
{{--//                    }else{--}}
{{--//                        console.log("not valid")--}}
{{--//                    }--}}
{{--//                }else{--}}
{{--//                    console.log("the card type not support")--}}
{{--//                }--}}
{{--//            });--}}

            {{--if(validCreditCard){--}}


                {{--form = $(e.target);--}}

                {{--var baseUrls =[--}}
                    {{--{key:"successUrl", url:"http://avaluestay.dev/pSuccess"},--}}
                    {{--{key:"failUrl", url:"http://avaluestay.dev/pFail"},--}}
                    {{--{key:"errorUrl", url:"http://avaluestay.dev/pError"}--}}
                {{--]--}}
                {{--var amount =  parseInt( form.find("[name='quantity']").val() ) * parseInt( form.find("input[name='price']").val() )--}}

{{--//                form.find("input[name='pMethod']").val(cardType.toUpperCase());--}}
                {{--form.find("input[name='amount']").val(amount.toString());--}}

                {{--baseUrls.map(function(baseUrl){--}}
                    {{--url = baseUrl.url;--}}
                    {{--if(result.length > 0){--}}
                        {{--url += "?redirect="+result[0].redirect--}}
                    {{--}else{--}}
                        {{--url += "?redirect=messages";--}}
                    {{--}--}}
                    {{--url += "&type="+form.find("input[name='type']").val();--}}
                    {{--url += "&package="+form.find("input[name='package']").val();--}}
                    {{--url += "&sellerId="+form.find("input[name='sellerId']").val();--}}
                    {{--url += "&payeeId="+form.find("input[name='payeeId']").val();--}}
                    {{--url += "&quantity="+form.find("[name='quantity']").val();--}}
                    {{--url += "&price="+form.find("input[name='price']").val();--}}
                    {{--url += "&amount="+form.find("input[name='amount']").val();--}}
                    {{--url += "&pMethod="+form.find("input[name='pMethod']").val();--}}
                    {{--url += "&currCode="+form.find("input[name='currCode']").val();--}}
                    {{--form.find("input[name='"+baseUrl.key+"']").val(url);--}}
                {{--})--}}




            {{--}--}}
            {{--console.log(form);--}}
            {{--return true--}}
        {{--});--}}

        {{--if($("#creditForm select[name='quantity']").length > 0){--}}
            {{--$("span#subtotal").text(parseInt($("select[name='quantity']").val())*parseInt($("#creditForm input[name='price']").val()))--}}

            {{--$("select[name='quantity']").change(function(e){--}}
                {{--$("span#subtotal").text(parseInt($(e.target).val())*parseInt($("#creditForm input[name='price']").val()))--}}
            {{--})--}}
        {{--}--}}



    {{--</script>--}}
{{--@endsection--}}