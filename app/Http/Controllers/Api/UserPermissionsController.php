<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\UserPermissions;
use App\Http\Tools\LimitGenerator;
use App\Http\Controllers\Controller;
use App\Http\Tools\EloquentGenerator;
use App\Http\Tools\SortingListGenerator;
use App\Http\Tools\RelationshipGenerator;
use App\Http\Resources\UserPermissionsResource;
use App\Http\Resources\UserPermissionsCollection;
use App\Http\Requests\StoreUserPermissionsRequest;
use App\Http\Requests\UpdateUserPermissionsRequest;

class UserPermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new UserPermissions();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship("userData", $data);
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new UserPermissionsCollection($data);
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
                "userNoAZ",
                "userNoZA",
                "isBannedAZ",
                "isBannedZA"
            ];
            $sortingList = SortingListGenerator::sortingListGenerate($sortingNames);
            $data = EloquentGenerator::orderByWithSortingList($request, $data, $sortingList);
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserPermissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPermissionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPermissions  $userPermissions
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->user_permission;
        $data = new UserPermissions();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $data = RelationshipGenerator::addRelationship("userData", $data);
        $data = $data->first();
        $data = new UserPermissionsResource($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserPermissionsRequest  $request
     * @param  \App\Models\UserPermissions  $userPermissions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPermissionsRequest $request, UserPermissions $userPermissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPermissions  $userPermissions
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPermissions $userPermissions)
    {
        //
    }
}
