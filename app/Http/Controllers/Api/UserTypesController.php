<?php

namespace App\Http\Controllers\Api;

use App\Models\UserTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserTypesRequest;
use App\Http\Requests\UpdateUserTypesRequest;
use App\Http\Resources\UserTypesCollection;
use App\Http\Resources\UserTypesResource;
use Illuminate\Http\Request;

class UserTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new UserTypesCollection(UserTypes::where("is_deleted", false)->with("users", "permissionsData")->paginate());
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->user_type;
        $userType = UserTypes::where(["is_deleted" => false, "no" => $no])->with("users", "permissionsData")->first();
        return new UserTypesResource($userType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserTypesRequest  $request
     * @param  \App\Models\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTypesRequest $request, UserTypes $userTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTypes $userTypes)
    {
        //
    }
}
