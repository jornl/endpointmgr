<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceServiceRequest;
use App\Http\Requests\UpdateDeviceServiceRequest;
use App\Models\DeviceService;

class DeviceServiceController extends Controller
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
     * @param  \App\Http\Requests\StoreDeviceServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeviceService  $deviceService
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceService $deviceService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeviceService  $deviceService
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceService $deviceService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeviceServiceRequest  $request
     * @param  \App\Models\DeviceService  $deviceService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceServiceRequest $request, DeviceService $deviceService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeviceService  $deviceService
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceService $deviceService)
    {
        //
    }
}
