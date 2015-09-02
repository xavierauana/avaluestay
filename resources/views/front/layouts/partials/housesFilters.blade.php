<section>
    <h1 class="page-title">
        House
    </h1>
    <div class="row">
        <div class="col-xs-3">
            <h4 class="sub-title">
                Date
            </h4>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="checkInDate" id="checkInDate" value="" placeholder="Check In Date">
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="checkOutDate" id="checkOutDate" value="" placeholder="Check Out Date">
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="accommodates" id="accommodates">
                <option value="1">1 guest</option>
                <option value="2">2 guests</option>
                <option value="3">3 guests</option>
                <option value="4">4 guests</option>
                <option value="5">5 guests</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <h4 class="sub-title">
                Room Type
            </h4>
        </div>
        <div class="col-xs-9">
            <select class="form-control" name="numberOfGuest">
                <option value="1">Entire House</option>
                <option value="2">Private Room</option>
                <option value="3">Shared Room</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <h4 class="sub-title">
                Price Range
            </h4>
        </div>
        <div class="col-xs-9">
            <p>
                <label for="amount">Price range:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>

            <div id="slider-range"></div>
            <p id="min-value"></p>
            <p id="max-value"></p>
        </div>
    </div>
</section>