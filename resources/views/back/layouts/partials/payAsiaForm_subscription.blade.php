<form name="payForm" method="post" action="https://test.paydollar.com/b2cDemo/eng/dPayment/payComp.jsp">
{{--<form name="payForm" method="post" action="https://test.paydollar.com/b2cDemo/eng/payment/payForm.jsp">--}}
    <input type="hidden" name="merchantId" value="88122318">
    <input type="hidden" name="amount" value="" >
    <input type="hidden" name="orderRef" value="">
    <input type="hidden" name="currCode" value="344" >
    <input type="hidden" name="pMethod" value="" >
    <input type="hidden" name="cardNo" value="" >
    <input type="hidden" name="securityCode" value="" >
    <input type="hidden" name="cardHolder" value="" >
    <input type="hidden" name="epMonth" value="" >
    <input type="hidden" name="epYear" value="" >
    <input type="hidden" name="payType" value="N" >
    <input type="hidden" name="successUrl" value="">
    <input type="hidden" name="failUrl" value="http://avaluestay.dev/pFail">
    <input type="hidden" name="errorUrl" value="http://avaluestay.dev/pError">
    <input type="hidden" name="lang" value="E">
    <input type="hidden" name="secureHash" value="44f3760c201d3688440f62497736bfa2aadd1bc0">
    <input type="hidden" name="userId" value="{{Auth::user()->id}}">
    <input type="hidden" name="for" value="">
    <input type="hidden" name="secureHash" value="44f3760c201d3688440f62497736bfa2aadd1bc0">
</form>