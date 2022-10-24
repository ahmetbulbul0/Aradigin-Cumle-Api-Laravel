<?php

namespace App\Http\Controllers\Api;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Http\Resources\NewsCollection;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Tools\RelationshipGenerator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new News();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship(["authorData", "categoryData", "resourcePlatformData", "resourceUrlData", "approvedByData", "rejectedByData"], $data);
        $data = $data->paginate();
        $data = new NewsCollection($data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->news;
        $news = News::where(["is_deleted" => false, "no" => $no])->with("authorData", "categoryData", "resourcePlatformData", "resourceUrlData", "approvedByData", "rejectedByData")->first();
        return new NewsResource($news);
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
    public function destroy(News $news)
    {
        //
    }
}
