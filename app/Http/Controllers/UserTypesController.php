<?php

namespace App\Http\Controllers;

use App\Models\UserTypes;
use App\Http\Requests\StoreUserTypesRequest;
use App\Http\Requests\UpdateUserTypesRequest;

class UserTypesController extends Controller
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
    public function show(UserTypes $userTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTypes $userTypes)
    {
        //
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
