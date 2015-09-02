@inject("facilities", "avaluestay\facility")

<form action="/properties/{{$theProperty->id}}" method="PATCH" id="form_facilities" role="form" class="autoSubmit">
    <input type="hidden" name="formname" value="form_facilities">
    <input type="hidden" name="propertyId" value="{{$theProperty->id}}">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @foreach($facilities->distinct()->lists('type') as $type)
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{$type}}
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        @foreach($facilities->whereType($type)->get() as $item)
                            <label for="">
                                {{$item->item}}
                                <input type="checkbox" name="facilities[{{$item->id}}]" @if(in_array($item->id, $theProperty->facilities()->lists("id")->toArray())) checked @endif>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</form>
