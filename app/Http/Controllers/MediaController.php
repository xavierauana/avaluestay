<?php

namespace avaluestay\Http\Controllers;

use avaluestay\Services\MediaManagementServices;
use Illuminate\Http\Request;

use avaluestay\Http\Requests;
use avaluestay\Http\Controllers\Controller;

class MediaController extends Controller
{
    private $media;

    /**
     * MediaController constructor.
     *
     * @param $media
     */
    public function __construct(MediaManagementServices $media)
    {
        $this->media = $media;
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
    public function store(Request $request)
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @param  int                     $id
     *
     * @return \avaluestay\Http\Controllers\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $media = $this->media->getMediaById($id);
            if($request->user()->id == $media->property->owner->id){
                $this->media->deleteMedia($media);
            }
            return ["response"=>"completed"];
        }
    }
}
