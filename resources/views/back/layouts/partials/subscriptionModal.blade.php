<!-- Subscription Modal -->
<div class="modal fade center-screen" id="annualForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Payment</h4>
            </div>
            <form name="payForm" class="payForm" method="post" action="https://test.paydollar.com/b2cDemo/eng/dPayment/payComp.jsp">
                <form name="payForm" method="post" action="https://test.paydollar.com/b2cDemo/eng/payment/payForm.jsp">
                <div class="modal-body">
                    We are going to charge you <strong>$<span id="paymentAmount">1,000</span></strong>
                    <br>
                    please input your information below


                    <input type="hidden" name="merchantId" value="{{env("MERCHAINT_ID")}}">
                    <input type="hidden" name="amount" value="" >
                    <input type="hidden" name="orderRef" value="{{generateRandomString()}}">
                    <input type="hidden" name="currCode" value="{{env("BASE_CURRENCY_CODE")}}" >
                    <input type="hidden" name="pMethod" value="VISA" >
                    <input type="hidden" name="payType" value="N" >
                    <input type="hidden" name="successUrl" value="">
                    <input type="hidden" name="failUrl" value="http://avaluestay.dev/pFail">
                    <input type="hidden" name="errorUrl" value="http://avaluestay.dev/pError">
                    <input type="hidden" name="lang" value="E">
                    <input type="hidden" name="secureHash" value="44f3760c201d3688440f62497736bfa2aadd1bc0">
                    <input type="hidden" name="payeeId" value="{{Auth::user()->id}}">
                    <input type="hidden" name="sellerId" value="1">
                    <input type="hidden" name="type" value="subscription">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="price" value="1000">
                    <input type="hidden" name="package" value="suser">

                    @include('back.layouts.partials.creditCardEntries')
                    @include("back.layouts.partials.sampleCreditCard")


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buy</button>
                </div>
            </form>
        </div>
    </div>
</div>
