<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;




class DoctorController extends Controller
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
    public function edit(User $user, $id)
    {
        $user = User::find($id);
        // dd($user);
        return view('dashboard.doctor.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        Storage::delete('cv_img', $user->cv_img);
        Storage::delete('profile_img', $user->profile_img);


        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'register_number_doc' => 'required',
            'cv_img' => '',
            'phone_number' => 'required',
            'profile_img' => '',
            'cv_img' => 'nullable | file ',
            'profile_img' => 'nullable | image '

        ]);

        // dd($validatedData);

        $cv_img = Storage::put('cv_img', $request->cv_img);
        $profile_img = Storage::put('profile_img', $request->profile_img);

        $validatedData['cv_img'] = $cv_img;
        $validatedData['profile_img'] = $profile_img;



        $user = Auth::user();

        $user->update($validatedData);
        // dd($user);

        return redirect()->route('dashboard.');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('dashboard.');
    }
}
