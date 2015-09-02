<?php

namespace avaluestay\Http\Controllers;

use avaluestay\Contracts\WishListInterface;
use avaluestay\Http\Requests;
use Illuminate\Http\Request;

class WishListsController extends Controller
{
    private $list;

    /**
     * WishListsController constructor.
     *
     * @param $list
     */
    public function __construct(WishListInterface $list)
    {
        $this->list = $list;
    }


    public function toggleMyFavorite(Request $request, $propertyId)
    {
        if ($request->ajax()) {
            $favorite = $this->list->whereUserId($request->user()->id)->wherePropertyId($propertyId)->first();
            if ($favorite) {
                $favorite->delete();
            } else {
                $this->list->property_id = $propertyId;
                $this->list->user_id = $request->user()->id;
                $this->list->save();
            }

            return ['response' => 'completed'];
        }
    }
}
