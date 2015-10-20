@extends("back.layouts.default")

@section("content")

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Invoice Ref: {{$invoice->orderRef}}

            </h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <tbody>
                <tr>
                    <td>Invoice Status</td>
                    <td>
                        @if($invoice->status == 'pending')
                            <span class="label label-warning">Pending</span>
                        @elseif($invoice->status == 'paid')
                            <span class="label label-success">Paid</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Property Name</td>
                    <td>
                        <a href="/manager/property/{{$invoice->booking->property->id}}/show/" target="_blank">
                            {{$invoice->booking->property->name}}
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>HK$ {{$invoice->booking->price}} per night</td>
                </tr>
                <tr>
                    <td>Check In Date</td>
                    <td>{{$invoice->booking->checkInDate->format('d F Y')}}</td>
                </tr>
                <tr>
                    <td>Check Out Date</td>
                    <td>{{$invoice->booking->checkOutDate->format('d F Y')}}</td>
                </tr>
                <tr>
                    <td>Duration</td>
                    <td>{{$invoice->booking->checkOutDate->diffInDays($invoice->booking->checkInDate)}} days</td>
                </tr>
                <tr>
                    <td>Service Booked</td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach( $invoice->bookedServices as $booking)
                                <li>
                                        {{$booking->quantity}}  {{$booking->service->name}} @ HK$ {{$booking->service->price}} each
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Invoice Create at</td>
                    <td>
                        {{$invoice->create_at->format('d F Y h:i a')}} HK Time
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    
@endsection