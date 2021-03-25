<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsorship;
use App\User;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    public function index(){
        return view('guest.home');
    }

    public function search()
    {
        return view('guest.search');
    }

    public function doctors_api()
    {
        return view('spa.doctors');
    }

    public function checkout(Sponsorship $sponsorship, User $user)
    {   
        $sponsorships = Sponsorship::all();
        $user = Auth::user();

        // $sponsorship = Sponsorship::find($id);
        // dd($sponsorship->id);
        return view('payment.checkout', compact('sponsorships','user'));
    }

    public function doctor(User $user, $slug)
    {
        $user = User::where('slug', $slug)->first();
        // dd($user);

        return view('guest.profile_doctor', compact('user'));
    }
}
