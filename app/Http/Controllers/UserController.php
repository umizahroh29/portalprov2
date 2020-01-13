<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function checkNim(Request $request)
    {
        $nim = $request->nim;

        $data = User::where('nim', $nim)->first();

        $result['status'] = true;
        $result['isNewPassword'] = false;
        if ($data == null) {
            $result['status'] = false;
        } else {
            $result['status'] = true;
            $result['name'] = explode(' ', trim($data->name));
            if ($data->password == null) {
                $result['isNewPassword'] = true;
            }
        }

        return $result;
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|max:10',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'action' => 'required'
        ]);

        User::where('nim', $request->nim)->update([
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now()
        ]);

        Session::flash('success', 'Password Berhasil Diperbarui');
        return redirect()->route('login');
    }
}
