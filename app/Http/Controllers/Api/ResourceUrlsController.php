<?php

namespace App\Http\Controllers\Api;

use App\Models\ResourceUrls;
use Illuminate\Http\Request;
use App\Http\Tools\NoGenerator;
use App\Http\Tools\LimitGenerator;
use App\Http\Controllers\Controller;
use App\Http\Tools\EloquentGenerator;
use App\Http\Tools\SortingListGenerator;
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
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new ResourceUrlsCollection($data);
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
                "urlAZ",
                "urlZA",
                "platformAZ",
                "platformZA"
            ];
            $sortingList = SortingListGenerator::sortingListGenerate($sortingNames);
            $data = EloquentGenerator::orderByWithSortingList($request, $data, $sortingList);
        }
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
        $data = [
            "no" => NoGenerator::generateResourceUrlsNo(),
            "url" => $request->url,
            "platform" => $request->platform
        ];
        ResourceUrls::create($data);
        $created = ResourceUrls::where(["is_deleted" => false, "no" => $data["no"]])->with("platformData")->first();
        return new ResourceUrlsResource($created);
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
