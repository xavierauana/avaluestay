@extends("back.layouts.default")

@section("content")

    <div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">{{$property->name}} :  the owner is {{$property->owner->name}}</h3>
		</div>
    	<div class="panel-body">
    	   <table class="table table-striped table-hover">
    	   	<tbody>
    	   		<tr>
    	   			<td>Currency</td>
    	   			<td>{{$property->currency->symbol}}</td>
    	   		</tr>
				<tr>
					<td>Property Name</td>
					<td>{{$property->name}}</td>
				</tr>
				<tr>
					<td>Property Description</td>
					<td>{{$property->summary}}</td>
				</tr>
				<tr>
					<td>Property Type</td>
					<td>{{$property->propertyType->type}}</td>
				</tr>
				<tr>
					<td>Property Address</td>
					<td>{{"$property->address1 , $property->address2 , $property->address3 "}}</td>
				</tr>
				<tr>
					<td>City and Country</td>
					<td>{{"$property->city, $property->country"}}</td>
				</tr>
				<tr>
					<td>Number of accomodates</td>
					<td>{{"$property->accommodates"}}</td>
				</tr>
				<tr>
					<td>Facilities</td>
					<td>
						@foreach($property->facilities as $facility)
							{{$facility->item}},
						@endforeach
					</td>
				</tr>
				<tr>
					<td>Services Provided</td>
					<td>
						<ul class="list-unstyled">
							@foreach($property->services as $service)
								<li>{{$service->name}} price is {{$service->price}}</li>
							@endforeach
						</ul>
					</td>
				</tr>
				<tr>
					<td>Property Photos</td>
					<td>
						<div class="row">
							@if($property->media()->whereTag('property')->first() )
								@foreach($property->media()->whereTag('property')->get() as $pic)
									<div class="col-xs-4 col-sm-3 col-md-2">
										<a href="{{$pic->link}}" target="_blank">
											<img src="{{$pic->link}}" class="img-responsive" alt="">
										</a>
									</div>
								@endforeach
							@endif
						</div>
					</td>
				</tr>
				<tr>
					<td>Neighbourhood Description</td>
					<td>{{$property->locationDescription}}</td>
				</tr>
				<tr>
					<td>Neighbourhood Photos</td>
					<td>
						<div class="row">
							@if($property->media()->whereTag('neighbourhood')->first() )
								@foreach($property->media()->whereTag('property')->get() as $pic)
									<div class="col-xs-4 col-sm-3 col-md-2">
										<a href="{{$pic->link}}" target="_blank">
											<img src="{{$pic->link}}" class="img-responsive" alt="">
										</a>
									</div>
								@endforeach
							@endif
						</div>
					</td>
				</tr>
    	   	</tbody>
    	   </table>
    	</div>
    </div>
    
@endsection