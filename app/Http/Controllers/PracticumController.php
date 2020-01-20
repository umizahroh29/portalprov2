<?php

namespace App\Http\Controllers;

use App\Http\Requests\PracticumRequest;
use App\Models\Assessment;
use App\Models\Laboratory;
use App\Models\Module;
use App\Models\Practicum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
//        print_r('<pre>'. print_r(old()) . '</pre>');
        $answer_types = $this->mastercode->getAnswerTypesData();
        $laboratory = Laboratory::where('id', Auth::user()->laboratory_id)->first();
        return view('practicum/add', compact('answer_types', 'laboratory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PracticumRequest $request)
    {
//        dd($request);
        $validated = $request->validated();
//        dd($validated);

        DB::beginTransaction();
        try {
            $practicum = Practicum::create($validated);
//            dd($practicum);

            if (is_array($validated['modules'])) {
                foreach ($validated['modules'] as $module) {
                    $module['practicum_id'] = $practicum->id;
                    Module::create($module);
                }
            }

            if (is_array($validated['assessments'])) {
                foreach ($validated['assessments'] as $assessment) {
                    $assessment['practicum_id'] = $practicum->id;
                    Assessment::create($assessment);
                }
            }

            DB::commit();
            Session::flash('success', 'Berhasil Menambahkan Praktikum');
            return redirect()->route('practicums.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Terjadi Kesalahan Saat Menambahkan Praktikum');
            return redirect()->route('practicums.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Practicum $practicum
     * @return \Illuminate\Http\Response
     */
    public function edit(Practicum $practicum)
    {
        $practicum->load('modules', 'assessments');

        $laboratory = Laboratory::where('id', Auth::user()->laboratory_id)->first();
        $answer_types = $this->mastercode->getAnswerTypesData();
        return view('practicum/edit', compact('practicum', 'laboratory', 'answer_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Practicum $practicum
     * @return \Illuminate\Http\Response
     */
    public function update(PracticumRequest $request, Practicum $practicum)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $practicum->update($validated);

            if (is_array($validated['modules'])) {
                foreach ($validated['modules'] as $module) {
                    $module['practicum_id'] = $practicum->id;
                    Module::updateOrCreate(
                        ['id' => $module['id']],
                        $module
                    );
                }
            }

            if (is_array($validated['assessments'])) {
                foreach ($validated['assessments'] as $assessment) {
                    $assessment['practicum_id'] = $practicum->id;
                    $assessment['isOnline'] = isset($assessment['isOnline']) ? $assessment['isOnline'] : 'OPTNO';
                    Assessment::updateOrCreate(
                        ['id' => $assessment['id']],
                        $assessment
                    );
                }
            }

            DB::commit();
            Session::flash('success', 'Berhasil Mengubah Data Praktikum');
            return redirect()->route('practicums.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Terjadi Kesalahan Saat Mengubah Data Praktikum');
            return redirect()->route('practicums.edit', $practicum);
        }
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
