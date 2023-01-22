<?php

namespace App\Http\Controllers;

use App\Models\ServiceQuery;
use Illuminate\Http\Request;

class ServiceQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ServiceQuery::latest()->get();
        return view('admin.formData.serviceForm',compact('services'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceQuery  $serviceQuery
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceQuery $serviceQuery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceQuery  $serviceQuery
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceQuery $serviceQuery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceQuery  $serviceQuery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceQuery $serviceQuery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceQuery  $serviceQuery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceQuery $serviceQuery)
    {
        //
    }
}
