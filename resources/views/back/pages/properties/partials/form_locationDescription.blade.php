<form action="/properties/{{$theProperty->id}}" method="PATCH" id="form_locationDescription" role="form" class="autoSubmit clearfix">
    <input type="hidden" name="formname" value="form_locationDescription">
    <input type="hidden" name="propertyId" value="{{$theProperty->id}}">

    <div class="form-group">
        <label for="locationDescription" class="col-sm-2 control-label">Descript your property location</label>
        <div class="col-sm-10">
            <textarea name="locationDescription" id="locationDescription" rows="10" class="form-contorl editable" title="" required="required" data-placeholder="Please describe your location">{{$theProperty->locationDescription}}</textarea>
            {!!  $errors->first('locationDescription',"<span class='input-error'>:message</span>") !!}
        </div>
    </div>
</form>

<br>

<div class="clearfix" >
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Upload some pics about your surrounding</label>
        <div class="col-sm-10">
            <form style="margin-top: 20px" action="/properties/{{$theProperty->id}}/media"
                  class="dropzone dz-clickable"
                  id="my-awesome-dropzone2">
                {{csrf_field()}}
                <input type="hidden" name="property_id" value="{{$theProperty->id}}">
                <input type="hidden" name="tag" value="location">
            </form>
        </div>
    </div>
</div>
