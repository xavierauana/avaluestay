<?php

namespace avaluestay\Http\Controllers;

use avaluestay\Contracts\InvoiceInterface;
use avaluestay\Contracts\PropertyInterface;
use avaluestay\Http\Requests;

class ManagerController extends Controller
{
    private $properties;

    /**
     * ManagerController constructor.
     *
     * @param $properties
     */
    public function __construct(PropertyInterface $properties)
    {
        $this->properties = $properties;
        $this->middleware("hasRole:manager");
    }

    public function invoices(InvoiceInterface $invoices)
    {
        $invoices = $invoices->orderBy('created_at','desc')->get();
        return view("back.pages.manager.invoices", compact("invoices"));
    }

    public function showInvoice(InvoiceInterface $invoice, $orderId)
    {
        return view("back.pages.manager.invoiceDetail", ["invoice" => $invoice->findOrFail($orderId)]);
    }


    public function properties()
    {
        $properties = $this->properties->get();
        $properties = $properties->groupBy("approvalStatus");

        return view('back.pages.manager.properties', compact("properties"));
    }

    public function propertiesApproval($propertyId)
    {
        $property = $this->properties->findOrFail($propertyId);
        $property->approvalStatus = "approved";
        $property->save();

        return redirect("/manager/properties");
    }

    public function propertiesDisapproval($propertyId)
    {
        $property = $this->properties->findOrFail($propertyId);
        $property->approvalStatus = "pending";
        $property->save();

        return redirect("/manager/properties");
    }

    public function propertyShow($propertyId)
    {
        $property = $this->properties->findOrFail($propertyId);

        return view("back.pages.manager.propertyDetail", compact("property"));
    }
}
