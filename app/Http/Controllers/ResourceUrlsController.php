<?php

namespace App\Http\Controllers;

use App\Models\ResourceUrls;
use App\Http\Requests\StoreResourceUrlsRequest;
use App\Http\Requests\UpdateResourceUrlsRequest;

class ResourceUrlsController extends Controller
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
     * @param  \App\Http\Requests\StoreResourceUrlsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourceUrlsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResourceUrls  $resourceUrls
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceUrls $resourceUrls)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResourceUrls  $resourceUrls
     * @return \Illuminate\Http\Response
     */
    public function edit(ResourceUrls $resourceUrls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResourceUrlsRequest  $request
     * @param  \App\Models\ResourceUrls  $resourceUrls
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResourceUrlsRequest $request, ResourceUrls $resourceUrls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceUrls  $resourceUrls
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceUrls $resourceUrls)
    {
        //
    }
}
