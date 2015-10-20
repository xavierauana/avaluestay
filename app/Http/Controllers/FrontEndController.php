<?php

namespace avaluestay\Http\Controllers;

use avaluestay\Contracts\PropertyInterface;
use avaluestay\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

class FrontEndController extends Controller
{
    private $properties;

    /**
     * Testing
     *
     * @param \avaluestay\Contracts\PropertyInterface $properties
     */
    public function __construct(PropertyInterface $properties)
    {
        $this->properties = $properties;
    }


    public function search(Request $request)
    {
        $data = $request->all();

        if (isset($data["destination"])) {
            $rules = [
                "destination" => "required"
            ];

            $this->validate($request, $rules);

            if ($this->hasValidDate($request)) {
                $checkInDate = $this->createDate($data["checkInDate"]);
                $checkOutDate = $this->createDate($data["checkOutDate"]);

                $checkInDate = $checkInDate->format('d F Y');
                $checkOutDate = $checkOutDate->format('d F Y');

                JavaScriptFacade::put([
                                          'checkInDate'  => isset($checkInDate) ? $checkInDate : "",
                                          'checkOutDate' => isset($checkOutDate) ? $checkOutDate : "",
                                      ]);
            }


            $properties = $this->properties->where('city', 'like', '%' . $data['destination'] . '%')->orWhere('country', 'like', '%' . $data['destination'] . '%')->paginate(20);


            JavaScriptFacade::put([
                                      'test'         => "hi there",
                                      "properties"   => $properties->toJson(),
                                      'accommodates' => !isset($data['accommodates']) ?: $data['accommodates'],
                                  ]);

            return view('front.pages.houses', compact("properties"));
        }

        return view('front.pages.index');
    }

    public function getProperty(Request $request, $propertyId)
    {
        $property = $this->properties->with([
                                                'commission',
                                                'wishList',
                                                'media',
                                                'facilities',
                                                "services",
                                                "bookings",
                                            ])->findOrFail($propertyId);
        JavaScriptFacade::put([
                                  'property' => $property,
                                'unavailableDates'=> $property->unavailableDatesForBooking()
                              ]);
        if ($request->user()) {
            JavaScriptFacade::put([
                                      'userId' => $request->user()->id
                                  ]);
        }

        return view('front.pages.house_detail', compact("property"));
    }

    /**
     * @param $checkInDate
     */
    private function createDate($date)
    {
        return Carbon::createFromFormat(
            "d F Y H:i:s",
            $date . " 00:00:00"
        );
    }

    private function hasValidDate($request)
    {
        if ($request->has('checkInDate') && $request->has('checkOutDate')) {
            if ($request->get('checkInDate') && $request->get('checkOutDate')) {
                return true;
            }
        }

        return false;

    }
}
