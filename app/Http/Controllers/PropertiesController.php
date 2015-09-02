<?php

namespace avaluestay\Http\Controllers;

use avaluestay\bankinfo;
use avaluestay\Contracts\BankInfoInterface;
use avaluestay\Contracts\PropertyInterface;
use avaluestay\Contracts\PropertyTypeInterface;
use avaluestay\Contracts\RoomInterface;
use avaluestay\Services\MediaManagementServices;
use Illuminate\Http\Request;

use avaluestay\Http\Requests;
use avaluestay\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

class PropertiesController extends Controller
{

    private $properties;

    /**
     * PropertiesController constructor.
     *
     * @param $properties
     */
    public function __construct(PropertyInterface $properties)
    {
        $this->properties = $properties;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $properties = $this->properties->whereUserId(Auth::user()->id)->get();
        $properties = $properties->groupBy("approvalStatus");

        return view("back.pages.properties.myListing",compact("properties"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("back.pages.properties.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, PropertyTypeInterface $pType, RoomInterface $rType, BankInfoInterface $bank )
    {
            $rules = [
                "propertyType" => "required|in:".implode(",",$pType->lists('id')->toArray()),
                "roomType" => "required|in:".implode(",",$rType->lists('id')->toArray()),
                "accommodates" => "required|between:1,17",
                "city" => "required",
            ];
            $this->validate($request,$rules);
            $this->properties->user_id = Auth::user()->id;
            $this->properties->propertyType_id = $request->get("propertyType");
            $this->properties->roomType_id = $request->get("roomType");
            $this->properties->bedType_id = 1;
            $this->properties->commission_id = 1;
            $this->properties->accommodates = $request->get("accommodates");
            $this->properties->city = $request->get("city");
            $this->properties->currency_id = env("BASE_CURRENCY_CODE");
            $this->properties->save();
            $bank->property_id = $this->properties->id;
            $bank->save();


            return redirect("/properties/next/".$this->properties->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        if($request->ajax()){
            return $this->properties->findOrFail($id)->toArray();
        }
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
    public function update(Request $request, $propertyId)
    {
//        if($request->ajax()){
            if($request->has("formname")){

                switch($request->get('formname')){
                    case "form_basic":
                        return $this->updatePropertyBasic($request, $propertyId);
                        break;
                    case "form_location":
                        return $this->updatePropertyLocation($request, $propertyId);
                        break;
                    case "form_description":
                        return $this->updatePropertyDescription($request, $propertyId);
                        break;
                    case "form_facilities":
                        return $this->updatePropertyFacilities($request, $propertyId);
                        break;
                    case "form_pricing":
                        return $this->updatePropertyPricing($request, $propertyId);
                        break;
                    case "form_locationDescription":
                        return $this->updatePropertyLocationDescription($request, $propertyId);
                        break;
                }

                return ['response'=>$request->get('formname')." don't have this operation"];
            }
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function registrationNext($propertyId)
    {
        $theProperty = $this->getThePropertyWithRightOwner($propertyId);
        if($theProperty){
            return view("back.pages.properties.nextCreateSteps", compact("theProperty"));
        }
    }

    private function updatePropertyLocation(Request $request, $propertyId)
    {
        $property = $this->getThePropertyWithRightOwner($propertyId);
        $property->address1 = $request->get('address1');
        $property->address2 = $request->get('address2');
        $property->address3 = $request->get('address3');
        $property->city = $request->get('city');
        $property->country = $request->get('country');
        $property->save();
        return $property;
    }

    private function updatePropertyDescription(Request $request, $propertyId)
    {
        $property = $this->getThePropertyWithRightOwner($propertyId);
        $property->name = $request->get('name');
        $property->summary = $request->get('summary');
        $property->save();
        return $property;
    }

    private function updatePropertyFacilities(Request $request, $propertyId)
    {
        $property = $this->getThePropertyWithRightOwner($propertyId);
        $facilityIds = [];
        if($request->has("facilities")){
            $facilityIds = array_keys($request->get("facilities"));
        }
        $property->facilities()->sync($facilityIds);

        return $property;
    }

    private function updatePropertyBasic($request, $propertyId)
    {
        $property = $this->getThePropertyWithRightOwner($propertyId);
        $property->roomType_id = $request->get('roomType_id');
        $property->propertyType_id = $request->get('propertyType_id');
        $property->accommodates = $request->get('accommodates');
//        $property->currency_id = $request->get('currency_id');
        $property->beds = $request->get('beds');
        $property->save();
        return $property;
    }

    private function updatePropertyPricing(Request $request, $propertyId)
    {
        $property = $this->getThePropertyWithRightOwner($propertyId);
        $property->price = (int) $request->get("pricing");
        $property->save();
        return $property;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    private function getThePropertyWithRightOwner($propertyId)
    {
        $property = $this->properties->whereId($propertyId)->whereUserId(Auth::user()->id)->first();
        if (!$property) {
            abort(403, 'Unauthorized action. you are not the property owner');
        }
        return $property;
    }

    public function uploadMedia(Request $request, $propertyId)
    {
        if($request->file("file")){
            $fh = new MediaManagementServices();
            $media = $fh->saveUploadFile($request->file("file"), null, null, $propertyId);
            $media->tag = $request->get('tag');
            $media->save();
            return ["response"=>"completed"];
        }
    }

    private function updatePropertyLocationDescription($request, $propertyId)
    {
        $property = $this->getThePropertyWithRightOwner($propertyId);
        $property->locationDescription = $request->get("locationDescription");
        $property->save();
        return $property;
    }

    public function toggleListingStatus($propertyId)
    {
        $property = $this->getThePropertyWithRightOwner($propertyId);
        if($property->listingStatus == "unlist"){
            $property->listingStatus = "listing";
            $property->save();
            return ['response'=>'completed', 'status'=>'listing'];
        }else{
            $property->listingStatus = "unlist";
            $property->save();
            return ['response'=>'completed', 'status'=>'unlist'];
        }
    }

}
