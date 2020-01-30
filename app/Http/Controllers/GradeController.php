<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Module;
use App\Models\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///data asisten yg login
        $assistant_nim = Auth::user()->nim;
        $assistant_code = Auth::user()->assistant_code;
        $assistant_role = Auth::user()->role;

        //coba ngambil data praktikum asisten yg login
        $data_practicum_user = DB::table('practicum_users')->where('assistant_code', $assistant_code)
            ->where('user_nim', $assistant_nim)
            ->where('role', $assistant_role)
            ->get()->all();
        $count_data_practicum_user = DB::table('practicum_users')->where('assistant_code', $assistant_code)
            ->where('user_nim', $assistant_nim)
            ->where('role', $assistant_role)
            ->count();

        //kalo datanya ga ada, berarti dia ga ada di tabel practicum_user dan balikin ke dashboard
        if ($count_data_practicum_user == 0) return redirect('dashboard')->with('errors', 'Not Assign to Any Practicum');

        $practicum_id = $data_practicum_user[0]->practicum_id;

        //cek lagi role nya apa 
        if ($assistant_role != "ROLAS") {
            return redirect('dashboard')->with('errors', 'Oops, dont have access');
        } else if ($assistant_role == "ROLAS") {
            //karena ngambil data nya ribet, jadinya di proses di sini datanya.

            //ngambil data nilai yang asisten ini harus nilai
            $grades_belong_to_assistant = DB::table('grades as gr')
                ->join('module_assessments as ma', 'gr.module_assessment_id', '=', 'ma.id')
                ->join('modules as m', 'ma.module_id', '=', 'm.id')
                ->join('users as u', 'gr.user_nim', '=', 'u.nim')
                ->join('assessments as ass', 'ma.assessment_id', '=', 'ass.id')
                ->select('gr.id', 'gr.user_nim', 'u.name', 'u.class', 'm.name as Modul', 'gr.token', 'gr.assistant_code', 'gr.grade', 'ass.name', 'ass.percentage', 'ass.answer_type')
                ->where('gr.assistant_code', $assistant_code)
                ->orderBy('gr.id')
                ->get();

            //karena di data itu kan ga lengkap, ada yg cuman ada test awal doang, atau audit doang.
            //makanya disini aku coba ngambil data nim sama modulnya aja, buat nanti ngambil ulang datanya
            $list_nim_module_have_to_grade = array();
            $i = 0;
            foreach ($grades_belong_to_assistant as $grade) {
                if ($grade->answer_type != "ANSMC") { //kalo dia pegang data yg MC, berarti ga usah dimasukin juga gpp

                    if (!in_array($grade->user_nim, $list_nim_module_have_to_grade)) {
                        $list_nim_module_have_to_grade[$i]['nim'] = $grade->user_nim;
                        $list_nim_module_have_to_grade[$i]['modul'] = $grade->Modul;
                        $i++;
                    }
                }
            }
            //kan hasilnya pasti ada double karena cuman ngambil data nim sama modulnya aja
            //jadi ku ilangin data double nya, jadi cuman tinggal list nim dan modul yg ada kaitannya sama asisten ini
            $list_nim_modul_clean = array_intersect_key($list_nim_module_have_to_grade, array_unique(array_map('serialize', $list_nim_module_have_to_grade)));


            //karena udh dapet data praktikan mana aja sama modulnya apa aja yg harus diambil
            //ngambil datanya di loop sesuai data di list_nim_modul_clean
            $data_nilai = array();

            //ambil data untuk setiap nim dan modul
            foreach ($list_nim_modul_clean as $l => $key) {
                $data_sementara = DB::table('grades as gr')
                    ->join('module_assessments as ma', 'gr.module_assessment_id', '=', 'ma.id')
                    ->join('modules as m', 'ma.module_id', '=', 'm.id')
                    ->join('users as u', 'gr.user_nim', '=', 'u.nim')
                    ->join('assessments as ass', 'ma.assessment_id', '=', 'ass.id')
                    ->select('gr.id', 'gr.module_assessment_id', 'gr.user_nim', 'u.name as Nama', 'u.class', 'm.name as Modul', 'gr.token', 'gr.assistant_code', 'gr.grade', 'ass.name as tipe', 'ass.percentage', 'ass.practicum_id', 'ass.answer_type')
                    ->where('gr.user_nim', $key['nim'])
                    ->where('m.name', $key['modul'])
                    ->where('ass.practicum_id', $practicum_id)
                    ->orderBy('tipe', 'desc')
                    ->get();
                //misalkan ada data nim=1202190001 modul=ERD, maka ambil semua data per komponennya,
                // 1202190001 ERD AUDIT=90 jurnal=80 dst..
                array_push($data_nilai, $data_sementara->all());
            }

            //simpan datanya ke $data['grades']
            $data['grades'] = $data_nilai;

            //menggambil data modul berdasarkan praktikum yg dia ampu
            //buat di tombol modul
            $data_module = Module::where('practicum_id', $practicum_id)
                ->select('name')
                ->get()->all();

            //simpan datanya ke $data['modules']
            $data['modules'] = $data_module;

            //kirim datanya ke view
            return view('grade.add', $data);
        }
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
        $all = $request->all();
        //update data buat setiap nilai
        for ($i = 0; $i <= count($all['nim']) - 1; $i++) {
            Grade::where('user_nim', $all['nim'][$i])
                ->where('id', $all['id_nilai'][$i])
                ->update(['grade' => $all['nilai'][$i]]);
        }
        return redirect('inputnilai')->with('status', 'Grades updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view()
    {
        //ambil data asisten yg login
        $assistant_nim = Auth::user()->nim;
        $assistant_code = Auth::user()->assistant_code;
        $assistant_role = Auth::user()->role;

        //ambil data praktikum yg asisten ampu
        $data_practicum_user = DB::table('practicum_users')->where('assistant_code', $assistant_code)
            ->where('user_nim', $assistant_nim)
            ->where('role', $assistant_role)
            ->get()->all();
        $count_data_practicum_user = DB::table('practicum_users')->where('assistant_code', $assistant_code)
            ->where('user_nim', $assistant_nim)
            ->where('role', $assistant_role)
            ->count();
        //kalo ga ada berarti data dia ga ada di practicum user
        if ($count_data_practicum_user == 0) return redirect('dashboard')->with('errors', 'Not Assign to Any Practicum');

        //praktikum id
        $practicum_id = $data_practicum_user[0]->practicum_id;

        //cek lagi role nya 
        if ($assistant_role != "ROLAD") {
            return redirect('dashboard')->with('errors', 'Oops, does not have access');
        } else {
            //proses ngambil datanya mirip kaya pas input nilai sih

            $list_nim_module_all = DB::table('grades as gr')
                ->join('module_assessments as ma', 'gr.module_assessment_id', '=', 'ma.id')
                ->join('modules as m', 'ma.module_id', '=', 'm.id')
                ->join('users as u', 'gr.user_nim', '=', 'u.nim')
                ->join('assessments as ass', 'ma.assessment_id', '=', 'ass.id')
                ->select('gr.user_nim', 'm.name as Modul')
                ->orderBy('ass.name', 'desc')
                ->get()->all();
            //ngilangin data double nya, jadi cuman tinggal list nim dan modul yg ada kaitannya sama asisten ini
            $list_nim_modul_all_clean = array_intersect_key($list_nim_module_all, array_unique(array_map('serialize', $list_nim_module_all)));

            $data_nilai = array();
            //ambil data untuk setiap nim dan modul
            foreach ($list_nim_modul_all_clean as $l => $key) {
                $data_sementara = DB::table('grades as gr')
                    ->join('module_assessments as ma', 'gr.module_assessment_id', '=', 'ma.id')
                    ->join('modules as m', 'ma.module_id', '=', 'm.id')
                    ->join('users as u', 'gr.user_nim', '=', 'u.nim')
                    ->join('assessments as ass', 'ma.assessment_id', '=', 'ass.id')
                    ->select('gr.id', 'gr.module_assessment_id', 'gr.user_nim', 'u.name as Nama', 'u.class', 'm.name as Modul', 'gr.token', 'gr.assistant_code', 'gr.grade', 'ass.name as tipe', 'ass.percentage', 'ass.practicum_id', 'ass.answer_type')
                    ->where('gr.user_nim', $key->user_nim)
                    ->where('m.name', $key->Modul)
                    ->where('ass.practicum_id', $practicum_id)
                    ->orderBy('tipe', 'desc')
                    ->get();
                array_push($data_nilai, $data_sementara->all());
            }
            $data['grades'] = $data_nilai;

            //menggambil data modul berdasarkan praktikum yg dia ampu
            $data_module = Module::where('practicum_id', $practicum_id)
                ->select('name')
                ->get()->all();

            $data['modules'] = $data_module;

            return view('grade.list', $data);
        }
    }
}
