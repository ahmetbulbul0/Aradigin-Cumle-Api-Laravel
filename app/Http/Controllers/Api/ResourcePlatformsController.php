<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Tools\NoGenerator;
use App\Models\ResourcePlatforms;
use App\Http\Tools\LimitGenerator;
use App\Http\Controllers\Controller;
use App\Http\Tools\EloquentGenerator;
use App\Http\Tools\SortingListGenerator;
use App\Http\Tools\RelationshipGenerator;
use App\Http\Resources\ResourcePlatformsResource;
use App\Http\Resources\ResourcePlatformsCollection;
use App\Http\Requests\StoreResourcePlatformsRequest;
use App\Http\Requests\UpdateResourcePlatformsRequest;

class ResourcePlatformsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new ResourcePlatforms();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::hasRelationshipInRequest($request, ["resourceUrls", "news"], $data);
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new ResourcePlatformsCollection($data);
        $response = [
            "data" => $data,
            "pagination" => $pagination
        ];
        return $response;
    }

    public function sorting($request, $data)
    {
        if ($request->sorting) {
            $sortingNames = [
                'no09',
                'no90',
                "nameAZ",
                "nameZA",
                "mainUrlAZ",
                "mainUrlZA",
                "slugAZ",
                "slugZA"
            ];
            $sortingList = SortingListGenerator::sortingListGenerate($sortingNames);
            $data = EloquentGenerator::orderByWithSortingList($request, $data, $sortingList);
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResourcePlatformsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourcePlatformsRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateResourcePlatformsNo(),
            "name" => $request->name,
            "main_url" => $request->mainUrl,
            "slug" => Str::slug($request->name)
        ];
        ResourcePlatforms::create($data);
        $created = ResourcePlatforms::where(["is_deleted" => false, "no" => $data["no"]])->first();
        return new ResourcePlatformsResource($created);
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
        $data = new ResourcePlatforms();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $data = RelationshipGenerator::hasRelationshipInRequest($request, ["resourceUrls", "news"], $data);
        $data = $data->first();
        $data = new ResourcePlatformsResource($data);
        return $data;
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
