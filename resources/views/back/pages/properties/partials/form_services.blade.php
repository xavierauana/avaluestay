@inject('services','avaluestay\Contracts\ServiceInterface')

<div class="col-xs-12">

    <legend>Do you provided any services</legend>
    @if(count($propertyServices = $services->wherePropertyId($theProperty->id)->get()) > 0)
        @foreach($propertyServices as $service)
            <fieldset class="completedSet">
                <form action="/properties/{{$theProperty->id}}/services/{{$service->id}}" method="PATCH" class="form_services autoSubmit" role="form" >
                    <input type="hidden" name="formname" value="form_services">
                    <input type="hidden" name="propertyId" value="{{$theProperty->id}}">
                    <div class="form-group">
                        <label for="name">Service Name</label>
                        <input value="{{$service->name}}" type="text" class="form-control" name="name" id="name" placeholder="Be simple and descriptive" required>
                    </div>
                    <div class="form-group">
                        <label for="summary">Service Description</label>
                        <textarea type="text" class="form-control editable" name="summary" id="summary" placeholder="Be simple and descriptive" required>{{$service->summary}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="type">Charing Type</label>
                                <select type="text" class="form-control" name="type" id="type" placeholder="Be simple and descriptive">
                                    <option value="daily" @if($service->name == "daily") Selected @endif>Daily</option>
                                    <option value="onceoff" @if($service->name == "onceoff") Selected @endif>Once Off</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="price">Unit Price</label>
                                <input value="{{$service->price}}" type="integer" required class="form-control" name="price" id="price" placeholder="Be simple and descriptive">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="deleteButton clearfix">
                    <button class="btn btn-danger pull-right btn-sm" data-id="{{$service->id}}" data-url="services" v-on="click: deleteItem">Delete this service</button>
                </div>
                <hr>
            </fieldset>
        @endforeach
        @include('back.pages.properties.partials.template_serviceForm')
    @else
        <fieldset class="serviceTemplate completedSet">
            <form action="/properties/{{$theProperty->id}}/services/" method="POST" class="form_services autoSubmit" role="form" >
                <input type="hidden" name="formname" value="form_services">
                <input type="hidden" name="propertyId" value="{{$theProperty->id}}">
                <div class="form-group">
                    <label for="name">Service Name</label>
                    <input value="" type="text" class="form-control" name="name" id="name" placeholder="Be simple and descriptive" required>
                </div>
                <div class="form-group">
                    <label for="summary">Service Description</label>
                    <textarea value="" type="text" class="form-control" name="summary" id="summary" placeholder="Be simple and descriptive" required></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="type">Charing Type</label>
                            <select value="" type="text" class="form-control" name="type" id="type" placeholder="Be simple and descriptive">
                                <option value="daily">Daily</option>
                                <option value="onceoff">Once Off</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="price">Unit Price</label>
                            <input value="" type="integer" required class="form-control" name="price" id="price" placeholder="Be simple and descriptive">
                        </div>
                    </div>
                </div>
            </form>
            <div class="deleteButton clearfix">
                <button class="btn btn-danger pull-right btn-sm" data-id="" data-url="services" v-on="click: deleteItem">Delete this service</button>
            </div>
            <hr>
        </fieldset>
        @include('back.pages.properties.partials.template_serviceForm')
    @endif
    <button class="btn btn-primary btn-block" v-on="click: addMoreService">Add More</button>


</div>
