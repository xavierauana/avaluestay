@extends("front.layouts.default")

@section('content')
    @include('front.layouts.partials.housesFilters')
    @if(count($properties)>0)
        @foreach($properties as $property)
            <div class="row main-item">
                <div class="col-md-7">
                    <a href="/property/{{$property->id}}">
                        @if(count($property->media()->whereTag('property')->get())>0)
                            <img src="{{$property->media()->whereTag('property')->first()->link}}" class="img-responsive" alt="">
                        @endif
                        <div class="description">
                                <span>
                                    @for($i=0; $i< floor($property->rating()); $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @if( $property->rating() > floor($property->rating()))
                                        <i class="fa fa-star-half"></i>
                                    @endif
                                    @for($i=0; $i< 5-ceil($property->rating()); $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                </span>
                            <p>
                                {!! substr($property->summary, 0, 50)  !!}
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-5">
                    <iframe frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?q={{urlencode($property->address())}}&key=AIzaSyDcuVH7UBoLjGkZ6_O2RHlrVbWUwr6zmXA" allowfullscreen></iframe>
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('scripts')
    @parent

    <script>
        var checkInInput, checkOutInput, accommodates;
        checkInInput = $('#checkInDate');
        checkOutInput = $('#checkOutDate');
        accommodates = $('#accommodates');
        console.log(accommodates);

        checkInInput.datetimepicker({
            format: 'DD MMMM YYYY',
            useCurrent: false, //Important! See issue #1075
            minDate: moment()
        });
        checkOutInput.datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'DD MMMM YYYY'
        });
        checkInInput.on("dp.change", function (e) {
            checkOutInput.data("DateTimePicker").minDate(e.date);
        });
        checkOutInput.on("dp.change", function (e) {
            checkInInput.data("DateTimePicker").maxDate(e.date);
        });

        if(avaluestay.checkInDate){
            checkInInput.val(avaluestay.checkInDate);
        }else{
            console.log("no check in date")
        }
        if(avaluestay.checkOutDate){
            checkOutInput.val(avaluestay.checkOutDate);
        }else{
            console.log("no check out date")
        }
        if(avaluestay.accommodates){

            accommodates.findOne('option').filter(function() {
                //may want to use $.trim in here
                console.log($(this).attr('value'));
                return $(this).attr('value') == avaluestay.accommodates;
            }).prop('selected', true);
        }else{
            console.log("no accommodates")
        }
    </script>
@endsection