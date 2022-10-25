<?php

namespace App\Http\Controllers\Api;

use App\Models\UserSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Tools\RelationshipGenerator;
use App\Http\Resources\UserSettingsResource;
use App\Http\Resources\UserSettingsCollection;
use App\Http\Requests\StoreUserSettingsRequest;
use App\Http\Requests\UpdateUserSettingsRequest;

class UserSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new UserSettings();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship("userData", $data);
        $data = $data->paginate();
        $data = new UserSettingsCollection($data);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserSettingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSettings  $userSettings
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->user_setting;
        $data = new UserSettings();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $data = RelationshipGenerator::addRelationship("userData", $data);
        $data = $data->first();
        $data = new UserSettingsResource($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserSettingsRequest  $request
     * @param  \App\Models\UserSettings  $userSettings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserSettingsRequest $request, UserSettings $userSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSettings  $userSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSettings $userSettings)
    {
        //
    }
}
