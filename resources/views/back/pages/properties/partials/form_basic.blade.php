@inject("roomTypes","avaluestay\Contracts\RoomInterface")
@inject("propertyTypes","avaluestay\Contracts\PropertyTypeInterface")
@inject("currencies","avaluestay\Contracts\CurrencyInterface")

<form action="/properties/{{$theProperty->id}}" method="PATCH" role="form" class="autoSubmit">
    <input type="hidden" name="formname" value="form_basic">
    <input type="hidden" name="propertyId" value="{{$theProperty->id}}">
    <div class="form-group">
        <label for="propertyType_id">Property Type</label>
        <select class="form-control" name="propertyType_id" id="propertyType_id" required>
            @foreach($propertyTypes->lists("type", "id") as $val=>$type)
                <option value="{{$val}}" @if($theProperty->propertyType_id == $val) selected @endif>{{$type}}</option>
            @endforeach
        </select>
        {!!  $errors->first('propertyType_id',"<span class='input-error'>:message</span>") !!}
    </div>

    <div class="form-group">
        <label for="roomType_id">Room Type</label>
        <select class="form-control" name="roomType_id" id="roomType_id" required>
            @foreach($roomTypes->lists("type", "id") as $val=>$type)
                <option value="{{$val}}" @if($theProperty->roomType_id == $val) selected @endif>{{$type}}</option>
            @endforeach
        </select>
        {!!  $errors->first('roomType_id',"<span class='input-error'>:message</span>") !!}

    </div>

    <div class="form-group">
        <label for="beds">Number of Beds</label>
        <select class="form-control" name="beds" id="beds" required>
            @for($i = 1; $i<6; $i++)
                <option value="{{$i}}" @if($theProperty->beds == $i) selected @endif> {{$i}} beds</option>
            @endfor
        </select>
        {!!  $errors->first('beds',"<span class='input-error'>:message</span>") !!}
    </div>

    <div class="form-group">
        <label for="accommodates">Accommodates</label>
        <select class="form-control" name="accommodates" id="accommodates" required>
            @for($i = 1; $i<=17; $i++)
                <option value="{{$i}}" @if($theProperty->accommodates == $i) selected @endif> @if($i==17) 16+ @else {{$i}} @endif</option>
            @endfor
        </select>
        {!!  $errors->first('accommodates',"<span class='input-error'>:message</span>") !!}
    </div>

    {{--<div class="form-group">--}}
        {{--<label for="currency_id">Preferred Currency</label>--}}
        {{--<select class="form-control" name="currency_id" id="roomType" required>--}}
            {{--@foreach($currencies->get() as $currency)--}}
                {{--<option value="{{$currency->id}}" @if($theProperty->currency_id == $currency->id) selected @endif> {{$currency->symbol}} </option>--}}
            {{--@endforeach--}}
        {{--</select>--}}
        {{--{!!  $errors->first('currency_id',"<span class='input-error'>:message</span>") !!}--}}
    {{--</div>--}}
</form>
