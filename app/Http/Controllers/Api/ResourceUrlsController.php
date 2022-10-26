<?php

namespace App\Http\Controllers\Api;

use App\Models\ResourceUrls;
use Illuminate\Http\Request;
use App\Http\Tools\LimitGenerator;
use App\Http\Controllers\Controller;
use App\Http\Tools\RelationshipGenerator;
use App\Http\Resources\ResourceUrlsResource;
use App\Http\Resources\ResourceUrlsCollection;
use App\Http\Requests\StoreResourceUrlsRequest;
use App\Http\Requests\UpdateResourceUrlsRequest;

class ResourceUrlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new ResourceUrls();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship("platformData", $data);
        $data = RelationshipGenerator::hasRelationshipInRequest($request, "news", $data);
        $data = LimitGenerator::generateLimitAndGet($request, $data);
        $data = new ResourceUrlsCollection($data);
        return $data;
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
        $data = new ResourceUrls();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $data = RelationshipGenerator::addRelationship("platformData", $data);
        $data = RelationshipGenerator::hasRelationshipInRequest($request, "news", $data);
        $data = $data->first();
        $data = new ResourceUrlsResource($data);
        return $data;
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
