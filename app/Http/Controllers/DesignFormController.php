<?php

namespace App\Http\Controllers;

use App\Models\DesignForm;
use Illuminate\Http\Request;

class DesignFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DesignForm::latest()->get();
        return view("admin.formData.designQuery", compact("services"));
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
     * @param  \App\Models\DesignForm  $designForm
     * @return \Illuminate\Http\Response
     */
    public function show(DesignForm $designForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DesignForm  $designForm
     * @return \Illuminate\Http\Response
     */
    public function edit(DesignForm $designForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DesignForm  $designForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DesignForm $designForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DesignForm  $designForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(DesignForm $designForm)
    {
        //
    }
}
