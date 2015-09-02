<?php

namespace avaluestay\Http\Controllers;

use avaluestay\booking;
use avaluestay\Contracts\InvoiceInterface;
use avaluestay\Contracts\PropertyInterface;
use avaluestay\Http\Requests;
use avaluestay\Jobs\SendInvoicePaidEmail;
use avaluestay\service;
use avaluestay\serviceBooking;
use Illuminate\Http\Request;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

class InvoicesController extends Controller
{

    private $invoices;

    /**
     * InvoicesController constructor.
     *
     * @param $invoices
     */
    public function __construct(InvoiceInterface $invoices)
    {
        $this->invoices = $invoices;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request,
                          PropertyInterface $property,
                          booking $booking,
                          serviceBooking $serviceBooking,
                          service $service
    )
    {
        $ownerId = $property->findOrFail($request->get('propertyId'))->owner->id;
        $orderRef = generateRandomString();

        $invoiceData = [
            'serviceId' => $request->get('selectedServiceIds'),
            'payee_id'  => $request->user()->id,
            'seller_id' => $ownerId,
            'orderRef'  => $orderRef,
            'amount'    => $request->get('overallTotal')
        ];
        $newInvoice = $this->invoices->create($invoiceData);

        $bookingData = [
            'user_id'      => $request->user()->id,
            'property_id'  => $request->get('propertyId'),
            'invoice_id'   => $newInvoice->id,
            'price'        => $request->get('nightRate'),
            'checkInDate'  => convertToCarbonDate($request->get('checkInDate')),
            'checkOutDate' => convertToCarbonDate($request->get('checkOutDate')),
        ];
        $booking->create($bookingData);

        if (count($request->get('selectedServiceIds')) > 0) {
            $serviceData = [];
            foreach ($request->get('selectedServiceIds') as $serviceId) {
                $theService = $service->findOrFail($serviceId);
                $serviceData['service_id'] = $serviceId;
                $serviceData['user_id'] = $request->user()->id;
                if ($theService->type == 'onceoff') {
                    $serviceData['quantity'] = 1;
                }
                if ($theService->type == 'daily') {
                    $serviceData['quantity'] = $bookingData['checkOutDate']->diffInDays($bookingData['checkInDate']);
                }
                $serviceData['invoice_id'] = $newInvoice->id;
            }
            $serviceBooking->create($serviceData);
        }

        return [
            'response'   => 'completed',
            'orderRef'   => $orderRef,
            'propertyId' => $request->get('propertyId')
        ];

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int     $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function paymentSuccess(Request $request)
    {
        $ref = $request->get("Ref");
        $theInvoice = $this->invoices->where('orderRef', $ref)->first();
        $theInvoice->status = 'paid';
        $theInvoice->save();
        $message = "You successfully paid.";
        JavaScriptFacade::put(['successMessage' => $message]);

        $this->dispatchFrom(SendInvoicePaidEmail::class, $request);

        return redirect("/property/" . $request->get('property'));
    }

    public function paymentFail(Request $request)
    {
        dd($request);
    }

    public function paymentError(Request $request)
    {
        dd($request);
    }

    public function testing(Request $request)
    {

    }


}
