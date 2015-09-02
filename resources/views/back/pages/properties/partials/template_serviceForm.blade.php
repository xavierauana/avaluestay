<fieldset class="hidden">
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
                    <select class="form-control" name="type" id="type">
                        <option value="daily">Daily</option>
                        <option value="onceoff">Once Off</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="price">Unit Price</label>
                    <input value="" type="number" required class="form-control" name="price" id="price" placeholder="Be simple and descriptive">
                </div>
            </div>
        </div>
    </form>
    <div class="deleteButton clearfix">
        <button class="btn btn-danger pull-right btn-sm" data-id="" data-url="services" v-on="click: deleteItem">Delete this service</button>
    </div>
    <hr>
</fieldset>
