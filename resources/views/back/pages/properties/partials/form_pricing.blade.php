<form action="/properties/{{$theProperty->id}}" method="PATCH" id="form_pricing" role="form" class="autoSubmit">
	<input type="hidden" name="formname" value="form_pricing">
	<input type="hidden" name="propertyId" value="{{$theProperty->id}}">

	<legend>Pricing</legend>

	<div class="form-group">
		<label for="pricing">Base Charge per nignt</label>
		<input type="number" class="form-control" name="pricing" id="pricing" value="{{$theProperty->price}}" placeholder="Amount in {{$theProperty->currency->symbol}}">
	</div>
</form>