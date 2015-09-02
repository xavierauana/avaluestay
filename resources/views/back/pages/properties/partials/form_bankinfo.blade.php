<form action="/bankinfo/{{$theProperty->id}}" method="PATCH" id="form_bankinfo" role="form" class="autoSubmit">
    <input type="hidden" name="formname" value="form_bankinfo">
    <input type="hidden" name="propertyId" value="{{$theProperty->id}}">
    <legend>Please input our banking information, so that we can give you back the money!</legend>
    <div class="form-group">
        <label for="bank_name">Bank Name</label>
        <input value="{{$theProperty->bank->bank_name}}" type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Your Bank Name">
    </div>
    <div class="form-group">
        <label for="bank_address">Bank Address</label>
        <input value="{{$theProperty->bank->bank_address}}" type="text" class="form-control" name="bank_address" id="bank_address" placeholder="Your Bank Name">
    </div>
    <div class="form-group">
        <label for="acct_name">Account Name</label>
        <input value="{{$theProperty->bank->acct_name}}" type="text" class="form-control" name="acct_name" id="acct_name" placeholder="Your Bank Name">
    </div>
    <div class="form-group">
        <label for="acct_number">Account Number</label>
        <input value="{{$theProperty->bank->acct_number}}" type="text" class="form-control" name="acct_number" id="acct_number" placeholder="Your Bank Name">
    </div>
    <div class="form-group">
        <label for="iban">IBAN</label>
        <input value="{{$theProperty->bank->iban}}" type="text" class="form-control" name="iban" id="iban" placeholder="Your Bank Name">
    </div>
    <div class="form-group">
        <label for="swift_code">Swift Code</label>
        <input value="{{$theProperty->bank->swift_code}}" type="text" class="form-control" name="swift_code" id="swift_code" placeholder="Your Bank Name">
    </div>
</form>