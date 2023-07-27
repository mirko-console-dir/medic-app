<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\User;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Clinic $clinic, User $user)
    {
        $user = Auth::user();
        $clinics = Clinic::all();
        return view('dashboard.clinic.index', compact('clinics','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $user = Auth::user();
        return view('dashboard.clinic.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'name'=>'required',
            'city' => 'required',
            'address' => 'required',
            'phone_clinic' => 'required',


        ]);

        Clinic::create($validatedData);

        return redirect()->route('dashboard.clinics.index');
        

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
    public function edit($id, User $user)
    {
        $user = Auth::user();
        $clinic = Clinic::find($id);
        return view('dashboard.clinic.edit', compact('clinic','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic $clinic)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone_clinic' => 'required',
        ]);

        $clinic->update($validatedData);
        return redirect()->route('dashboard.clinics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        $clinic->delete();

        return redirect()->route('dashboard.clinics.index');
    }   
}
