<form action="/properties/{{$theProperty->id}}" method="PATCH" id="form_description" role="form" class="autoSubmit">
	<input type="hidden" name="formname" value="form_description">
	<input type="hidden" name="propertyId" value="{{$theProperty->id}}">
	<legend>Tell customer about your property</legend>

	<div class="form-group">
		<label for="name">Property Name</label>
		<input value="{{$theProperty->name}}" type="text" class="form-control" name="name" id="name" placeholder="Be simple and descriptive">
	</div>
    <div class="form-group">
		<label for="summary">Summary</label>
        <textarea class="form-control editable" name="summary" id="summary" cols="30" rows="10" placeholder="Tell travelers what you love about the space. You can include details about the decor, the amenities it includes, and the neighborhood.">{{$theProperty->summary}}</textarea>
	</div>
</form>