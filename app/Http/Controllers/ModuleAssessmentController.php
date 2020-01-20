<?php

namespace App\Http\Controllers;

use App\Models\ModuleAssessment;
use Illuminate\Http\Request;

class ModuleAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $practicum_id = $request->practicum_id;
//        dd(\App\Models\Practicum::first());
//        return view('');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModuleAssessment  $moduleAssessment
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuleAssessment $moduleAssessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModuleAssessment  $moduleAssessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModuleAssessment $moduleAssessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModuleAssessment  $moduleAssessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModuleAssessment $moduleAssessment)
    {
        //
    }
}
