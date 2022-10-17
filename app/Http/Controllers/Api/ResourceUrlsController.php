<?php

namespace App\Http\Controllers\Api;

use App\Models\ResourceUrls;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResourceUrlsCollection;
use App\Http\Requests\StoreResourceUrlsRequest;
use App\Http\Requests\UpdateResourceUrlsRequest;
use App\Http\Resources\ResourceUrlsResource;

class ResourceUrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ResourceUrlsCollection(ResourceUrls::where("is_deleted", false)->with("platformData", "news")->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResourceUrlsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourceUrlsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResourceUrls  $resourceUrls
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->resource_url;
        $resourceUrl = ResourceUrls::where(["is_deleted" => false, "no" => $no])->with("platformData", "news")->first();
        return new ResourceUrlsResource($resourceUrl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResourceUrls  $resourceUrls
     * @return \Illuminate\Http\Response
     */
    public function edit(ResourceUrls $resourceUrls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResourceUrlsRequest  $request
     * @param  \App\Models\ResourceUrls  $resourceUrls
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResourceUrlsRequest $request, ResourceUrls $resourceUrls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceUrls  $resourceUrls
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceUrls $resourceUrls)
    {
        //
    }
}
