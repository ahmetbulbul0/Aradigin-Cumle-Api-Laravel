<?php

namespace App\Http\Controllers\Api;

use App\Models\Users;
use App\Models\ResourceUrls;
use App\Models\UserSettings;
use Illuminate\Http\Request;
use App\Http\Tools\NoGenerator;
use App\Models\UserPermissions;
use App\Http\Tools\LimitGenerator;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Http\Tools\EloquentGenerator;
use App\Http\Resources\UsersCollection;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Tools\SortingListGenerator;
use App\Http\Requests\UpdateUsersRequest;
use App\Http\Tools\RelationshipGenerator;
use App\Http\Resources\ResourceUrlsResource;
use App\Http\Resources\UserSettingsResource;
use App\Http\Resources\UserPermissionsResource;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new Users();
        $data = $data->where("is_deleted", false);
        $data = RelationshipGenerator::addRelationship(["typeData", "permissionsData", "settingsData"], $data);
        $data = RelationshipGenerator::hasRelationshipInRequest($request, "news", $data);
        $data = $this->sorting($request, $data);
        $data = LimitGenerator::generateLimitAndPaginate($request, $data);
        $pagination = $data["pagination"];
        $data = $data["data"];
        $data = new UsersCollection($data);
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
                "usernameAZ",
                "usernameZA",
                "fullNameAZ",
                "fullNameZA",
                "passwordAZ",
                "passwordZA",
                "typeAZ",
                "typeZA",
                "settingsAZ",
                "settingsZA",
                "permissionsAZ",
                "permissionsZA"
            ];
            $sortingList = SortingListGenerator::sortingListGenerate($sortingNames);
            $data = EloquentGenerator::orderByWithSortingList($request, $data, $sortingList);
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $data = [
            "no" => NoGenerator::generateUsersNo(),
            "username" => $request->username,
            "full_name" => $request->fullName,
            "password" => Hash::make($request->password),
            "type" => intval($request->type),
        ];
        $settings = $this->usersSettingsStore($data);
        $data["settings"] = $settings["no"];

        $permissions = $this->usersPermissionsStore($data);
        $data["permissions"] = $permissions["no"];

        Users::create($data);
        $created = Users::where(["is_deleted" => false, "no" => $data["no"]])->with("typeData", "permissionsData", "settingsData")->first();
        return new UsersResource($created);
    }

    static function usersSettingsStore($rData)
    {
        $data = [
            "no" => NoGenerator::generateUserSettingsNo(),
            "user_no" => $rData["no"],
        ];
        UserSettings::create($data);
        $created = UserSettings::where(["is_deleted" => false, "no" => $data["no"]])->first();
        return new UserSettingsResource($created);
    }

    static function usersPermissionsStore($rData)
    {
        $data = [
            "no" => NoGenerator::generateUserPermissionsNo(),
            "user_no" => $rData["no"],
        ];
        UserPermissions::create($data);
        $created = UserPermissions::where(["is_deleted" => false, "no" => $data["no"]])->first();
        return new UserPermissionsResource($created);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $no = $request->user;
        $data = new Users();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $data = RelationshipGenerator::addRelationship(["typeData", "permissionsData", "settingsData"], $data);
        $data = RelationshipGenerator::hasRelationshipInRequest($request, "news", $data);
        $data = $data->first();
        $data = new UsersResource($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($no)
    {
        $data = new Users();
        $data = $data->where(["is_deleted" => false, "no" => $no]);
        $deletedData = $data->with("typeData", "permissionsData", "settingsData");
        $deletedData = $data->first();
        $data->update(["is_deleted" => true]);
        return new UsersResource($deletedData);
    }
}
