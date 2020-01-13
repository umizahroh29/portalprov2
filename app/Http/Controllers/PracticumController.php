<?php

namespace App\Http\Controllers;

use App\Models\Mastercode;
use App\Models\Practicum;
use Illuminate\Http\Request;

class PracticumController extends Controller
{
    protected $mastercode;

    public function __construct()
    {
        $this->mastercode = new MastercodeController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practicums = Practicum::with('status')->get();
        return view('practicum/list', compact('practicums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $answer_types = $this->mastercode->getAnswerTypesData();
        return view('practicum/add', compact('answer_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Practicum $practicum
     * @return \Illuminate\Http\Response
     */
    public function show(Practicum $practicum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Practicum $practicum
     * @return \Illuminate\Http\Response
     */
    public function edit(Practicum $practicum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Practicum $practicum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practicum $practicum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Practicum $practicum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practicum $practicum)
    {
        //
    }
}
