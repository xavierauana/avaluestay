<?php

namespace avaluestay\Http\Controllers;

use avaluestay\Contracts\ServiceInterface;
use avaluestay\property;
use Illuminate\Http\Request;

use avaluestay\Http\Requests;
use avaluestay\Http\Controllers\Controller;

class ServicesController extends Controller
{

    private $services;

    /**
     * ServicesController constructor.
     *
     * @param $services
     */
    public function __construct(ServiceInterface $services)
    {
        $this->services = $services;
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $propertyId)
    {
        if($request->get("name")){
            if(!$this->services->whereName($request->get("name"))->first()){
                $this->services->name = $request->get("name");
                $this->services->summary = $request->get("summary");
                $this->services->type = $request->get("type");
                $this->services->price = $request->get("price");
                $this->services->property_id = $propertyId;
                $this->services->save();
                return $this->services;
            }
            return ["already have it"];
        }
        return ["not created"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $service = $this->services->findOrFail($id);
        $service->delete();
        if($request->ajax()){
            return ['response'=>"completed"];
        }
    }

    public function updateServices(Request $request, $propertyId, $serviceId)
    {
        $service = $this->services->wherePropertyId($propertyId)->whereId($serviceId)->first();
        $service->name = $request->get("name");
        $service->summary = $request->get("summary");
        $service->type = $request->get("type");
        $service->price = $request->get("price");
        $service->property_id = $propertyId;
        $service->save();
        return $service;
    }
}
