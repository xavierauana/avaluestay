@extends("back.layouts.default")

@section("content")

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Invoices</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Owner</th>
                    <th>Tenant</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Amount</th>
                    <th class="hidden-sm hidden-xs ">Reference</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{$invoice->owner->name}}</td>
                        <td>{{$invoice->tenant->name}}</td>
                        <td>{{$invoice->booking->checkInDate->format('d M y')}}</td>
                        <td>{{$invoice->booking->checkOutDate->format('d M y')}}</td>
                        <td>{{$invoice->amount}}</td>
                        <td class="hidden-sm hidden-xs ">
                            <a href="/manager/invoices/{{$invoice->id}}" target="_blank">
                                {{$invoice->orderRef}}
                            </a>
                        </td>
                        <td>
                            @if($invoice->status == 'pending')
                                <a href="/manager/invoices/{{$invoice->id}}" target="_blank">
                                    <span class="label label-warning">Pending</span>
                                </a>
                            @elseif($invoice->status == 'paid')
                                <a href="/manager/invoices/{{$invoice->id}}" target="_blank">
                                    <span class="label label-success">Paid</span>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection