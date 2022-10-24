<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\UserTypePermissions;
use App\Http\Controllers\Controller;
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
    public function index()
    {
        $data = new UserTypePermissions();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship("userTypeData", $data);
        $data = $data->paginate();
        $data = new UserTypePermissionsCollection($data);
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
        //
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
        $userTypePermission = UserTypePermissions::where(["is_deleted" => false, "no" => $no])->with("userTypeData")->first();
        return new UserTypePermissionsResource($userTypePermission);
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
    public function destroy(UserTypePermissions $userTypePermissions)
    {
        //
    }
}
