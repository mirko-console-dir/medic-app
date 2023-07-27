<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Service $service)
    {
        
        $user = Auth::user();
        // dd($user);
        $services = Service::all();
        // dd($services);
        return view('dashboard.doctor.service.index', compact('user','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $user = Auth::user();
        // dd($user);
        return view('dashboard.doctor.service.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        // dd($request->all());

        $validatedData = $request->validate([

            'name'=>'required',
            'description' => 'nullable',
            'price' => 'nullable',
        ]);

            $user_id = Auth::user()->id;
            // dd($user_id);
        $validatedData['user_id'] = $user_id; 
        // dd($validatedData);
        Service::create($validatedData);
            
        return redirect()->route('dashboard.services.index');

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
        $service = Service::find($id);
        return view('dashboard.doctor.service.edit', compact('service','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

        
       $validatedData = $request->validate([
           'name' => 'required',
           'description' => 'nullable',
           'price' => 'nullable',

       ]);

       $service->update($validatedData);
       return redirect()->route('dashboard.services.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        
        return redirect()->route('dashboard.services.index');
    }
}
