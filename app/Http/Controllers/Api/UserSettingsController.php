<?php

namespace App\Http\Controllers\Api;

use App\Models\UserSettings;
use Illuminate\Http\Request;
use App\Http\Tools\NoGenerator;
use App\Http\Tools\LimitGenerator;
use App\Http\Controllers\Controller;
use App\Http\Tools\EloquentGenerator;
use App\Http\Tools\SortingListGenerator;
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
    public function index(Request $request)
    {
        $data = new UserSettings();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship("userData", $data);
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new UserSettingsCollection($data);
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
                "isPublicAZ",
                "isPublicZA",
                "profilePhotoAZ",
                "profilePhotoZA",
                "websiteThemeAZ",
                "websiteThemeZA",
                "dashboardThemeAZ",
                "dashboardThemeZA"
            ];
            $sortingList = SortingListGenerator::sortingListGenerate($sortingNames);
            $data = EloquentGenerator::orderByWithSortingList($request, $data, $sortingList);
        }
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
        $data = [
            "no" => NoGenerator::generateUserSettingsNo(),
            "user_no" => $request->userNo,
        ];
        UserSettings::create($data);
        $created = UserSettings::where(["is_deleted" => false, "no" => $data["no"]])->with("userData")->first();
        return new UserSettingsResource($created);
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
    public function destroy($no)
    {
        $data = new UserSettings();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $deletedData = $data->with("userData");
        $deletedData = $data->first();
        $data->update(["is_deleted" => true]);
        return new UserSettingsResource($deletedData);
    }
}
