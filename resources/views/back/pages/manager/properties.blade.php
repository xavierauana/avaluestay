@extends("back.layouts.default")

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @if($properties->has("pending"))
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Pending for approval
                                    <span class="badge pull-right">{{$properties->get("pending")->count()}}</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Property Name</th>
                                        <th>User</th>
                                        <th>Account Type</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($properties->get('pending') as $property)
                                        <tr>
                                            <td><a target="_blank"  href="/manager/property/{{$property->id}}/show">{{$property->name}}</a></td>
                                            <td><a target="_blank" href="/users/{{$property->owner->id}}/show">{{$property->owner->name}}</a></td>
                                            <td>{{$property->owner->type}}</td>
                                            <td><a href="/manager/property/{{$property->id}}/approval" class="btn btn-success btn-sm">Approve</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                @if($properties->has("approved"))
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    Approved Property
                                    <span class="badge pull-right">{{$properties->get("approved")->count()}}</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Property Name</th>
                                        <th>User</th>
                                        <th>Account Type</th>
                                        <th>Is Listing</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($properties->get('approved') as $property)
                                        <tr>
                                            <td><a target="_blank"  href="/manager/property/{{$property->id}}/show">The property: {{$property->name}}</a></td>
                                            <td><a target="_blank" href="/users/{{$property->owner->id}}/show">{{$property->owner->name}}</a></td>
                                            <td>{{$property->owner->type}}</td>
                                            <td>
                                                @if($property->listingStatus == "unlisted") <p class="text-warning">NO</p> @endif
                                                @if($property->listingStatus == "listing") <p class="text-success">YES</p> @endif
                                            </td>
                                            <td><a href="/manager/property/{{$property->id}}/disapproval" class="btn btn-warning btn-sm">Disapprove</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection