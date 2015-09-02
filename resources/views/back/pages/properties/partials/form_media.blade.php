<form action="/properties/{{$theProperty->id}}/media"
      class="dropzone dz-clickable"
      id="my-awesome-dropzone">
      {{csrf_field()}}
      <input type="hidden" name="property_id" value="{{$theProperty->id}}">
      <input type="hidden" name="tag" value="property">
</form>