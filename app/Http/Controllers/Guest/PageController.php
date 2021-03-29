<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Sponsorship;
use App\User;
use App\Prefix;
use App\Clinic;
use App\Specialization;
use App\Service;
use App\Review;
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

    public function doctor(User $user, $slug, Prefix $prefix, Clinic $clinic, Specialization $specialization, Service $service, Review $review)
    {
        $user = User::where('slug', $slug)->first();
        $clinics = Clinic::all();
        $prefixes = Prefix::all();
        $specializations = Specialization::all();
        $services = Service::all();
        $reviews = Review::latest()->get();
        $user_clinic = User::with('clinics')->get();
        $user_specialization = User::with('specializations')->get();

        return view('guest.profile_doctor', compact('user','prefixes','clinics','specializations','services','user_clinic','user_specialization','reviews'));
    }
}
