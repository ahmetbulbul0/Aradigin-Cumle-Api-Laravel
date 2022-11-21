<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Tools\NoGenerator;
use App\Http\Tools\LimitGenerator;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Http\Tools\EloquentGenerator;
use App\Http\Resources\NewsCollection;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\PublicNewsCollection;
use App\Http\Resources\ResourceUrlsResource;
use App\Http\Tools\SortingListGenerator;
use App\Http\Tools\RelationshipGenerator;
use App\Models\ResourceUrls;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new News();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship(["authorData", "categoryData", "resourcePlatformData", "resourceUrlData", "approvedByData", "rejectedByData"], $data);
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new NewsCollection($data);
        $response = [
            "data" => $data,
            "pagination" => $pagination
        ];
        return $response;
    }

    public function publicIndex(Request $request)
    {
        $data = new News();
        $data = $data->where("is_deleted", false);
        $data = $data->where("publish_status", "published");
        $data = $data->where("status", "approved");
        $data = $data->where("publish_date", "<", strtotime("now"));
        $data = RelationshipGenerator::addRelationship(["authorData", "categoryData", "resourcePlatformData", "resourceUrlData"], $data);
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new PublicNewsCollection($data);
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
                "titleAZ",
                "titleZA",
                "contentAZ",
                "contentZA",
                "authorAZ",
                "authorZA",
                "categoryAZ",
                "categoryZA",
                "resourcePlatformAZ",
                "resourcePlatformZA",
                "resourceUrlAZ",
                "resourceUrlZA",
                "addedTime09",
                "addedTime90",
                "publishStatusAZ",
                "publishStatusZA",
                "publishDate09",
                "publishDate90",
                "statusAZ",
                "statusZA",
                "slugAZ",
                "slugZA",
                "isApproved09",
                "isApproved90",
                "approvedAt09",
                "approvedAt90",
                "approvedByAZ",
                "approvedByZA",
                "isRejected09",
                "isRejected90",
                "rejectedAt09",
                "rejectedAt90",
                "rejectedByAZ",
                "rejectedByZA",
                "rejectedReasonAZ",
                "rejectedReasonZA"
            ];
            $sortingList = SortingListGenerator::sortingListGenerate($sortingNames);
            $data = EloquentGenerator::orderByWithSortingList($request, $data, $sortingList);
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateNewsNo(),
            "title" => $request->title,
            "content" => $request->content,
            "author" => intval($request->author),
            "category" => intval($request->category),
            "resource_platform" => intval($request->resourcePlatform),
            "resource_url" => $request->resourceUrl,
            "added_time" => date("Y-m-d/H:i:s"),
            "publish_status" => $request->publishStatus,
            "publish_date" => $request->publishDate,
            "status" => "pending",
            "slug" => Str::slug($request->title),
        ];
        $resourceUrl = $this->newsResourceUrlStore($data);
        $data["resource_url"] = $resourceUrl["no"];
        News::create($data);
        $created = News::where(["is_deleted" => false, "no" => $data["no"]])->with("authorData", "categoryData", "resourcePlatformData", "resourceUrlData")->first();
        return new NewsResource($created);
    }

    static function newsResourceUrlStore($rData)
    {
        $data = [
            "no" => NoGenerator::generateNewsNo(),
            "url" => $rData["resource_url"],
            "platform" => $rData["resource_platform"],
        ];
        ResourceUrls::create($data);
        $created = ResourceUrls::where(["is_deleted" => false, "no" => $data["no"]])->first();
        return new ResourceUrlsResource($created);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $slug = $request->news;
        $data = new News();
        $data = $data->where(["is_deleted" => false, "slug" => $slug]);
        $data = RelationshipGenerator::addRelationship(["authorData", "categoryData", "resourcePlatformData", "resourceUrlData", "approvedByData", "rejectedByData"], $data);
        $data = $data->first();
        $data = new NewsResource($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($no)
    {
        $data = new News();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $deletedData = $data->with("authorData", "categoryData", "resourcePlatformData", "resourceUrlData", "approvedByData", "rejectedByData");
        $deletedData = $data->first();
        $data->update(["is_deleted" => true]);
        return new NewsResource($deletedData);
    }
}
