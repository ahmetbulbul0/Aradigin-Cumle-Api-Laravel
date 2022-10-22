<?php

namespace App\Http\Controllers\Api;

use App\Models\UserSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserSettingsCollection;
use App\Http\Requests\StoreUserSettingsRequest;
use App\Http\Requests\UpdateUserSettingsRequest;
use App\Http\Resources\UserSettingsResource;

class UserSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = new UserSettingsCollection(UserSettings::where("is_deleted", false)->with("userData")->paginate());
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
        $userSetting = UserSettings::where(["is_deleted" => false, "no" => $no])->with("userData")->first();
        return new UserSettingsResource($userSetting);
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
