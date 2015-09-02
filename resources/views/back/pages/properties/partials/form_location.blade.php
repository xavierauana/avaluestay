<form action="/properties/{{$theProperty->id}}" method="PATCH" id="form_location" role="form" class="autoSubmit">
    <input type="hidden" name="formname" value="form_location">
    <input type="hidden" name="propertyId" value="{{$theProperty->id}}">

    <div class="form-group">
        <label for="address1" class="col-sm-2 control-label">Address 1</label>
        <div class="col-sm-10">
            <input type="text" name="address1" id="address1" class="form-control" value="{{$theProperty->address1}}" title="" required="required" >
            {!!  $errors->first('address1',"<span class='input-error'>:message</span>") !!}
        </div>
    </div>
    <div class="form-group">
        <label for="address2" class="col-sm-2 control-label">Address 1</label>
        <div class="col-sm-10">
            <input type="text" name="address2" id="address2" class="form-control" value="{{$theProperty->address2}}" title="" required="required" >
            {!!  $errors->first('address2',"<span class='input-error'>:message</span>") !!}
        </div>
    </div>
    <div class="form-group">
        <label for="address3" class="col-sm-2 control-label">Address 3</label>
        <div class="col-sm-10">
            <input type="text" name="address3" id="address3" class="form-control" value="{{$theProperty->address3}}" title="" required="required" >
            {!!  $errors->first('address3',"<span class='input-error'>:message</span>") !!}
        </div>
    </div>
    <div class="form-group">
        <label for="city" class="col-sm-2 control-label">City</label>
        <div class="col-sm-10">
            <input type="text" name="city" id="city" class="form-control" value="{{$theProperty->city}}" title="" required="required" >
            {!!  $errors->first('city',"<span class='input-error'>:message</span>") !!}
        </div>
    </div>
    <div class="form-group">
        <label for="country" class="col-sm-2 control-label">Country</label>
        <div class="col-sm-10">
            <input type="text" name="country" id="country" class="form-control" value="{{$theProperty->country}}" title="" required="required" >
            {!!  $errors->first('country',"<span class='input-error'>:message</span>") !!}
        </div>
    </div>
</form>

