<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Prefix;
use App\Clinic;
use App\Specialization;
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
    public function edit(User $user, $slug, Prefix $prefix, Clinic $clinic, Specialization $specialization)
    {
        $clinics = Clinic::all();
        $prefixes = Prefix::all();
        $specializations = Specialization::all();
        //dd($slug);
        $user = User::where('slug', $slug)->first();
        // dd($user);
        return view('dashboard.doctor.edit', compact('user','prefixes','clinics','specializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $slug, Clinic $clinic)
    {
        // dd($request->all());
        $file = $request->file();

        $slug = $request->name . '-' . $request->lastname;

        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'body' => 'nullable',
            'address' => 'nullable',
            'register_number_doc' => 'required | digits:10',
            'phone_number' => 'nullable',
            'service_id' => 'nullable',
            'cv_img' => 'nullable | file ',
            'profile_img' => 'nullable | image ',
            'prefix_id' => 'required',
            // 'slug' => 'required'

        ]);
        // dd(Auth::user()->prefix_id);
        // dd($validatedData);

        if ($file != null) {


            if (isset($file['profile_img']) && !isset($file['cv_img']) ) {

                Storage::delete('profile_img', $user->profile_img);
                $profile_img = Storage::put('profile_img', $request->profile_img);
                $validatedData['slug'] = $slug;
                $validatedData['profile_img'] = $profile_img;
                $validatedData['cv_img'] = Auth::user()->cv_img;
                $user = Auth::user();
                $user->clinics()->sync($request->clinic_id);
                $user->specializations()->sync($request->specialization_id);
                $user->update($validatedData);
                return redirect()->route('dashboard.');

            } elseif (isset($file['cv_img']) && !isset($file['profile_img'])) {

                Storage::delete('cv_img', $user->cv_img);
                $cv_img = Storage::put('cv_img', $request->cv_img);
                $validatedData['slug'] = $slug;
                $validatedData['cv_img'] = $cv_img;
                $validatedData['profile_img'] = Auth::user()->profile_img;
                $user = Auth::user();
                $user->clinics()->sync($request->clinic_id);
                $user->specializations()->sync($request->specialization_id);
                $user->update($validatedData);
                return redirect()->route('dashboard.');
            }
            else {
                Storage::delete('cv_img', $user->cv_img);
                Storage::delete('profile_img', $user->profile_img);
                $cv_img = Storage::put('cv_img', $request->cv_img);
                $profile_img = Storage::put('profile_img', $request->profile_img);
                $validatedData['slug'] = $slug;
                $validatedData['cv_img'] = $cv_img;
                $validatedData['profile_img'] = $profile_img;
                $user = Auth::user();
                $user->clinics()->sync($request->clinic_id);
                $user->specializations()->sync($request->specialization_id);
                $user->update($validatedData);
                return redirect()->route('dashboard.');
            }
        }

        elseif($request->file() == null) {

            $slug = $request->name . '-' . $request->lastname;
            $validatedData = $request->validate([
                'name' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'address' => 'nullable',
                'body' => 'nullable',
                'register_number_doc' => 'required | digits:10',
                'cv_img' => '',
                'phone_number' => 'nullable',
                'profile_img' => '',
                'service_id' => 'nullable',
                'cv_img' => 'nullable | file ',
                'profile_img' => 'nullable | image ',
                'prefix_id' => 'required',
                // 'slug' => 'required'

            ]);

            $cv_img = Auth::user()->cv_img;
            $profile_img = Auth::user()->profile_img;
            $validatedData['slug'] = $slug;
            $validatedData['cv_img'] = $cv_img;
            $validatedData['profile_img'] = $profile_img;

            $user = Auth::user();
            $user->clinics()->sync($request->clinic_id);
            $user->specializations()->sync($request->specialization_id);
            // dd($validatedData);
            $user->update($validatedData);
            // dd($slug);
            // dd($user);
            return redirect()->route('dashboard.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        Storage::delete('cv_img', $user->cv_img);
        Storage::delete('profile_img', $user->profile_img);
        $user->delete();
        return redirect()->route('dashboard.');
    }
}
