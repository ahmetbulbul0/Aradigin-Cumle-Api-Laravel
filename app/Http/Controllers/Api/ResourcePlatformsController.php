<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ResourcePlatforms;
use App\Http\Controllers\Controller;
use App\Http\Resources\ResourcePlatformsCollection;
use App\Http\Requests\StoreResourcePlatformsRequest;
use App\Http\Requests\UpdateResourcePlatformsRequest;
use App\Http\Resources\ResourcePlatformsResource;

class ResourcePlatformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ResourcePlatformsCollection(ResourcePlatforms::where("is_deleted", false)->with("resourceUrls", "news")->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResourcePlatformsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourcePlatformsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResourcePlatforms  $resourcePlatforms
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->resource_platform;
        $resourcePlatforms = ResourcePlatforms::where(["is_deleted" => false, "no" => $no])->with("resourceUrls", "news")->first();
        return new ResourcePlatformsResource($resourcePlatforms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResourcePlatforms  $resourcePlatforms
     * @return \Illuminate\Http\Response
     */
    public function edit(ResourcePlatforms $resourcePlatforms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResourcePlatformsRequest  $request
     * @param  \App\Models\ResourcePlatforms  $resourcePlatforms
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResourcePlatformsRequest $request, ResourcePlatforms $resourcePlatforms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourcePlatforms  $resourcePlatforms
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourcePlatforms $resourcePlatforms)
    {
        //
    }
}
