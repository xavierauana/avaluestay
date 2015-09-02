<!-- this is the search section, i am not sure how you proceed the searching so I don't even make it a form -->
<section class="input-box">

    <form class="form-inline" method="get">
        <div class="col-sm-6">
            <input type="text" class="" name="destination" id="destination" required placeholder="Your Destination: Hong Kong, Paris, Bangkok...">
            {!! $errors->first("destination", "<span class='input-error'>:message</span>") !!}
        </div>
        <div class="col-sm-2">
            <input type="text" class="" name="checkInDate" id="checkInDate" placeholder="Check In">
        </div>
        <div class="col-sm-2">
            <input type="text" class="" name="checkOutDate" id="checkOutDate" placeholder="Check Out">
        </div>
        <div class="col-sm-1 styled-select">
            <select name="accommodates" class="">
                <option value="1" selected>  1 Person</option>
                <option value="2">  2 Persons</option>
                <option value="3">  3 Persons</option>
                <option value="4">  4 Persons</option>
                <option value="5">  5 Persons</option>
            </select>
        </div>

        <div class="col-sm-1">
            <button type="submit" class="btn btn-default btn-search">search</button>
        </div>
        {{csrf_field()}}
    </form>
</section>
<!-- end searh search -->

@section("scripts")
    @parent
    <script>
        $('#checkInDate').datetimepicker({
            format: 'DD MMMM YYYY',
            useCurrent: false, //Important! See issue #1075
            minDate: moment()
        });
        $('#checkOutDate').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'DD MMMM YYYY'
        });
        $("#checkInDate").on("dp.change", function (e) {
            $('#checkOutDate').data("DateTimePicker").minDate(e.date);
        });
        $("#checkOutDate").on("dp.change", function (e) {
            $('#checkInDate').data("DateTimePicker").maxDate(e.date);
        });



    </script>
@endsection