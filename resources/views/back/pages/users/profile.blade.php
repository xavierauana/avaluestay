@extends("back.layouts.default")

@section("content")
    <div class="panel panel-default">
    	  <div class="panel-heading">
    			<h3 class="panel-title">My Account</h3>
    	  </div>
    	  <div class="panel-body">
              <form action="{{route("users.update", Auth::user()->id)}}" method="PATCH" role="form">
                  {{csrf_field()}}
              	<legend>Change Your Info</legend>

              	<div class="form-group">
              		<label for="name">Name</label>
              		<input type="text" value="{{Auth::user()->name}}" class="form-control" name="name" id="name" placeholder="Full Name" required>
              	</div>
              	@if(Auth::user()->type == "suser")
                    <h4>You are a annual subscription user. And your privileges will expired on {{Auth::user()->expiry_date->toFormattedDateString()}} </h4>
				  	<a class="btn btn-info" data-toggle="modal" data-target="#annualForm" data-package="suser">Extend for another year NOW!!!</a>

				  @endif
              	@if(Auth::user()->type == "cuser")
                    <h4>You are a credit user. You have {{Auth::user()->credit}} credits remain. </h4>


                @endif
              	<button type="submit" class="btn btn-primary">Change Name</button>
              </form>
    	  </div>
    </div>

	@include('back.layouts.partials.subscriptionModal')

	<!-- Credit Modal -->
	<div class="modal fade center-screen" id="creditForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Payment</h4>
				</div>
				<form action="" class="entryForm">
					<div class="modal-body">
						<label for="numberOfCredit">
							How many credit you want to buy?
						</label>
						<select name="numberOfCredit" id="numberOfCredit">
							@for($i=1; $i<50; $i++)
								<option value="{{$i*10}}">{{$i*10}}</option>
							@endfor
						</select>

						<h4>The total amount will be $<span id="totalAmount"></span> </h4>

						<input class="form-control" id="creditCard" name="creditCard" placeholder="credit card" required>
						<input class="form-control" id="cardHolder" name="cardHolder" placeholder="Name on card" required>
						<input class="form-control" id="ccv" name="ccv" placeholder="ccv" required>
						<div class="col-xs-6">
							<select class="form-control" id="expiryMonth" name="expiryMonth" required>
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						</div>
						<div class="col-xs-6">
							<select class="form-control" id="expiryYear" name="expiryYear" required>
								@for($i = 2015; $i <=2025; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>

						</div>
						<input type="hidden" name="package" value="suser">


                        <pre>
                            Card Number 4335900000140045
                            securityCode 123
                            cardHolder testing card
                            epMonth 07
                            epYear 2020
                        </pre>


					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Buy</button>
					</div>
				</form>
			</div>
		</div>
	</div>



@endsection