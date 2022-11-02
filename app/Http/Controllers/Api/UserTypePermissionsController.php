<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Tools\NoGenerator;
use App\Http\Tools\LimitGenerator;
use App\Models\UserTypePermissions;
use App\Http\Controllers\Controller;
use App\Http\Tools\EloquentGenerator;
use App\Http\Tools\SortingListGenerator;
use App\Http\Tools\RelationshipGenerator;
use App\Http\Resources\UserTypePermissionsResource;
use App\Http\Resources\UserTypePermissionsCollection;
use App\Http\Requests\StoreUserTypePermissionsRequest;
use App\Http\Requests\UpdateUserTypePermissionsRequest;

class UserTypePermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new UserTypePermissions();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship("userTypeData", $data);
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new UserTypePermissionsCollection($data);
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
                "userTypeNoAZ",
                "userTypeNoZA"
            ];
            $sortingList = SortingListGenerator::sortingListGenerate($sortingNames);
            $data = EloquentGenerator::orderByWithSortingList($request, $data, $sortingList);
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserTypePermissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTypePermissionsRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateUserTypePermissionsNo(),
            "user_type_no" => $request->userTypeNo,
        ];
        UserTypePermissions::create($data);
        $created = UserTypePermissions::where(["is_deleted" => false, "no" => $data["no"]])->with("userTypeData")->first();
        return new UserTypePermissionsResource($created);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTypePermissions  $userTypePermissions
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->user_type_permission;
        $data = new UserTypePermissions();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $data = RelationshipGenerator::addRelationship("userTypeData", $data);
        $data = $data->first();
        $data = new UserTypePermissionsResource($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserTypePermissionsRequest  $request
     * @param  \App\Models\UserTypePermissions  $userTypePermissions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTypePermissionsRequest $request, UserTypePermissions $userTypePermissions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTypePermissions  $userTypePermissions
     * @return \Illuminate\Http\Response
     */
    public function destroy($no)
    {
        $data = new UserTypePermissions();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $deletedData = $data->with("userTypeData");
        $deletedData = $data->first();
        $data->update(["is_deleted" => true]);
        return new UserTypePermissionsResource($deletedData);
    }
}
