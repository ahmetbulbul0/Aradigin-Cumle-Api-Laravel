<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\UserTypePermissions;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserTypePermissionsCollection;
use App\Http\Requests\StoreUserTypePermissionsRequest;
use App\Http\Requests\UpdateUserTypePermissionsRequest;
use App\Http\Resources\UserTypePermissionsResource;

class UserTypePermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserTypePermissionsCollection(UserTypePermissions::paginate());
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
        $userTypePermission = UserTypePermissions::where(["is_deleted" => false, "no" => $no])->first();
        return new UserTypePermissionsResource($userTypePermission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTypePermissions  $userTypePermissions
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTypePermissions $userTypePermissions)
    {
        //
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
