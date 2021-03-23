<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sponsorship;

use Illuminate\Support\Facades\Auth;


class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Sponsorship $sponsorship)
    {
        $user = Auth::user();

        $sponsorships = Sponsorship::all();
        // foreach ($sponsorships as $sponsorship) {
        //     if ($sponsorship->name == 'free') {
        //         $sponsorship_default = $sponsorship;
        //     }
        // };
        //dd($user);
        $user_sponsorships = User::with('sponsorships')->get();
        // dd($user_sponsorships);
        // dd($user->sponsorship->contains());
        // if($user->sponsorships->contains(){
        //     $user->sponsorships()->sync($sponsorship_default)

        // }
        return view('dashboard.doctor.sponsorship.index',compact('user','sponsorships', 'user_sponsorships'));
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
    public function update(Request $request, $id, User $user)
    {
        
        $user = Auth::user();
        $user->sponsorships()->sync($request->sponsorship_id);


        return redirect()->route('dashboard.sponsorships.index');
        // dd($user);

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
}
