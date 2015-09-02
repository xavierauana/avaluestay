<?php

namespace avaluestay\Http\Requests\property;

use avaluestay\Contracts\PropertyTypeInterface;
use avaluestay\Contracts\RoomInterface;
use avaluestay\Http\Requests\Request;
use Illuminate\Support\Facades\App;

class CreatePropertyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $propertyTypeIds = App::make(PropertyTypeInterface::class)->lists('id')->toArray();
        $roomTypeIds = App::make(RoomInterface::class)->lists('id')->toArray();
        return [
            "propertyType_id" => "required|in:" . implode(",", $propertyTypeIds),
            "roomType_id"     => "required|in:" . implode(",", $roomTypeIds),
            "accommodates" => "required|between:1,17",
            "city"         => "required",
        ];
    }
}
