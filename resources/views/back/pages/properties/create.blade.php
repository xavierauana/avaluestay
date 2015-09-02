@inject("roomTypes","avaluestay\Contracts\RoomInterface")
@inject("propertyTypes","avaluestay\Contracts\PropertyTypeInterface")
@extends("back.layouts.default")

@section("content")

    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Create a new property listing</h1>
        </div>
    	<div class="panel-body">
            <form action="{{route('properties.store')}}" method="post" role="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="propertyType_id">Property Type</label>
                    <select class="form-control" name="propertyType_id" id="propertyType_id" required>
                        @foreach($propertyTypes->lists("type", "id") as $val=>$type)
                            <option value="{{$val}}">{{$type}}</option>
                        @endforeach
                    </select>
                    {!!  $errors->first("propertyType_id","<span class='input-error'>:message</span>") !!}
                </div>

                <div class="form-group">
                    <label for="roomType_id">Room Type</label>
                    <select class="form-control" name="roomType_id" id="roomType_id" required>
                        @foreach($roomTypes->lists("type", "id") as $val=>$type)
                            <option value="{{$val}}">{{$type}}</option>
                        @endforeach
                    </select>
                    {!!  $errors->first('roomType_id',"<span class='input-error'>:message</span>") !!}

                </div>

                <div class="form-group">
                    <label for="accommodates">Accommodates</label>
                    <select class="form-control" name="accommodates" id="roomType" required>
                        @for($i = 1; $i<=17; $i++)
                            <option value="{{$i}}"> @if($i==17) 16+ @else {{$i}} @endif</option>
                        @endfor
                    </select>
                    {!!  $errors->first('accommodates',"<span class='input-error'>:message</span>") !!}

                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" placeholder="Hong Kong" required>
                    {!!  $errors->first('city',"<span class='input-error'>:message</span>") !!}
                </div>
                <button type="submit"  class="btn btn-default">Continue</button>
            </form>
    	</div>
    </div>

@endsection