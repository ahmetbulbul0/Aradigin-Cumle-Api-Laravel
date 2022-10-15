<?php

namespace App\Http\Controllers;

use App\Models\UserTypePermissions;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(UserTypePermissions $userTypePermissions)
    {
        //
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
