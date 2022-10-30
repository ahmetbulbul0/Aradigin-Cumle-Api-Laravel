<?php

namespace App\Http\Controllers\Api;

use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Tools\NoGenerator;
use App\Http\Tools\LimitGenerator;
use App\Http\Controllers\Controller;
use App\Http\Tools\EloquentGenerator;
use App\Http\Tools\SortingListGenerator;
use App\Http\Tools\RelationshipGenerator;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\CategoriesCollection;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new Categories();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship("parentCategoryData", $data);
        $data = RelationshipGenerator::hasRelationshipInRequest($request, ["childrenCategories", "news"], $data);
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new CategoriesCollection($data);
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
                'nameAZ',
                'nameZA',
                'slugAZ',
                'slugZA',
                'isParent09',
                'isParent90',
                'parentCategoryAZ',
                'parentCategoryZA'
            ];
            $sortingList = SortingListGenerator::sortingListGenerate($sortingNames);
            $data = EloquentGenerator::orderByWithSortingList($request, $data, $sortingList);
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateCategoriesNo(),
            "name" => Str::lower($request->name),
            "slug" => Str::slug(Str::lower($request->name)),
            "is_parent" => $request->isParent ? $request->isParent : true,
            "is_children" => $request->isChildren ? $request->isChildren : false,
            "parent_category" => intval($request->parentCategory)
        ];
        Categories::create($data);
        $created = Categories::where(["is_deleted" => false, "no" => $data["no"]])->with("parentCategoryData")->first();
        return new CategoriesResource($created);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->category;
        $data = new Categories();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $data = RelationshipGenerator::addRelationship("parentCategoryData", $data);
        $data = RelationshipGenerator::hasRelationshipInRequest($request, ["childrenCategories", "news"], $data);
        $data = $data->first();
        return new CategoriesResource($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriesRequest  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
